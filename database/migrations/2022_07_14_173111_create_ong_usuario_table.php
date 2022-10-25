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
        Schema::create('ong_usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ong_id')->unsigned();
            $table->integer('usuario_id')->unsigned();

            $table->foreign('ong_id')->references('id')->on('ongs')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
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
        Schema::dropIfExists('ong_usuario');
    }
};
