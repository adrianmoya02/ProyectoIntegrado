<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoSaldo extends Model
{
    use HasFactory;

    protected $table = 'movimientos_saldo';

    protected $primaryKey = 'id_movimiento';

    protected $fillable = [
        'id_usuario',
        'id_metodo_pago',
        'tipo',
        'cantidad',
        'fecha',
    ];

    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class, 'id_metodo_pago', 'id_metodo_pago');
    }
}