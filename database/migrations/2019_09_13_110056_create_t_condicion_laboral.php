<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTCondicionLaboral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('condicion_laboral', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion',100);
            $table->unsignedInteger('estados_id')->default(1);
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->timestamps();
        });

         DB::table('condicion_laboral')->insert([
            ['descripcion' => 'Nombrado','estados_id' => 1],
            ['descripcion' => 'Contratado','estados_id' => 1],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condicion_laboral');
    }
}
