<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTCaractInstitucion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


         Schema::create('caracteristicas_institucion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100);
            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->timestamps();
        });

         DB::table('caracteristicas_institucion')->insert([
            ['descripcion' => 'UniDocente','estados_id' => 1],
            ['descripcion' => 'Polidocente','estados_id' => 1],
            ['descripcion' => 'Multigrado','estados_id' => 1],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristicas_institucion');
    }
}
