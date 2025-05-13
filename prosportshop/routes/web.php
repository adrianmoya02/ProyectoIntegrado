<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MovimientoSaldoController;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;



Route::get('/', function () {
    return redirect()->route('dashboard');
});
// Cambiar el dashboard para que apunte a products.index
Route::get('/dashboard', [ProductoController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

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
Route::get('/productos', [ProductoController::class, 'index'])->name('products.index');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/{id}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::post('/productos/{id}/comprar', [ProductoController::class, 'comprar'])->middleware(['auth'])->name('productos.comprar');
Route::get('/productos/{id}/comprar', [ProductoController::class, 'comprar'])->name('productos.comprar');
Route::delete('/productos/{id}/devolver', [ProductoController::class, 'devolver'])->middleware('auth')->name('productos.devolver');
Route::post('/productos/{id}/reseñas', [ProductoController::class, 'storeReseña'])->name('productos.reseñas.store');
Route::get('/mis-compras', [ProductoController::class, 'misCompras'])->name('productos.mis_compras');
Route::get('/movimientos/create', [MovimientoSaldoController::class, 'create'])->middleware(['auth'])->name('movimientos.create');
Route::post('/movimientos', [MovimientoSaldoController::class, 'store'])->middleware(['auth'])->name('movimientos.store');

Route::resource('user', UserController::class);

require __DIR__.'/auth.php';

