<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProducto extends Model
{
    use HasFactory;

    protected $table = 'categoria_producto'; // Nombre correcto de la tabla

    protected $primaryKey = 'id_categoria'; // Clave primaria de la tabla

    public $timestamps = true; // Si la tabla tiene columnas `created_at` y `updated_at`

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}