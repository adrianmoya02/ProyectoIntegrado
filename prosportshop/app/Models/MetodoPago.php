<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    use HasFactory;

    protected $table = 'metodos_pago';

    protected $fillable = [
        'id_usuario',
        'numero_cuenta',
        'titular',
        'entidad_bancaria',
        'descripcion',
    ];
}
