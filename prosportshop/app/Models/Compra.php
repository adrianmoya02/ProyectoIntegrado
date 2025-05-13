<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id_compra'; // Clave primaria de la tabla

    public $timestamps = true; // Si la tabla tiene columnas `created_at` y `updated_at`

    protected $fillable = [
        'id_usuario',
        'id_producto',
        'fecha_compra',
        'precio_compra',
        'estado_transaccion',
        'comentario',
        'valoracion',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }
}