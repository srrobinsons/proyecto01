<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfesionToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        // Como vamos a agregar un campo a la tabla usuarios, usamos "table" no create
        Schema::table('usuarios', function(Blueprint $table) {
            //campo profesion varchar 50, no nulo, a insertar despues de password
            $table->string('profesion', 50)->nulable()->after('password');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('usuarios', function(Blueprint $table) {
            //campo profesion varchar 50, no nulo, a insertar despues de password
            $table->dropColumn('profesion');
        });      
    }
}
