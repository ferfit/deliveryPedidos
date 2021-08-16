<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'Fernando Pereyra',
            'email'=>'fer@correo.com',
            'password'=>hash::make('12345678')
                       
        ]);
        $user = User::create([
            'name'=>'Fernando Pereyra',
            'email'=>'correo@correo.com',
            'password'=>Crypt::encryptString('12345678')
                       
        ]);
        $user = User::create([
            'name'=>'Fernando Pereyra',
            'email'=>'correo8@correo.com',
            'password'=>Crypt::encryptString('12345678')
        ]);
        $user = User::create([
            'name'=>'Fernando Pereyra',
            'email'=>'corre2o@correo.com',
            'password'=>Crypt::encryptString('12345678')
        ]);
        $user = User::create([
            'name'=>'Fernando Pereyra',
            'email'=>'correo3@correo.com',
            'password'=>Crypt::encryptString('12345678')
        ]);
        $user = User::create([
            'name'=>'Fernando Pereyra',
            'email'=>'correo4@correo.com',
            'password'=>Crypt::encryptString('12345678')
        ]);
        $user = User::create([
            'name'=>'Fernando Pereyra',
            'email'=>'correo5@correo.com',
            'password'=>Crypt::encryptString('12345678')
        ]);
        $user = User::create([
            'name'=>'Fernando Pereyra',
            'email'=>'correo6@correo.com',
            'password'=>Crypt::encryptString('12345678')
        ]);
    }
}
