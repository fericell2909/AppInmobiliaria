<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banio extends Model
{
    protected $table ='banios';
    public $primarykey='id';

    public static function Listar_Banios()
 	{
 		return Banio::select("banios.id","banios.nombre_descripcion_banios")
 						->get();	
	} 	   
}
