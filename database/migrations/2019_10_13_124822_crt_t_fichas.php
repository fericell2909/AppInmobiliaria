<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrtTFichas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas_cabecera', function (Blueprint $table) {
            $table->string('identificador',20)->unique();
	        $table->string('cantidad_productos',5)->default('');
	        $table->string('caracteristica',5)->default('');
	        $table->string('modalidad',5)->default('');
			$table->string('nivel',5)->default('');
	        
	        $table->string('codigo_departamento',10)->default('');
			$table->string('codigo_distrito',10)->default('');
			$table->string('codigo_provincia',10)->default('');
			$table->string('codigo_local',10)->default('');
	
	        $table->string('director_contacto_celular',50)->default('');
			$table->string('director_contacto_dni',50)->default('');
	        $table->string('director_contacto_email',50)->default('');
	        $table->string('director_contacto_nombres_apellidos',150)->default('');
	
	        $table->string('director_contacto_tiempo_cargo',10)->default('');
	
	        $table->string('director_laboral',10)->default('');
	
	        $table->string('responsable_contacto_celular',50)->default('');
			$table->string('responsable_contacto_dni',50)->default('');
			$table->string('responsable_contacto_email',50)->default('');
			$table->string('responsable_contacto_nombres_apellidos',150)->default('');
			$table->string('responsable_contacto_tiempo_cargo',10)->default('');
			$table->string('responsable_laboral',10)->default('');
	
	        $table->longText('observaciones');
	

	        $table->integer('nAlmMascCETPRO')->default(0);
			$table->integer('nAlmMascEBA')->default(0);
			$table->integer('nAlmMascEBE')->default(0);
			$table->integer('nAlmMascInicial')->default(0);
			$table->integer('nAlmMascPrimaria')->default(0);
			$table->integer('nAlmMascSecundaria')->default(0);
			$table->integer('nAlmMujCETPRO')->default(0);
			$table->integer('nAlmMujInicial')->default(0);
			$table->integer('nAlmMujPrimaria')->default(0);
			$table->integer('nAlmMujSecundaria')->default(0);
			$table->integer('nAlmMujcEBA')->default(0);
			$table->integer('nAlmMujcEBE')->default(0);
	
	        $table->longText('hdd_actividades_codigos');
			$table->longText('hdd_actividades_total');
			$table->longText('hdd_cadenaspreguntas_fases');
			$table->longText('hdd_fases_codigos');
			$table->longText('hdd_fases_total');
			$table->longText('hdd_grupoactividades');
			$table->longText('hdd_grupofases');
			$table->longText('hdd_grupopreguntas');
			$table->longText('hdd_preguntas_codigos');
			$table->longText('hdd_preguntas_total');
			$table->longText('hdd_productos_codigos');
			$table->longText('hdd_productos_total');
			$table->longText('hhdd_cadena_name_preguntas');
	        $table->string('usuarioregistro',250)->default('');
			$table->unsignedInteger('estados_id')->default(1);
	        $table->foreign('estados_id')->references('id')->on('estados');
	        $table->string('codigo_encuesta',50)->default('');
            $table->timestamps();
        });
        
	    Schema::create('encuestas_detalle', function (Blueprint $table) {
		    $table->string('identificador',20);
		    
		    $table->string('preguntas_id',10);
		    $table->string('llave',1000)->default('');
		    $table->string('valor',1000)->default('');
		    $table->string('otros',1000)->default('');
		    $table->unsignedInteger('estados_id')->default(1);
		    $table->foreign('estados_id')->references('id')->on('estados');

		    $table->foreign('identificador')->references('identificador')->on('encuestas_cabecera');
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
        Schema::dropIfExists('fichas_cabecera');
    }
}
