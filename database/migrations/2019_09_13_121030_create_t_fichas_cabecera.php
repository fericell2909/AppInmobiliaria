<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTFichasCabecera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fichas_cabecera', function (Blueprint $table) {
            
            $table->string('fichas_id',50)->unique();
            $table->string('anio_registro',4);
            $table->string('mes_registro',2);
            $table->string('dia_registro',2);

            $table->unsignedInteger('departamento_id');
            $table->unsignedInteger('provincia_id');
            $table->unsignedInteger('distrito_id');

            $table->string('titulo_ficha',500)->default('');
            $table->text('descripcion_ficha');
            $table->string('slug',600)->default('');

            $table->string('fecha_visita',10)->default('01/01/1900');



            $table->unsignedInteger('niveles_id')->default(1);
            $table->foreign('niveles_id')->references('id')->on('niveles_institucion');

            $table->unsignedInteger('modalidad_id')->default(1);
            $table->foreign('modalidad_id')->references('id')->on('modalidad_institucion');


            $table->unsignedInteger('nTotalAlumnosMasculinoInicial')->default(0);
            $table->unsignedInteger('nTotalAlumnosMasculinoPrimaria')->default(0);
            $table->unsignedInteger('nTotalAlumnosMasculinoSecundaria')->default(0);
            $table->unsignedInteger('nTotalAlumnosMasculinoEBE')->default(0);
            $table->unsignedInteger('nTotalAlumnosMasculinoCETPRO')->default(0);

            $table->unsignedInteger('nTotalAlumnosFemeninoInicial')->default(0);
            $table->unsignedInteger('nTotalAlumnosFemeninoPrimaria')->default(0);
            $table->unsignedInteger('nTotalAlumnosFemeninoSecundaria')->default(0);
            $table->unsignedInteger('nTotalAlumnosFemeninoEBE')->default(0);
            $table->unsignedInteger('nTotalAlumnosFemeninoCETPRO')->default(0);


            
            $table->unsignedInteger('caracteristicas_institucion')->default(1);
            $table->foreign('caracteristicas_institucion')->references('id')->on('caracteristicas_institucion');

            $table->string('Turno',50);


            $table->unsignedInteger('bdirector')->default(0);
            $table->string('director_nombres_apellidos',200);
            $table->string('contacto_dni',8);
            $table->string('director_celular',20);
            $table->string('director_email',100);
            $table->unsignedInteger('director_condicion_laboral')->default(1);
            $table->string('director_tiempo_cargo',100);


            $table->unsignedInteger('bresponsable')->default(0);
            $table->string('responsable_nombres_apellidos',200);
            $table->string('responsable_dni',8);
            $table->string('responsable_celular',20);
            $table->string('responsable_email',100);
            $table->unsignedInteger('responsable_condicion_laboral')->default(1);
            $table->string('responsable_tiempo_cargo',100);


            $table->unsignedInteger('users_id')->default(1);
            $table->foreign('users_id')->references('id')->on('users');
            $table->string('nombre_usuario',100)->default('ND');


            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados'); 

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
