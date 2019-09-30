<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class OpcionRespuestaPregunta extends Model
{
	protected $table = 'mae_asoc_preg_op';
	public $primarykey='id';
	
	public static function Listar($estados_id='_all_'){
		
		if($estados_id=='_all_'){
			
			return OpcionRespuestaPregunta::select("mae_asoc_preg_op.id","mae_asoc_preg_op.descripcion",
													"mae_asoc_preg_op.estados_id")->get();
			
		}else{
			return OpcionRespuestaPregunta::select("mae_asoc_preg_op.id","mae_asoc_preg_op.descripcion",
				"mae_asoc_preg_op.estados_id")->where('mae_asoc_preg_op.estados_id',$estados_id)->get();
		}
	}
}
