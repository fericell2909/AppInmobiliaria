<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTMonedas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monedas', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('nombre_moneda',50);
            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->string('simbolo_moneda',10);
            $table->timestamps();
        });

        DB::table('monedas')->insert([
            ['nombre_moneda' => 'Soles','estados_id' => 1,'simbolo_moneda' => 'S/. '],
            ['nombre_moneda' => 'Dolares','estados_id' => 1,'simbolo_moneda' => '$/. '],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('monedas');
    }
}
