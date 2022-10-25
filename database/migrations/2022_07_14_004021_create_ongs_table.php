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
        Schema::create('ongs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cnpj');
            $table->string('ong_email');
            $table->string('ong_name');
            $table->string('owner');
            $table->string('description');
            $table->string('ong_city');
            $table->char('ong_state');   
            $table->string('ong_cep');
            $table->string('password');
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
        Schema::dropIfExists('ongs');
    }
};
