<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table ='niveles_institucion';
    public $primarykey='id';

    public static function Listar_Niveles()
 	{
 		return Nivel::select("niveles_institucion.id","niveles_institucion.descripcion")
 						->get();	
	}
}
