<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTBanios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('banios', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('nombre_descripcion_banios',50);
            $table->timestamps();
        });
        
        

        DB::table('banios')->insert([
            ['nombre_descripcion_banios' => '0 Baños'],
            ['nombre_descripcion_banios' => '1 Baño'],
            ['nombre_descripcion_banios' => '1.5 Baños'],
            ['nombre_descripcion_banios' => '2 Baños'],
            ['nombre_descripcion_banios' => '2.5 Baños'],
            ['nombre_descripcion_banios' => '3 Baños'],
            ['nombre_descripcion_banios' => '3.5 Baños'],
            ['nombre_descripcion_banios' => '4 Baños'],
            ['nombre_descripcion_banios' => '4.5 Baños'],
            ['nombre_descripcion_banios' => '5 Baños'],
            ['nombre_descripcion_banios' => '> 5 Baños'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('banios');
    }
}
