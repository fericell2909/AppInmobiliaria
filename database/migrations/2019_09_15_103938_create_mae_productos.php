<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaeProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
       # Descripcion de Productos.
        Schema::create('mae_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',500);
            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->timestamps();
        });

        DB::table('mae_productos')->insert([
            ['descripcion' => 'PRODUCTO 3000734: CAPACIDAD INSTALADA PARA LA PREPARACIÓN Y RESPUESTA FRENTE A EMERGENCIAS Y DESASTRES','estados_id' => 1],
            ['descripcion' => 'PRODUCTO 3000738: PERSONAS CON FORMACIÓN Y CONOCIMIENTO EN GESTIÓN DEL RIESGO DE DESASTRES Y ADAPTACIÓN AL CAMBIO CLIMÁTICO','estados_id' => 1],
            ['descripcion' => 'PRODUCTO 3000739: POBLACIÓN CON PRÁCTICAS SEGURAS PARA LA RESILIENCIA','estados_id' => 1],    
            ['descripcion' => 'PRODUCTO 3000740: SERVICIOS PÚBLICOS SEGUROS ANTE EMERGENCIAS Y DESASTRES','estados_id' => 1],
            ['descripcion' => 'PRODUCTO 3000737: ESTUDIOS PARA LA ESTIMACIÓN DEL RIESGO DE DESASTRES','estados_id' => 1],
        ]);

        # Descripcion de Activiades.
        Schema::create('mae_actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',500);
            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->timestamps();
        });

        DB::table('mae_actividades')->insert([
            ['descripcion' => 'ACTIVIDAD 5005612: DESARROLLO DE LOS  CENTROS  Y ESPACIOS DE MONITOREO DE EMERGENCIAS Y DESASTRES','estados_id' => 1],
            ['descripcion' => 'ACTIVIDAD 5005611: ADMINISTRACIÓN Y ALMACENAMIENTO DE KITS DE EMERGENCIA PARA LA ASISTENCIA FRENTE A LA EMERGENCIA Y DESASTRES','estados_id' => 1],
            ['descripcion' => 'ACTIVIDAD N° 5005580: FORMACIÓN Y CAPACITACIÓN EN MATERIA DE GESTIÓN DEL RIESGO DE DESASTRES Y ADAPTACIÓN AL CAMBIO CLIMÁTICO','estados_id' => 1],    
            ['descripcion' => 'ACTIVIDAD N° 5005581: DESARROLLO  DE CAMPAÑAS COMUNICACIONALES PARA LA GESTIÓN DEL RIESGO DE DESASTRES','estados_id' => 1],
            ['descripcion' => 'ACTIVIDAD N° 5005585: SEGURIDAD FÍSICO FUNCIONAL DE SERVICIOS PÚBLICOS','estados_id' => 1],
            ['descripcion' => 'ACTIVIDAD 5005570: DESARROLLO DE ESTUDIOS DE VULNERABILIDAD Y RIESGO EN SERVICIOS PÚBLICOS','estados_id' => 1],
        ]);

        
        # Descripcion de Activiades.
        Schema::create('mae_codigos_fase', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',50);
            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->timestamps();
        });    


        DB::table('mae_codigos_fase')->insert([
            ['descripcion' => 'A','estados_id' => 1],
            ['descripcion' => 'B','estados_id' => 1],
            ['descripcion' => 'C','estados_id' => 1],    
            ['descripcion' => 'D','estados_id' => 1],
            ['descripcion' => 'E','estados_id' => 1],
            ['descripcion' => 'F','estados_id' => 1],
            ['descripcion' => 'G','estados_id' => 1],
            ['descripcion' => 'H','estados_id' => 1],
            ['descripcion' => 'I','estados_id' => 1],
            ['descripcion' => 'J','estados_id' => 1],
            ['descripcion' => 'K','estados_id' => 1],
            ['descripcion' => 'L','estados_id' => 1],
            ['descripcion' => 'M','estados_id' => 1],
            ['descripcion' => 'N','estados_id' => 1],
            ['descripcion' => 'O','estados_id' => 1],
            ['descripcion' => 'P','estados_id' => 1],
            ['descripcion' => 'Q','estados_id' => 1],
            ['descripcion' => 'R','estados_id' => 1],
            ['descripcion' => 'S','estados_id' => 1],
            ['descripcion' => 'T','estados_id' => 1],
            ['descripcion' => 'U','estados_id' => 1],
            ['descripcion' => 'V','estados_id' => 1],
            ['descripcion' => 'W','estados_id' => 1],
            ['descripcion' => 'X','estados_id' => 1],
            ['descripcion' => 'Y','estados_id' => 1],
            ['descripcion' => 'Z','estados_id' => 1],
        ]);


        # Descripcion de Fases.
        Schema::create('mae_fase', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',500);
            $table->unsignedInteger('codigos_fase_id')->default(1);
            $table->foreign('codigos_fase_id')->references('id')->on('mae_codigos_fase');
            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->timestamps();

        });

        DB::table('mae_fase')->insert([
            ['descripcion' => 'ESPACIOS FÍSICO DE MONITOREO Y SEGUIMIENTO EN LA INSTITUCIÓN EDUCATIVA', 'codigos_fase_id' => 1,'estados_id' => 1],
            ['descripcion' => 'La IE cuenta con copia físico / digital de los siguientes documentos básicos para uso del EMED', 'codigos_fase_id' => 2,'estados_id' => 1],
            ['descripcion' => 'STOCK DE KITS', 'codigos_fase_id' => 3,'estados_id' => 1],
            ['descripcion' => 'ALMACENAMIENTO DE KITS', 'codigos_fase_id' => 4,'estados_id' => 1],
            ['descripcion' => 'USO DE KITS', 'codigos_fase_id' => 5,'estados_id' => 1],
            ['descripcion' => 'PERSONAS CAPACITADAS', 'codigos_fase_id' => 6,'estados_id' => 1],
            ['descripcion' => 'CAPACIDADES ADQUIRIDAS Y PUESTA EN PRACTICA DE ACTIVIDADES EN MATERIA DE GRD POR PARTE DE LOS DOCENTES DE LA IE', 'codigos_fase_id' => 7,'estados_id' => 1],
            ['descripcion' => 'DESARROLLO DE LA GESTIÓN DEL RIESGO DE DESASTRES EN LA IE', 'codigos_fase_id' => 8,'estados_id' => 1],
            ['descripcion' => 'LAS BRIGADAS DE LAS IE', 'codigos_fase_id' => 9,'estados_id' => 1],
            ['descripcion' => 'INSTRUMENTOS DESARROLLADOS EN EL MARCO DE LA GESTIÓN DEL RIESGO DE DESASTRES DE LA IE, (Físico o Digital)', 'codigos_fase_id' => 10,'estados_id' => 1],
            ['descripcion' => 'La IE incorpora, articula y desarrolla la Gestión del Riesgo de Desastres para una cultura de prevención en los siguientes documentos de gestión', 'codigos_fase_id' => 11,'estados_id' => 1],

            ['descripcion' => 'TIPO DE MATERIAL COMUNICACIONAL QUE RECIBIÓ', 'codigos_fase_id' => 12,'estados_id' => 1],
            ['descripcion' => 'TEMÁTICA DEL MATERIAL COMUNICACIONAL RECIBIDO', 'codigos_fase_id' => 13,'estados_id' => 1],
            ['descripcion' => 'ACTIVIDADES DE DIFUSIÓN / PARTICIPACIÓN EN LA INSTITUCIÓN EDUCATIVA', 'codigos_fase_id' => 14,'estados_id' => 1],
            ['descripcion' => 'DISPOSITIVOS DE SEGURIDAD CON LOS QUE CUENTA LA IE', 'codigos_fase_id' => 15,'estados_id' => 1],
            ['descripcion' => 'IE EVALUADA CON FICHA ISE', 'codigos_fase_id' => 16,'estados_id' => 1],
            ['descripcion' => 'PERSONAS CAPACITADAS', 'codigos_fase_id' => 17,'estados_id' => 1],
 
            ]);
        

        # Descripcion de Fases.
        Schema::create('mae_fase_preguntas', function (Blueprint $table) {
            $table->unsignedInteger('codigos_fase_id');
            $table->foreign('codigos_fase_id')->references('id')->on('mae_fase');
            $table->string('codigo_pregunta',10);
            $table->foreign('codigo_pregunta')->references('preguntas_id')->on('mae_preguntas'); 

            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');

            #$table->primary(['codigos_fase_id', 'preguntas_id','estados_id']); 
            $table->timestamps();

        });

        DB::table('mae_fase_preguntas')->insert([
            ['codigos_fase_id' => 1 , 'codigo_pregunta' => 'P201900001','estados_id' => 1],
            ['codigos_fase_id' => 1 , 'codigo_pregunta' => 'P201900002','estados_id' => 1],
            ['codigos_fase_id' => 1 , 'codigo_pregunta' => 'P201900003','estados_id' => 1],
            ['codigos_fase_id' => 1 , 'codigo_pregunta' => 'P201900004','estados_id' => 1],
            ['codigos_fase_id' => 1 , 'codigo_pregunta' => 'P201900005','estados_id' => 1],
        ]);





        Schema::create('mae_modelo_encuesta', function (Blueprint $table) {
            
            $table->string('codigo_encuesta',10)->unique();
            $table->string('descripcion',500);
            $table->string('usuario',50);

            $table->datetime('fecha_registro');
            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->timestamps();
           
        });

         DB::table('mae_modelo_encuesta')->insert([
            ['codigo_encuesta' => 'E201900001' , 'descripcion' => 'Encuesta MONITOREO DE LAS ACTIVIDADES EN GESTIÓN DEL RIESGO DE DESASTRES Y CAMBIO CLIMÁTICO EN INSTITUCIONES EDUCATIVAS 2019', 'fecha_registro' => date("Y-m-d H:i:s")  , 'usuario' => '44577092' ,'estados_id' => 1],
        ]);


        Schema::create('mae_modelo_encuesta_detalle', function (Blueprint $table) {
            
            $table->string('codigo_encuesta_id',10);
            $table->foreign('codigo_encuesta_id')->references('codigo_encuesta')->on('mae_modelo_encuesta');

            $table->unsignedInteger('productos_id')->default(1);
            $table->foreign('productos_id')->references('id')->on('mae_productos');
            $table->unsignedInteger('actividades_id')->default(1);
            $table->foreign('actividades_id')->references('id')->on('mae_actividades');
            
            $table->unsignedInteger('fases_id')->default(1);
            $table->foreign('fases_id')->references('id')->on('mae_fase');

            
            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');
            #$table->primary(['codigo_encuesta_id', 'productos_id','actividades_id', 'fases_id' ,'estados_id']); 
            $table->timestamps();

        });


        DB::table('mae_modelo_encuesta_detalle')->insert([
            ['codigo_encuesta_id' => 'E201900001', 'productos_id' => 1 , 'actividades_id' => 1, 'fases_id' => 1, 'estados_id' => 1],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
