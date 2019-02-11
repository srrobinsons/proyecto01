<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        // creamos la tabla usuarios 
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');   //id sera un entero que se ira incrementando
            $table->string('name');     //varchar name
            $table->string('email')->unique();  //varchar que sera unico para cada reg
            
            // foreing, campo clave que se asocia al campo id de la tabla 'profesiones'
            $table->unsignedInteger('profesion_id')->nullable();
            $table->foreign('profesion_id')->references('id')->on('profesiones');

            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('usuarios');
    }
}
