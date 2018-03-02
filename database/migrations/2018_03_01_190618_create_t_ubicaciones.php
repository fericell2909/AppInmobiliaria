<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTUbicaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('ubicaciones', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('titulo_ubicacion',500)->default('');
            $table->text('descripcion_ubicacion');
            $table->string('slug',600)->default('');

            $table->unsignedInteger('clasificaciones_id')->default(1);
            $table->foreign('clasificaciones_id')->references('id')->on('clasificaciones');
            $table->unsignedInteger('tipos_id')->default(1);
            $table->foreign('tipos_id')->references('id')->on('tipos');
            $table->unsignedInteger('estilos_id')->default(1);
            $table->foreign('estilos_id')->references('id')->on('tiposdetalles');
            $table->unsignedInteger('cuartos_id')->default(1);
            $table->foreign('cuartos_id')->references('id')->on('cuartos');
            $table->unsignedInteger('banios_id')->default(1);
            $table->foreign('banios_id')->references('id')->on('banios');
            
            $table->unsignedInteger('medidas_id')->default(1);
            $table->foreign('medidas_id')->references('id')->on('medidas');
            $table->double('nExtension',15,8)->default(0);

            $table->unsignedInteger('monedas_id')->default(1);
            $table->foreign('monedas_id')->references('id')->on('monedas');
            $table->double('nPrecio',15,8)->default(0);
            $table->unsignedInteger('nAniosAntiguedad')->default(1);

            $table->unsignedInteger('departamento_id');
            
            
            $table->unsignedInteger('provincia_id');
                            
            
            $table->unsignedInteger('distrito_id');
                              
            
            $table->double('nLatitudNegocio', 15, 8)->default(0);
            $table->double('nLongitudNegocio', 15, 8)->default(0);
            $table->string('cDireccionNegocio',100);

            $table->string('contacto_nombres_apellidos',200);
            $table->string('contacto_dni',8);
            $table->string('contacto_celular',20);
            $table->string('contacto_email',100);
            $table->string('contacto_direccion',500);
            $table->unsignedInteger('bImagenes')->default(0);

            $table->unsignedInteger('users_id')->default(1);
            $table->foreign('users_id')->references('id')->on('users');
            
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
        Schema::drop('ubicaciones');
    }
}
