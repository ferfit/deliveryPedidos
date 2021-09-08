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
            'name'=>'PARQUE RIVADAVIA',
            'razon-social'=>'TUJABI SRL',
            'cuit'=>'30-71710900-3',
            'direccion'=>'Av. Rivadavia 4717',
            'localidad'=>'CABALLITO',
            'provincia'=>'CABA',
            'whatsapp'=>'1163592876',
            'email'=>'parquerivadavia@eneldo.com',
            'password'=>hash::make('Rivadavia4717')
                       
        ]);
        $user = User::create([
            'name'=>'AGUERO',
            'razon-social'=>'DAMIAN ARIEL POLIN',
            'cuit'=>'20-31453752-2',
            'direccion'=>'Aguero 1926',
            'localidad'=>'RECOLETA',
            'provincia'=>'CABA',
            'whatsapp'=>'1132010549',
            'email'=>'aguero@eneldo.com',
            'password'=>hash::make('Aguero1926')
                       
        ]);
        $user = User::create([
            'name'=>'ROSARIO',
            'razon-social'=>'IGNACIO SEPLIARSKY',
            'cuit'=>'20-25328968-7',
            'direccion'=>'Pte roca 872',
            'localidad'=>'ROSARIO',
            'provincia'=>'SANTA FE',
            'whatsapp'=>'3412111635',
            'email'=>'rosario@eneldo.com',
            'password'=>hash::make('Roca872')                       
        ]);
        $user = User::create([
            'name'=>'LACROZE',
            'razon-social'=>'KARBEL SRL',
            'cuit'=>'30-71713658-2',
            'direccion'=>'Lacroze 2244',
            'localidad'=>'PALERMO',
            'provincia'=>'CABA',
            'whatsapp'=>'11321377933',
            'email'=>'lacroze@eneldo.com',
            'password'=>hash::make('LACROZE2244')                       
        ]);
        $user = User::create([
            'name'=>'REMEROS',
            'razon-social'=>'MARIA SOLEDAD CORGHI',
            'cuit'=>'27-25171788-0',
            'direccion'=>'Av. Santa Maria de las Conchas 4711',
            'localidad'=>'RINCON DE MILBERG',
            'provincia'=>'PCIA. DE BS.AS',
            'whatsapp'=>'1128537813',
            'email'=>'remeros@eneldo.com',
            'password'=>hash::make('REMEROS4711')                       
        ]);
        $user = User::create([
            'name'=>'PUEYRREDON',
            'razon-social'=>'JORGE ARIEL PILIPSKY',
            'cuit'=>'20-22128058-0',
            'direccion'=>'Av. Mosconi 2602',
            'localidad'=>'VILLA PUEYRREDON',
            'provincia'=>'CABA',
            'whatsapp'=>'1166377074',
            'email'=>'pueyrredon@eneldo.com',
            'password'=>hash::make('Mosconi2602')                       
        ]);
        $user = User::create([
            'name'=>'MARTINEZ',
            'razon-social'=>'7273 SRL',
            'cuit'=>'30-71702335-4',
            'direccion'=>'General Alvear 469',
            'localidad'=>'Martinez',
            'provincia'=>'PCIA. DE BS.AS',
            'whatsapp'=>'1130273697',
            'email'=>'martinez@eneldo.com',
            'password'=>hash::make('Alvear469')                       
        ]);
        $user = User::create([
            'name'=>'PILAR',
            'razon-social'=>'LEANDRO LAMMARDO',
            'cuit'=>'20-28910004-1',
            'direccion'=>'R. Caamaño 1060',
            'localidad'=>'PILAR',
            'provincia'=>'PCIA. DE BS.AS',
            'whatsapp'=>'1131991993',
            'email'=>'pilar@eneldo.com',
            'password'=>hash::make('Caamaño1060')                       
        ]);
        $user = User::create([
            'name'=>'AV. SANTA FE',
            'razon-social'=>'EZEQUIEL PERAZZO',
            'cuit'=>'20-28985048-2',
            'direccion'=>'Av. Santa Fe 1600',
            'localidad'=>'Recoleta',
            'provincia'=>'CABA',
            'whatsapp'=>'1131780143',
            'email'=>'santafe@eneldo.com',
            'password'=>hash::make('SantaFe1600')                       
        ]);
        $user = User::create([
            'name'=>'ALVAREZ',
            'razon-social'=>'MIGUEL ANGEL REXACH',
            'cuit'=>'20-08104212-9',
            'direccion'=>'Gorriti 1064',
            'localidad'=>'FRANCISCO ALVAREZ',
            'provincia'=>'PCIA. DE BS.AS',
            'whatsapp'=>'1140862301',
            'email'=>'alvarez@eneldo.com',
            'password'=>hash::make('Gorriti1064')                       
        ]);
        $user = User::create([
            'name'=>'BELGRANO',
            'razon-social'=>'MATIAS HECTOR FERNANDEZ',
            'cuit'=>'20-28298905-1',
            'direccion'=>'Av. Cabildo 2841',
            'localidad'=>'BELGRANO',
            'provincia'=>'CABA',
            'whatsapp'=>'1152600352',
            'email'=>'belgrano@eneldo.com',
            'password'=>hash::make('Cabildo2841')                       
        ]);
        $user = User::create([
            'name'=>'URQUIZA',
            'razon-social'=>'HUMITA SRL',
            'cuit'=>'33-71656517-9',
            'direccion'=>'Av. Olazabal 4955',
            'localidad'=>'VILLA URQUIZA',
            'provincia'=>'CABA',
            'whatsapp'=>'1132757219',
            'email'=>'urquiza@eneldo.com',
            'password'=>hash::make('Cabildo2841')                       
        ]);
        $user = User::create([
            'name'=>'SCALABRINI',
            'razon-social'=>'HUMITA SRL',
            'cuit'=>'33-71656517-9',
            'direccion'=>'Raul Escalabrini Ortiz 2762',
            'localidad'=>'PALERMO',
            'provincia'=>'CABA',
            'whatsapp'=>'1127172481',
            'email'=>'scalabrini@eneldo.com',
            'password'=>hash::make('Ortiz2762')                       
        ]);
        $user = User::create([
            'name'=>'LAS HERAS',
            'razon-social'=>'LOCRO SA',
            'cuit'=>'33-71543389-9',
            'direccion'=>'Av. Las Heras 2000',
            'localidad'=>'RECOLETA',
            'provincia'=>'CABA',
            'whatsapp'=>'1156251073',
            'email'=>'lasheras@eneldo.com',
            'password'=>hash::make('Heras2000')                       
        ]);
        $user = User::create([
            'name'=>'PRIMERA JUNTA',
            'razon-social'=>'LOCRO SA',
            'cuit'=>'33-71543389-9',
            'direccion'=>'Av. Rivadavia 5595',
            'localidad'=>'CABALLITO',
            'provincia'=>'CABA',
            'whatsapp'=>'1163036138',
            'email'=>'primerajunta@eneldo.com',
            'password'=>hash::make('Rivadavia5596')                       
        ]);
        
        $user = User::create([
            'name'=>'ALMAGRO',
            'razon-social'=>'LOCRO SA',
            'cuit'=>'33-71543389-9',
            'direccion'=>'Av. Corrientes 4549',
            'localidad'=>'ALMAGRO',
            'provincia'=>'CABA',
            'whatsapp'=>'1156251073',
            'email'=>'almagro@eneldo.com',
            'password'=>hash::make('Corrientes4549')                       
        ]);


    
    }
}
