<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class Local extends Model
{
	
	protected $table ='locales';
	
	public static function ListarBootLocal($datos,$codigo_usuario)
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
		
		
		$query .= " SELECT desastres_locales.id as id ,  desastres_locales.codigo  as codigo,
                           desastres_locales.nombre as nombre,
                           desastres_locales.dre as dre,
                           desastres_locales.ugel as ugel,
                           CASE  desastres_estados.id WHEN 1 THEN CONCAT('<span class=\"label label-success\">',desastres_estados.nombre_estado,'</span>') ELSE  CONCAT('<span class=\"label label-danger\">',desastres_estados.nombre_estado,'</span>') END    as  nombre_estado
                    FROM desastres_locales
						inner join desastres_estados on desastres_estados.id = desastres_locales.estados_id";
		
		
		if(!empty($_POST["searchPhrase"]))
		{
			$query .= ' WHERE ( desastres_locales.codigo LIKE "%'.$_POST["searchPhrase"].'%" ';
			$query .= 'OR desastres_locales.nombre LIKE "%'.$_POST["searchPhrase"].'%" ';
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
			$query .= ' ORDER BY desastres_locales.nombre ASC ';
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
		
		
		$total_records = Local::select('desastres_locales.codigo')->count();
		
		
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
