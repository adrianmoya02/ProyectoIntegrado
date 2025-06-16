<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MovimientoSaldoController;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\MetodoPagoController;

// Página de inicio: index de productos, sin login
Route::get('/', [ProductoController::class, 'index'])->name('products.index');

// Puedes dejar /productos también pública
Route::get('/productos', [ProductoController::class, 'index'])->name('products.index');

// Si quieres que /dashboard también sea pública y muestre lo mismo:
Route::get('/dashboard', [ProductoController::class, 'index'])->name('dashboard')->middleware(['verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home', function () {
        return redirect()->route('dashboard');
    })->name('home');
});
Route::get('/productos/create', [ProductoController::class, 'create'])->name('products.create');
Route::post('/productos', [ProductoController::class, 'store'])->name('products.store');
// Correcto: primero la ruta específica
Route::get('/productos/vender', [ProductoController::class, 'vender'])->middleware(['auth'])->name('productos.vender');
Route::post('/productos/vender', [ProductoController::class, 'venderStore'])->middleware(['auth'])->name('productos.vender.store');

// Luego la ruta con parámetro
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::post('/productos/{id}/comprar', [ProductoController::class, 'comprar'])->middleware(['auth'])->name('productos.comprar');
Route::get('/productos/{id}/comprar', [ProductoController::class, 'comprar'])->name('productos.comprar');
Route::delete('/productos/{id}/devolver', [ProductoController::class, 'devolver'])->middleware('auth')->name('productos.devolver');
Route::post('/productos/{id}/reseñas', [ProductoController::class, 'storeReseña'])->name('productos.reseñas.store');
Route::get('/mis-compras', [ProductoController::class, 'misCompras'])->name('productos.mis_compras');
Route::get('/movimientos/create', [MovimientoSaldoController::class, 'create'])->middleware(['auth'])->name('movimientos.create');
Route::post('/movimientos', [MovimientoSaldoController::class, 'store'])->middleware(['auth'])->name('movimientos.store');
Route::get('/devolver-productos', [ProductoController::class, 'devolverVista'])->middleware(['auth'])->name('productos.devolver_vista');

Route::get('/productos/vender', [ProductoController::class, 'vender'])
    ->middleware(['auth'])
    ->name('productos.vender');
Route::post('/productos/vender', [ProductoController::class, 'venderStore'])->middleware(['auth'])->name('productos.vender.store');

// Rutas para gestión de usuarios (solo accesibles por admin)
Route::middleware(['auth'])->group(function () {
    Route::get('/usuarios', [UserController::class, 'index'])->name('user.index');
    Route::get('/usuarios/crear', [UserController::class, 'create'])->name('user.create');
    Route::post('/usuarios', [UserController::class, 'store'])->name('user.store');
    Route::get('/usuarios/{user}/editar', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/usuarios/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/usuarios/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/metodos-pago/crear', [MetodoPagoController::class, 'create'])->name('metodos_pago.create');
    Route::post('/metodos-pago', [MetodoPagoController::class, 'store'])->name('metodos_pago.store');
});

require __DIR__.'/auth.php';

