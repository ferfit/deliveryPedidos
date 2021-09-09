<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $fillable = [
        'nombre','listaPedido','total','estado'
    ];

    use HasFactory;

    const PENDIENTE = 1;
    const ENPROCESO = 2;
    const ENVIADO = 3;
    const  CANCELADO = 0;

    //Relacion 1:n inversa
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
