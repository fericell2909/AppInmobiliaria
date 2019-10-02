<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class FasePregunta extends Model
{
	
	protected $table ='mae_fase_preguntas';
	
	public static function Nuevo($data){
		
		$fasepregunta = new FasePregunta();
		
		$fasepregunta->codigos_fase_id  = $data['codigos_fase_id'];
		$fasepregunta->codigo_pregunta = $data['codigo_pregunta'];
		$fasepregunta->estados_id = $data['estados_id'];
		$fasepregunta->save();
	
	}
	
	public static function Editar($data){
		
		$valores = array( 'estados_id' => $data['estados_id']);
		
		FasePregunta::where('codigos_fase_id',$data['codigos_fase_id'])
					->where('codigo_pregunta',$data['codigo_pregunta'])
			->update($valores);
		
	}
	
	public static function ListarBootGridFasePregunta($datos,$codigos_fase_id)
	{
		$query = '';
		
		$records_per_page = 10;
		
		$start_from = 0;
		
		$current_page_number = 0;
		
		if(isset($_POST["rowCount"]))
		{
			$records_per_page = $datos["rowCount"];
		}
		else
		{
			$records_per_page = 10;
		}
		
		if(isset($_POST["current"]))
		{
			$current_page_number = $datos["current"];
		}
		else
		{
			$current_page_number = 1;
		}
		
		$start_from = ($current_page_number - 1) * $records_per_page;
		
		
		$query .= " SELECT desastres_mae_fase_preguntas.codigos_fase_id as codigos_fase_id,
 						   desastres_mae_fase_preguntas.codigo_pregunta as codigo_pregunta ,
                           CASE  desastres_estados.id
                           		WHEN 1 THEN CONCAT('<span class=\"label label-success\">',desastres_estados.nombre_estado,'</span>') ELSE
                           					CONCAT('<span class=\"label label-danger\">',desastres_estados.nombre_estado,'</span>') END    as  nombre_estado ,
                           desastres_estados.id as estados_id ,
                           desastres_mae_preguntas.descripcion as descripcionpregunta
                    FROM desastres_mae_fase_preguntas
						inner join desastres_estados on desastres_estados.id = desastres_mae_fase_preguntas.estados_id
						inner join desastres_mae_preguntas on desastres_mae_preguntas.preguntas_id = desastres_mae_fase_preguntas.codigo_pregunta
					WHERE desastres_mae_fase_preguntas.codigos_fase_id = '" . $codigos_fase_id . "'";
		
		
		if(!empty($_POST["searchPhrase"]))
		{
			$query .= ' AND (desastres_mae_fase_preguntas.codigo_pregunta LIKE "%'.$_POST["searchPhrase"].'%" ';
			$query .= 'OR desastres_mae_preguntas.descripcion LIKE "%'.$_POST["searchPhrase"].'%" ';
			$query .= 'OR desastres_estados.nombre_estado LIKE "%'.$_POST["searchPhrase"].'%" )';
		}
		
		$order_by = '';
		
		if(isset($_POST["sort"]) && is_array($_POST["sort"]))
		{
			foreach($_POST["sort"] as $key => $value)
			{
				$order_by .= " $key $value, ";
			}
		}
		else
		{
			$query .= ' ORDER BY desastres_mae_fase_preguntas.codigo_pregunta ASC ';
		}
		
		if($order_by != '')
		{
			$query .= ' ORDER BY ' . substr($order_by, 0, -2);
		}
		
		if($records_per_page != -1)
		{
			$query .= " LIMIT " . $start_from . ", " . $records_per_page .";";
		}
		
		
		$results = DB::select($query);
		
		
		$total_records = FasePregunta::select('mae_fase_preguntas.codigo_pregunta')
			->where('codigos_fase_id', $codigos_fase_id )->count();
		
		
		$output = array(
			'current'  => intval($datos["current"]),
			'rowCount'  => $records_per_page,
			'total'   => intval($total_records),
			'rows'   => $results
		);
		
		$total_records = null;
		$query = null;
		$records_per_page = null;
		$order_by = null;
		$start_from = null;
		
		return json_encode($output);
	}
}
