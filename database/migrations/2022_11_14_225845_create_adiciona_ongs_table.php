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
        Schema::create('adiciona_ongs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->boolean('status')->nullable()->default(null);
            $table->integer('ong_id');
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
        Schema::dropIfExists('adiciona_ongs');
    }
};
