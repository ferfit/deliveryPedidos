<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $fillable = [
        'nombre', 'metodoEnvio','direccion','metodoPago','abono','estado','listaPedido','total'
    ];

    use HasFactory;

    const PENDIENTE = 1;
    const ENVIADO = 2;
    const ENTREGADO = 3;
    const  CANCELADO = 0;
}
