<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Orden;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->json('listaPedido');
            $table->float('total',10 , 2);
            $table->enum('estado',[Orden::PENDIENTE,Orden::ENPROCESO,Orden::ENVIADO,Orden::CANCELADO])->default(Orden::PENDIENTE);

            $table->unsignedBigInteger('user_id');
            
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordens');
    }
}
