<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTAliadosEstrategicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        Schema::create('aliados_estrategicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100);
            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->timestamps();
        });

         DB::table('aliados_estrategicos')->insert([
            ['descripcion' => 'COES MINEDU','estados_id' => 1],
            ['descripcion' => 'COE Regional','estados_id' => 1],
            ['descripcion' => 'COE Provincial','estados_id' => 1],    
            ['descripcion' => 'COE Local','estados_id' => 1],    
            ['descripcion' => 'Policía Nacional del Perú','estados_id' => 1],    
            ['descripcion' => 'Bomberos','estados_id' => 1],    
            ['descripcion' => 'Centros de Salud','estados_id' => 1],    
            ['descripcion' => 'Otros','estados_id' => 1],
        ]);

          
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aliados_estrategicos');
    }
}
