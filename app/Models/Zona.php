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

    	return  DB::select("call usp_listar_zonas_departamentos"); 
    }
    public static function Listar_zonas_provincias_x_departamento($codigo)
    {
    	 return DB::select("call usp_listar_zonas_provincias_x_departamento($codigo)");
    }
    public static function Listar_zonas_distritos_x_provincia($codigo)
    {
        return DB::select("call usp_listar_zonas_distritos_x_provincia($codigo)");
    }
    public static function Listar_Zona_x_ID($codigo)
    {

        return DB::select('select zonas.id,zonas.cNomZona from zonas where zonas.id = ?', [$codigo]);
    }
}
