<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria = Categoria::create([
            'nombre'=>'Combos'
            
        ]);
        $categoria2 = Categoria::create([
            'nombre'=>'Ensaladas'
            
        ]);
        $categoria2 = Categoria::create([
            'nombre'=>'Calientes'
            
        ]);
        $categoria2 = Categoria::create([
            'nombre'=>'Frios'
            
        ]);
        $categoria2 = Categoria::create([
            'nombre'=>'Postres'
            
        ]);
        $categoria2 = Categoria::create([
            'nombre'=>'Bebidas'
            
        ]);

    }
}
