<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('persona_id')->unsigned();
            $table->integer('vianda_id')->unsigned();
            $table->timestamp('fecha_solicitud')->nullable();
            $table->timestamp('fecha_entrega')->nullable();
            $table->foreign('persona_id')->references('id')->on('personas')->onUpdate('cascade');
            $table->foreign('vianda_id')->references('id')->on('viandas')->onUpdate('cascade');
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
        Schema::dropIfExists('pedidos');
    }
}
