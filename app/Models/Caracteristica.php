<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    protected $table ='caracteristicas_institucion';
    public $primarykey='id';

    public static function Listar_Caracteristicas_Institucion()
 	{
 		return Caracteristica::select("caracteristicas_institucion.id","caracteristicas_institucion.descripcion")
 						->get();	
	}
}
