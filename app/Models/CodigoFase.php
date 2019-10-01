<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class CodigoFase extends Model
{
	protected $table = 'mae_codigos_fase';
	public $primarykey='id';
	
	public static function Listar($estados_id = '_all_')
	{
		if( $estados_id == '_all_') {
			
			return CodigoFase::select("mae_codigos_fase.id","mae_codigos_fase.descripcion" ,
				"mae_codigos_fase.estados_id")
				->get();
			
		} else
		{
			return CodigoFase::select("mae_codigos_fase.id","mae_codigos_fase.descripcion" ,
				"mae_codigos_fase.estados_id")
				->where('mae_codigos_fase.estados_id',$estados_id)
				->get();
		}
	}
	
	public static function Listar_ID($id){
		
		return CodigoFase::select("mae_codigos_fase.id","mae_codigos_fase.descripcion" ,
			"mae_codigos_fase.estados_id")
			->where('mae_codigos_fase.id',$id)
			->get();
	}
	
	public static function ListarBootGridCodigoFase($datos,$codigo_usuario)
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
		
		$nombre_estado = '<span class="'.'"label label-success"> amen</span>';
		
		$query .= " SELECT desastres_mae_codigos_fase.id, desastres_mae_codigos_fase.descripcion,
                           CASE  desastres_estados.id WHEN 1 THEN CONCAT('<span class=\"label label-success\">',desastres_estados.nombre_estado,'</span>') ELSE  CONCAT('<span class=\"label label-danger\">',desastres_estados.nombre_estado,'</span>') END    as  nombre_estado
                    FROM desastres_mae_codigos_fase
						inner join desastres_estados on desastres_estados.id = desastres_mae_codigos_fase.estados_id";
		
		
		if(!empty($_POST["searchPhrase"]))
		{
			$query .= ' WHERE (desastres_mae_codigos_fase.id LIKE "%'.$_POST["searchPhrase"].'%" ';
			$query .= 'OR desastres_mae_codigos_fase.descripcion LIKE "%'.$_POST["searchPhrase"].'%" ';
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
			$query .= ' ORDER BY desastres_mae_codigos_fase.id DESC ';
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
		
		
		$total_records = CodigoFase::select('desastres_mae_codigos_fase.id')->count();
		
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
	
	public static function Nuevo($data)
	{
		
		try {
			$codigofase  = new CodigoFase();
			$codigofase->descripcion = $data['descripcion'];
			$codigofase->estados_id = $data['estados_id'];
			
			$codigofase->save();
			
			return true;
			
		} catch (Exception $e) {
			return false;
		}
		
		
	}
	
	public static function Editar($data)
	{
		
		try {
			
			$valores =  array(  'descripcion' => $data['descripcion'],
			                    'estados_id' => $data['estados_id']
			);
			
			CodigoFase::where('id',$data['id'])
				->update($valores);
			
			return true;
		} catch (Exception $e) {
			return false;
		}
		
	}
}
