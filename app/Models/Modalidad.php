<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    protected $table ='modalidad_institucion';
    public $primarykey='id';

    public static function Listar_Modalidades_Institucion()
 	{
 		return Modalidad::select("modalidad_institucion.id","modalidad_institucion.descripcion")
 						->get();	
	}
}
