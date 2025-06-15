<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'primer_apellido',
        'segundo_apellido',
        'direccion',
        'email',
        'password',
        'numero_cuenta',
        'rol',
        'localidad',
        'provincia',
        'codigo_postal',
        'telefono',
        'fecha_nacimiento',
        'estado',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    public function isAdmin()
    {
        return $this->rol === 'admin';
    }
    public function isUser()
    {
        return $this->rol === 'user';
    }

    public function movimientosSaldo()
    {
        return $this->hasMany(MovimientoSaldo::class, 'id_usuario', 'id_usuario');
    }
    public function getSaldoDisponibleAttribute()
    {
    return $this->movimientosSaldo->reduce(function ($carry, $movimiento) {
        return $movimiento->tipo === 'ingreso'
            ? $carry + $movimiento->cantidad
            : $carry - $movimiento->cantidad;
    }, 0);
    }

}
