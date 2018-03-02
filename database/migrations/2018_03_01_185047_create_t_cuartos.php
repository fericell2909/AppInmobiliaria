<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTCuartos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuartos', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('nombre_descripcion_cuartos',50);
            $table->timestamps();
        });

        DB::table('cuartos')->insert([
            ['nombre_descripcion_cuartos' => '0 Habitaciones'],
            ['nombre_descripcion_cuartos' => '1 Habitación'],
            ['nombre_descripcion_cuartos' => '2 Habitaciones'],
            ['nombre_descripcion_cuartos' => '3 Habitaciones'],
            ['nombre_descripcion_cuartos' => '4 Habitaciones'],
            ['nombre_descripcion_cuartos' => '5 Habitaciones'],
            ['nombre_descripcion_cuartos' => '> 5 Habitaciones'],
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cuartos');
    }
}
