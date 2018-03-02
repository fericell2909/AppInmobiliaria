<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTTipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('tipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_tipo',50);
            $table->timestamps();
        });

        // Insertando Registros en la Tabla.
        DB::table('tipos')->insert([
            ['nombre_tipo' => 'Residencial'],
            ['nombre_tipo' => 'Comercial'],
            ]);
    }

    public function down()
    {
        Schema::drop('tipos');
    }
}
