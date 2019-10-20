<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CTTableArchivos extends Migration
{

	
    public function up()
    {
	    Schema::create('encuestas_archivos', function (Blueprint $table) {
		    $table->string('identificador',20);
		    $table->string('url_archivo',500)->default('');
		    $table->string('extension',100)->default('');
		    $table->unsignedInteger('estados_id')->default(1);
		    $table->foreign('estados_id')->references('id')->on('estados');
		    
		    $table->timestamps();
	    });
	    
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
