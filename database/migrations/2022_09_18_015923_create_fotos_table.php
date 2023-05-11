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
        Schema::create('fotos', function (Blueprint $table) {
            $table->id();
            $table->String('url');
            $table->unsignedDouble('precio')->nullable();
            $table->unsignedBigInteger('idEvento')->nullable();
            $table->unsignedBigInteger('cantidad')->default(0);
            $table->foreign('idEvento')->references('id')->on('eventos');
            $table->unsignedBigInteger('idUser');   //Fotografo
            $table->foreign('idUser')->references('id')->on('users');
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
        Schema::dropIfExists('fotos');
    }
};
