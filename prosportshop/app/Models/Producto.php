<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Compra;
use App\Models\CategoriaProducto;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id_producto'; // Clave primaria de la tabla

    public $timestamps = true; // Si la tabla tiene columnas `created_at` y `updated_at`

    protected $fillable = [
        'nombre',
        'precio',
        'imagen',
        'descripcion',
        'estado',
        'id_categoria',
    ];

    public function compras()
    {
        return $this->hasMany(Compra::class, 'id_producto', 'id_producto');
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaProducto::class, 'id_categoria', 'id_categoria');
    }
}