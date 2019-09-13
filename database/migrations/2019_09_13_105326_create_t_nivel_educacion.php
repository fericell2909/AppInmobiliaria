<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTNivelEducacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveles_institucion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100);
            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->timestamps();
        });

         DB::table('niveles_institucion')->insert([
            ['descripcion' => 'Inicial','estados_id' => 1],
            ['descripcion' => 'Primaria','estados_id' => 1],
            ['descripcion' => 'Secundaria','estados_id' => 1],
        ]);



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('niveles_institucion');
    }
}
