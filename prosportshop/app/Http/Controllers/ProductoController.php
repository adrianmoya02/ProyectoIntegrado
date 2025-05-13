<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\CategoriaProducto;
use App\Models\Compra;
use App\Models\MovimientoSaldo;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index', compact('productos'));
    }

    public function create()
    {
        $categoria_producto = CategoriaProducto::all(); // Obtiene todas las categorías
        return view('producto.create', compact('categoria_producto')); // Pasa las categorías a la vista
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'descripcion' => 'required|string',
            'estado' => 'required|string|in:disponible,no_disponible',
            'id_categoria' => 'required|exists:categoria_producto,id_categoria',
        ]);

        $producto = new Producto();
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->descripcion = $request->input('descripcion');
        $producto->estado = $request->input('estado');
        $producto->id_categoria = $request->input('id_categoria');

        // Manejar la imagen si se sube
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('productos', 'public');
            $producto->imagen = $path;
        }

        $producto->save();

        return redirect()->route('products.index')->with('success', 'Producto creado con éxito.');
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('producto.show', compact('producto'));
    }

    public function edit($id)
    {
        $product = Producto::findOrFail($id); // Obtiene el producto por su ID
        $categoria_producto = CategoriaProducto::all(); // Obtiene todas las categorías
        return view('producto.edit', compact('product', 'categoria_producto')); // Pasa las variables a la vista
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|min:3|max:255',
            'precio' => 'required|numeric|min:0.01',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string',
            'id_categoria' => 'required|exists:categoria_producto,id_categoria',
        ]);

        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->estado = $request->estado;
        $producto->id_categoria = $request->id_categoria;

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($producto->imagen) {
                \Storage::disk('public')->delete($producto->imagen);
            }
            $producto->imagen = $request->file('imagen')->store('productos', 'public');
        }

        $producto->save();

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        // Eliminar la imagen si existe
        if ($producto->imagen) {
            \Storage::disk('public')->delete($producto->imagen);
        }

        $producto->delete();

        return redirect()->route('products.index')->with('success', 'Producto eliminado con éxito.');
    }

    public function purchasedProducts()
    {
        // Aquí puedes implementar la lógica para mostrar los productos comprados por el usuario
        return view('producto.purchased_products');
    }

    public function comprar($id)
    {
        $producto = Producto::findOrFail($id);
        $usuario = auth()->user();

        // Calcular el saldo disponible
        $saldo = $usuario->movimientosSaldo->reduce(function ($carry, $movimiento) {
            return $movimiento->tipo === 'ingreso'
                ? $carry + $movimiento->cantidad
                : $carry - $movimiento->cantidad;
        }, 0);

        // Verificar si el saldo es suficiente
        if ($saldo < $producto->precio) {
            return redirect()->route('productos.show', $id)->with('error', 'Saldo insuficiente para comprar este producto.');
        }

        // Registrar la compra
        Compra::create([
            'id_usuario' => $usuario->id_usuario,
            'id_producto' => $producto->id_producto,
            'precio_compra' => $producto->precio, // Agregar el precio del producto
            'fecha_compra' => now(),
            'estado_transaccion' => 'completada', // Agregar el estado de la transacción
        ]);

        // Cambiar el estado del producto a "no disponible"
        $producto->estado = 'no_disponible';
        $producto->save();

        return redirect()->route('productos.show', $id)->with('success', 'Producto comprado con éxito.');
    }

    public function storeReseña(Request $request, $id)
    {
        $request->validate([
            'comentario' => 'required|string|max:1000',
            'valoracion' => 'required|integer|min:1|max:5',
        ]);

        $compra = \App\Models\Compra::where('id_usuario', auth()->id())
            ->where('id_producto', $id)
            ->first();

        if (!$compra) {
            return redirect()->route('productos.show', $id)->with('error', 'No puedes dejar una reseña para un producto que no has comprado.');
        }

        $compra->update([
            'comentario' => $request->comentario,
            'valoracion' => $request->valoracion,
        ]);

        return redirect()->route('productos.show', $id)->with('success', 'Reseña añadida con éxito.');
    }

    public function misCompras()
    {
        $compras = \App\Models\Compra::where('id_usuario', auth()->id())->with('producto')->get();

        return view('producto.mis_compras', compact('compras'));
    }

    public function devolver($id)
    {
        $producto = Producto::findOrFail($id);
        $usuario = auth()->user();

        // Verificar si el usuario ha comprado este producto
        $compra = $producto->compras->where('id_usuario', $usuario->id)->first();

        if (!$compra) {
            return redirect()->route('productos.show', $id)->with('error', 'No puedes devolver un producto que no has comprado.');
        }

        // Eliminar la compra
        $compra->delete();

        // Registrar un movimiento de saldo para reembolsar el dinero
        MovimientoSaldo::create([
            'id_usuario' => $usuario->id,
            'tipo' => 'ingreso',
            'cantidad' => $producto->precio,
            'fecha' => now(),
        ]);

        // Cambiar el estado del producto a "disponible"
        $producto->estado = 'disponible';
        $producto->save();

        return redirect()->route('productos.show', $id)->with('success', 'Producto devuelto con éxito.');
    }
}