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
            $table->string('metodoEnvio');
            $table->string('direccion')->nullable();
            $table->string('metodoPago');
            $table->string('abono')->nullable();
            $table->json('listaPedido');
            $table->float('total');
            $table->enum('estado',[Orden::PENDIENTE,Orden::ENVIADO,Orden::ENTREGADO,Orden::CANCELADO])->default(Orden::PENDIENTE);
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
