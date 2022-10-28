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
        Schema::create('convida_ongs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_requested');
            $table->boolean('status')->default(null)->nullable();
            $table->integer('acceptor');
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
        Schema::dropIfExists('convida_ongs');
    }
};
