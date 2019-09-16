<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class CondicionLaboral extends Model
{
	protected $table ='condicion_laboral';
	public $primarykey='id';
	
	public static function Listar($estados_id = '_all_')
	{
		if( $estados_id == '_all_') {
			
			return CondicionLaboral::select("condicion_laboral.id","condicion_laboral.descripcion" ,
				"condicion_laboral.estados_id")
				->get();
			
		} else
		{
			return CondicionLaboral::select("condicion_laboral.id","condicion_laboral.descripcion" ,
				"condicion_laboral.estados_id")
				->where('condicion_laboral.estados_id',$estados_id)
				->get();
		}
	}
	
	public static function Listar_ID($id){
		
		return CondicionLaboral::select("condicion_laboral.id","condicion_laboral.descripcion" ,
			"condicion_laboral.estados_id")
			->where('condicion_laboral.id',$id)
			->get();
	}
	
	public static function ListarBootGridCondicionLaboral($datos,$codigo_usuario)
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
		
		$query .= " SELECT desastres_condicion_laboral.id, desastres_condicion_laboral.descripcion,
                           CASE  desastres_condicion_laboral.estados_id WHEN 1 THEN CONCAT('<span class=\"label label-success\">',desastres_estados.nombre_estado,'</span>') ELSE  CONCAT('<span class=\"label label-danger\">',desastres_estados.nombre_estado,'</span>') END    as  nombre_estado
                    FROM desastres_condicion_laboral
						inner join desastres_estados on desastres_estados.id = desastres_condicion_laboral.estados_id";
		
		
		if(!empty($_POST["searchPhrase"]))
		{
			$query .= ' WHERE (desastres_condicion_laboral.id LIKE "%'.$_POST["searchPhrase"].'%" ';
			$query .= 'OR desastres_condicion_laboral.descripcion LIKE "%'.$_POST["searchPhrase"].'%" ';
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
			$query .= ' ORDER BY desastres_condicion_laboral.id DESC ';
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
		
		
		$total_records = CondicionLaboral::select('condicion_laboral.id')->count();
		
		
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
			$caracteristicas_institucion  = new CondicionLaboral();
			$caracteristicas_institucion->descripcion = $data['descripcion'];
			$caracteristicas_institucion->estados_id = $data['estados_id'];
			
			$caracteristicas_institucion->save();
			
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
			
			CondicionLaboral::where('id',$data['id'])
				->update($valores);
			
			return true;
		} catch (Exception $e) {
			return false;
		}
		
		
	}
}
