<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
       protected $table ='estados';
    public $primarykey='id';

    public static function Listar_Estados()
 	{
 		return Estado::select("estados.id","estados.nombre_estado")
 						->get();	
	}
}
