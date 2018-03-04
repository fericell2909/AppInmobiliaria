<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuarto extends Model
{
    protected $table ='cuartos';
    public $primarykey='id';

    public static function Listar_Cuartos()
 	{
 		return Cuarto::select("cuartos.id","cuartos.nombre_descripcion_cuartos")
 						->get();	
	}
}
