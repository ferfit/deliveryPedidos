<?php

namespace App\Imports;

use App\Models\Producto;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Producto::updateOrInsert(
            [ 'codigo'=>$row[0] ] , 
            [ 
                'nombre' => $row[1], 
                'categoria_id' => $row[2],
                'precio' => $row[3]
            ]);
    }
}