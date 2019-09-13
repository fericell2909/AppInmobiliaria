<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTMaeTipoRespuesta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('mae_tipo_respuesta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100);
           
            $table->unsignedInteger('bMostrar')->default(1);
             $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->timestamps();
        });

         DB::table('mae_tipo_respuesta')->insert([
            ['descripcion' => 'Sistema','estados_id' => 1 , 'bMostrar' => 0], 
            ['descripcion' => 'SI( )  NO( )','estados_id' => 1, 'bMostrar' => 1],
            ['descripcion' => 'Exclusivo( ) Multiple( )','estados_id' => 1 , 'bMostrar' => 1],
            ['descripcion' => 'Detallado','estados_id' => 1, 'bMostrar' => 1], 
            ['descripcion' => 'Sistema','estados_id' => 1, 'bMostrar' => 1],   
            
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
