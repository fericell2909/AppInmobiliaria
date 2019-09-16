<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class Zona extends Model
{
    protected $table = 'zonas';
    public $primarykey = 'id';

    public static function Listar_zonas_departamentos()
    {

        #return  DB::select("call usp_listar_zonas_departamentos"); 
        return DB::select("SELECT z.id, z.cNomZona
                    FROM zonas z
                    WHERE substring(z.ccodzona,3,12)=0000000000;");
    }
    public static function Listar_zonas_provincias_x_departamento($codigo)
    {
         #return DB::select("call usp_listar_zonas_provincias_x_departamento($codigo)");
    
        //return DB::select(" select z.id,z.cNomZona
        //            from zonas z
        //            where substring(z.ccodzona,1,4) in(
        //            select substring(zon.cCodZona,1,4)
        //            from zonas zon
        //            where zon.id = '" . $codigo. "' ) and substring(z.ccodzona,7,12)=000000 AND
        //            substring(z.ccodzona,5,6) <> 00 and z.id <> '" . $codigo. "';");
        
        $concatenar = "select z.id,z.cNomZona from zonas z where substring(z.ccodzona,1,2) in( select substring(zon.cCodZona,1,2) from zonas zon where zon.id =  ".$codigo.") and substring(z.ccodzona,5,12)=00000000 AND substring(z.ccodzona,3,4) <> 00 and z.id <> ".$codigo.";";
         #echo $concatenar;
         return DB::select($concatenar);
                    
    }
    public static function Listar_zonas_distritos_x_provincia($codigo)
    {
        $concatenar = " select z.id,z.cNomZona from zonas z where substring(z.ccodzona,1,4) in(
                    select substring(zon.cCodZona,1,4)
                    from zonas zon
                    where zon.id = ".$codigo.") and substring(z.ccodzona,7,12)=000000 AND substring(z.ccodzona,5,6) <> 00 and z.id <> ".$codigo.";";
         #echo $concatenar;
         return DB::select($concatenar);
    }
    public static function Listar_Zona_x_ID($codigo)
    {

        return DB::select('select zonas.id,zonas.cNomZona from zonas where zonas.id = ?', [$codigo]);
    }
}
