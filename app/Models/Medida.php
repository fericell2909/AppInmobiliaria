<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
           protected $table ='medidas';
    public $primarykey='id';

    public static function Listar_Medidas()
 	{
 		return Medida::select("medidas.id","medidas.descripcion_medida")
 						->get();	
	}
}
