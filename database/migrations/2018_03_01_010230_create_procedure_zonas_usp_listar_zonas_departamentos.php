<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedureZonasUspListarZonasDepartamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE PROCEDURE usp_listar_zonas_departamentos()
                BEGIN
                    SELECT z.id, z.cNomZona
                    FROM zonas z
                    WHERE substring(z.ccodzona,3,12)=0000000000;
    
                    END');
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
