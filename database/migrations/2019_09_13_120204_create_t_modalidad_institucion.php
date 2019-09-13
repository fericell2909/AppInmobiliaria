<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTModalidadInstitucion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


          Schema::create('modalidad_institucion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100);
            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->timestamps();
        });

         DB::table('modalidad_institucion')->insert([
            ['descripcion' => 'EBE','estados_id' => 1],
            ['descripcion' => 'EBA','estados_id' => 1],
            ['descripcion' => 'CETPRO','estados_id' => 1],    
            
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modalidad_institucion');
    }
}
