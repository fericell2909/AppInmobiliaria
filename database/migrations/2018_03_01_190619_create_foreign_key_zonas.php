<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeyZonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement("ALTER TABLE desastres_ubicaciones ADD CONSTRAINT fk_departamento_id FOREIGN KEY(departamento_id) REFERENCES zonas(id)");

        DB::statement("ALTER TABLE desastres_ubicaciones ADD CONSTRAINT fk_provincia_id FOREIGN KEY(provincia_id) REFERENCES zonas(id)");

        DB::statement("ALTER TABLE desastres_ubicaciones ADD CONSTRAINT fk_distrito_id FOREIGN KEY(distrito_id) REFERENCES zonas(id)");
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
