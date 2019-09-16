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
            $table->string('preguntas_id',10)->unique();
            $table->string('descripcion',500)->default('');
            $table->unsignedInteger('bOpcionMultiples')->default(0);
            
            $table->unsignedInteger('tipo_respuesta_id')->default(1);
            $table->foreign('tipo_respuesta_id')->references('id')->on('mae_tipo_respuesta');


            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');

            $table->timestamps();
        });

        

        DB::table('mae_preguntas')->insert([

            ['preguntas_id' => 'P201900001',
              'descripcion' => 'La IE. Cuenta con Espacio de Monitoreo de Emergencias y Desastres (EMED)' , 'bOpcionMultiples' => 0 , 'tipo_respuesta_id' => 2 , 'estados_id' => 1], 


            ['preguntas_id' => 'P201900002',
              'descripcion' => 'La IE cuenta con acceso a internet para el reporte de emergencias, desastres y peligros.' , 'bOpcionMultiples' => 0 , 'tipo_respuesta_id' => 2, 'estados_id' => 1],

            ['preguntas_id' => 'P201900003',
              'descripcion' => 'La IE. Cuenta con la ficha de Evaluación de Daños y Necesidades (EDAN) para el registro de emergencias. (Físico o digital)' , 'bOpcionMultiples' => 0 , 'tipo_respuesta_id' => 2, 'estados_id' => 1],


            ['preguntas_id' => 'P201900004',
              'descripcion' => 'La IE. Cuenta con nóminas de matrícula actualizadas' , 'bOpcionMultiples' => 0 , 'tipo_respuesta_id' => 2, 'estados_id' => 1],


            ['preguntas_id' => 'P201900005',
              'descripcion' => 'La IE. Cuenta con Directorio de docentes' , 'bOpcionMultiples' => 0 , 'tipo_respuesta_id' => 2, 'estados_id' => 1], 

            
            ['preguntas_id' => 'P201900006',
              'descripcion' => 'La IE Cuenta con Directorio de padres de familia.' , 'bOpcionMultiples' => 0 , 'tipo_respuesta_id' => 2, 'estados_id' => 1],                                           
            

           ['preguntas_id' => 'P201900007',
              'descripcion' => 'En caso de emergencia (y/o Helada/ Friaje) El MINEDU brindó kits de Actividades Lúdicas y de Soporte Socioemocional brindadas por el MINEDU' , 'bOpcionMultiples' => 0 , 'tipo_respuesta_id' => 2, 'estados_id' => 1], 
             


            
        ]);

         Schema::create('mae_preguntas_opciones', function (Blueprint $table) {
            $table->string('preguntas_id',10);
            $table->unsignedInteger('opcion');
            $table->string('descripcion',500)->default('');
            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->timestamps();
        });


        DB::table('mae_preguntas_opciones')->insert([
            ['preguntas_id' => 'P201900001', 'opcion' => 1, 'descripcion' => 'SI' ,'estados_id' => 1],
            ['preguntas_id' => 'P201900001', 'opcion' => 2,  'descripcion' => 'NO' ,'estados_id' => 1],
        ]);

        DB::table('mae_preguntas_opciones')->insert([
            ['preguntas_id' => 'P201900002', 'opcion' => 1,  'descripcion' => 'SI' ,'estados_id' => 1],
            ['preguntas_id' => 'P201900002', 'opcion' => 2,  'descripcion' => 'NO' ,'estados_id' => 1],
        ]);

        DB::table('mae_preguntas_opciones')->insert([
            ['preguntas_id' => 'P201900003', 'opcion' => 1,  'descripcion' => 'SI' ,'estados_id' => 1],
            ['preguntas_id' => 'P201900003', 'opcion' => 2,  'descripcion' => 'NO' ,'estados_id' => 1],
        ]);

        DB::table('mae_preguntas_opciones')->insert([
            ['preguntas_id' => 'P201900004', 'opcion' => 1,  'descripcion' => 'SI' ,'estados_id' => 1],
            ['preguntas_id' => 'P201900004', 'opcion' => 2,  'descripcion' => 'NO' ,'estados_id' => 1],
        ]);

        DB::table('mae_preguntas_opciones')->insert([
            ['preguntas_id' => 'P201900005', 'opcion' => 1,  'descripcion' => 'SI' ,'estados_id' => 1],
            ['preguntas_id' => 'P201900005', 'opcion' => 2,  'descripcion' => 'NO' ,'estados_id' => 1],
        ]); 

        DB::table('mae_preguntas_opciones')->insert([
            ['preguntas_id' => 'P201900006', 'opcion' => 1,  'descripcion' => 'SI' ,'estados_id' => 1],
            ['preguntas_id' => 'P201900006', 'opcion' => 2,  'descripcion' => 'NO' ,'estados_id' => 1],
        ]); 

        DB::table('mae_preguntas_opciones')->insert([
            ['preguntas_id' => 'P201900007', 'opcion' => 1,  'descripcion' => 'SI' ,'estados_id' => 1],
            ['preguntas_id' => 'P201900007', 'opcion' => 2,  'descripcion' => 'NO' ,'estados_id' => 1],
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
