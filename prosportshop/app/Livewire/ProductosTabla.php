<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\CategoriaProducto;
use Livewire\WithPagination;

class ProductosTabla extends Component
{
    use WithPagination;

    public $buscar = '';
    public $categoria = '';
    protected $paginationTheme = 'tailwind';

    

    public function render()
{
    $query = Producto::with('categoria');

    if ($this->buscar) {
        logger("Buscando: " . $this->buscar);
        $query->where(function($q) {
            $q->where('nombre', 'like', '%' . $this->buscar . '%');
        });
    }

    if ($this->categoria) {
        logger("Filtrando por categoría: " . $this->categoria);
        $query->where('id_categoria', $this->categoria);
    }

    $productos = $query->paginate(4);

    return view('livewire.productos-tabla', [
        'productos' => $productos,
        'categorias' => CategoriaProducto::all(),
    ]);
}
public function updatingBuscar()
    {
        $this->resetPage();
    }

    public function updatingCategoria()
    {
        $this->resetPage();
    }
}
