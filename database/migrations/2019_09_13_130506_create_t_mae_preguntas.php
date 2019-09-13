<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTMaePreguntas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mae_preguntas', function (Blueprint $table) {
            $table->string('preguntas_id',50)->unique();
            $table->string('descripcion',500)->default('');
            $table->unsignedInteger('bOpcionMultiples')->default(0);
            
            $table->unsignedInteger('tipo_respuesta_id')->default(1);
            $table->foreign('tipo_respuesta_id')->references('id')->on('mae_tipo_respuesta');


            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');

            $table->timestamps();
        });

        

        DB::table('mae_preguntas')->insert([

            ['preguntas_id' => 'P2019000000000000000000000000000000000000000000001',
              'descripcion' => 'La IE. Cuenta con Espacio de Monitoreo de Emergencias y Desastres (EMED)' , 'bOpcionMultiples' => 0 , 'tipo_respuesta_id' => 2 , 'estados_id' => 1], 


            ['preguntas_id' => 'P2019000000000000000000000000000000000000000000002',
              'descripcion' => 'La IE cuenta con acceso a internet para el reporte de emergencias, desastres y peligros.' , 'bOpcionMultiples' => 0 , 'tipo_respuesta_id' => 2, 'estados_id' => 1],

            ['preguntas_id' => 'P2019000000000000000000000000000000000000000000003',
              'descripcion' => 'La IE. Cuenta con la ficha de Evaluación de Daños y Necesidades (EDAN) para el registro de emergencias. (Físico o digital)' , 'bOpcionMultiples' => 0 , 'tipo_respuesta_id' => 2, 'estados_id' => 1],


            ['preguntas_id' => 'P2019000000000000000000000000000000000000000000004',
              'descripcion' => 'La IE. Cuenta con nóminas de matrícula actualizadas' , 'bOpcionMultiples' => 0 , 'tipo_respuesta_id' => 2, 'estados_id' => 1],


            ['preguntas_id' => 'P2019000000000000000000000000000000000000000000005',
              'descripcion' => 'La IE. Cuenta con Directorio de docentes' , 'bOpcionMultiples' => 0 , 'tipo_respuesta_id' => 2, 'estados_id' => 1], 

            
            ['preguntas_id' => 'P2019000000000000000000000000000000000000000000006',
              'descripcion' => 'La IE Cuenta con Directorio de padres de familia.' , 'bOpcionMultiples' => 0 , 'tipo_respuesta_id' => 2, 'estados_id' => 1],                                           
            

           ['preguntas_id' => 'P2019000000000000000000000000000000000000000000007',
              'descripcion' => 'En caso de emergencia (y/o Helada/ Friaje) El MINEDU brindó kits de Actividades Lúdicas y de Soporte Socioemocional brindadas por el MINEDU' , 'bOpcionMultiples' => 0 , 'tipo_respuesta_id' => 2, 'estados_id' => 1], 
             


            
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mae_preguntas');
    }
}
