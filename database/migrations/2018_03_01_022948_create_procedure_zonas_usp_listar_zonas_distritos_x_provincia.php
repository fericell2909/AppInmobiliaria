<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedureZonasUspListarZonasDistritosXProvincia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /*DB::unprepared('CREATE PROCEDURE usp_listar_zonas_distritos_x_provincia(IN CODIGO INTEGER)
                BEGIN
                   select z.id,z.cNomZona
                    from zonas z
                    where substring(z.ccodzona,1,4) in(
                    select substring(zon.cCodZona,1,4)
                    from zonas zon
                    where zon.id = CODIGO
                    ) and substring(z.ccodzona,7,12)=000000 AND
                    substring(z.ccodzona,5,6) <> 00 and z.id <> CODIGO;
    
                    END');
        */
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
