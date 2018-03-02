<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTUnidadMedidas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('medidas', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('descripcion_medida',50);
            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->timestamps();
        });

        DB::table('medidas')->insert([
            ['descripcion_medida' => 'Metros Cuadrados','estados_id' => 1],
            ['descripcion_medida' => 'Hectareas','estados_id' => 1],
            ['descripcion_medida' => 'Pies','estados_id' => 1],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medidas');
    }
}
