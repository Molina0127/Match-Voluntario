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
        Schema::create('entidade_volunteers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ong_requested');
            $table->boolean('reqstatus')->default(null)->nullable();
            $table->integer('vol_acceptor');
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
        Schema::dropIfExists('entidade_volunteers');
    }
};
