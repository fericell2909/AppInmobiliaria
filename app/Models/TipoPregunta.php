<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
class TipoPregunta extends Model
{
      protected $table ='mae_tipo_respuesta';
    public $primarykey='id';

    public static function Listar($estados_id = '_all_')
 	{
 		if( $estados_id == '_all_') {

 			return TipoPregunta::select("mae_tipo_respuesta.id","mae_tipo_respuesta.descripcion" , 
 										    "mae_tipo_respuesta.estados_id")
 						->get();

 		} else
 		{



 			return TipoPregunta::select("mae_tipo_respuesta.id","mae_tipo_respuesta.descripcion" , 
 										    "mae_tipo_respuesta.estados_id")
 									->where('mae_tipo_respuesta.estados_id',$estados_id)
 									->where('mae_tipo_respuesta.bMostrar','1')
 									->get();
 		}
	}

	public static function Listar_opciones_respuesta()
	{

		return TipoPregunta::select("mae_tipo_respuesta.id","mae_tipo_respuesta.descripcion" , 
 										    "mae_tipo_respuesta.estados_id")
 						->get();
	}
}
