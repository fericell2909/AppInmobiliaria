<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table ='tipos';
    public $primarykey='id';

    public static function Listar_Tipos()
 	{
 		return Tipo::select("tipos.id","tipos.nombre_tipo")
 						->get();	
	}
}
