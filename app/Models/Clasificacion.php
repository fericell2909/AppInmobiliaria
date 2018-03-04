<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
       protected $table ='clasificaciones';
    public $primarykey='id';

    public static function Listar_Clasificaciones()
 	{
 		return Clasificacion::select("clasificaciones.id","clasificaciones.nombre_clasificacion")
 						->get();	
	} 
}