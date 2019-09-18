<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedureZonasUspListarZonasProvinciasXDepartamento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*DB::unprepared('CREATE PROCEDURE usp_listar_zonas_provincias_x_departamento(IN CODIGO INTEGER)
                BEGIN
                   select z.id,z.cNomZona
                    from zonas z
                    where substring(z.ccodzona,1,2) in(
                    select substring(zon.cCodZona,1,2)
                    from zonas zon
                    where zon.id = CODIGO
                    ) and substring(z.ccodzona,5,12)=00000000 AND
                    substring(z.ccodzona,3,4) <> 00 and z.id <> CODIGO;
    
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
