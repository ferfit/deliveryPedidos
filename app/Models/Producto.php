<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'codigo','nombre','categoria_id','precio','minimo','activo'
    ];


    use HasFactory;

    //Relacion 1:n inversa
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }


    //query scope
    public function scopeCategory($query,$category_id){
        if($category_id){
            return $query->where('categoria_id',$category_id);
        }
    }


}
