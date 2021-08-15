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
            [ 'nombre'=>$row[0] ] , 
            [ 
                'descripcion' => $row[1], 
                'imagen' => $row[2],
                'precio' => $row[3],
                'categoria_id' => $row[4]
            ]);
    }
}
