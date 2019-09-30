<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTAsocMaeOpciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mae_asoc_preg_op', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('descripcion',100);
            $table->string('nombre_tabla',100);
	        $table->unsignedInteger('estados_id')->default(1);
	        $table->foreign('estados_id')->references('id')->on('estados');
            $table->timestamps();
        });
	
	    DB::table('mae_asoc_preg_op')->insert([
		    ['descripcion' => 'Niveles de Institucion' , 'nombre_tabla' => 'desastres_niveles_institucion','estados_id' => 1],
		    ['descripcion' => 'Caracteristicas de la Institucion' , 'nombre_tabla' => 'desastres_caracteristicas_institucion','estados_id' => 1],
		    ['descripcion' => 'Modalidad de Institucion' , 'nombre_tabla' => 'desastres_modalidad_institucion','estados_id' => 1],
		    ['descripcion' => 'Aliados Estrategicos' , 'nombre_tabla' => 'desastres_aliados_estrategicos','estados_id' => 1],
		    ['descripcion' => 'Condicion Laboral' , 'nombre_tabla' => 'desastres_condicion_laboral','estados_id' => 1],
	    ]);
     
	    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mae_asoc_preg_op');
    }
}
