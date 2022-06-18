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
            $table->id();
            $table->string('cnpj', 18);
            $table->string('ong_name', 60);
            $table->string('owner', 30);
            $table->string('description', 255);
            $table->blob('image');
            $table->string('ong_city');
            $table->char('ong_state', 2);
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
