<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    use HasFactory;

    protected $table = 'metodos_pago'; // Cambiado a plural para coincidir con la migración

    protected $primaryKey = 'id_metodo_pago'; // Clave primaria de la tabla

    public $timestamps = true; // Si la tabla tiene columnas `created_at` y `updated_at`

    protected $fillable = [
        'id_usuario',
        'numero_cuenta',
        'titular',
        'entidad_bancaria',
        'descripcion',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }

    // Relación con el modelo MovimientoSaldo
    public function movimientosSaldo()
    {
        return $this->hasMany(MovimientoSaldo::class, 'id_metodo_pago', 'id_metodo_pago');
    }
}