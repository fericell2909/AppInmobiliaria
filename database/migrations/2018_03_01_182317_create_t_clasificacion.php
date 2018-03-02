<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTClasificacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clasificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_clasificacion',50);
            $table->timestamps();
        });

        // Insertando Registros en la Tabla.
        DB::table('clasificaciones')->insert([
            ['nombre_clasificacion' => 'Venta'],
            ['nombre_clasificacion' => 'Alquiler'],
            ]);
    }

    public function down()
    {
        Schema::drop('clasificaciones');
    }
}
