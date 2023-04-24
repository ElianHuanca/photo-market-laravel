<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idFoto');
            $table->foreign('idFoto')->references('id')->on('fotos');
            $table->unsignedBigInteger('idUser');   //Clientes
            $table->foreign('idUser')->references('id')->on('users');
            $table->boolean('comprado')->default(false);//0 es False y 1 es true
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
        Schema::dropIfExists('foto_usuarios');
    }
};
