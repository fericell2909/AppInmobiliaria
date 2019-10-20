<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class EncuestaArchivo extends Model
{
	protected $table ='encuestas_archivos';
	public $primarykey='id';
	
	
	public static function Listar_ID($id){
		
		return EncuestaArchivo::select("encuestas_archivos.url_archivo","encuestas_archivos.extension" ,
			"encuestas_archivos.identficador")
			->where('encuestas_archivos.identficador',$id)
			->get();
	}
	
	public static function Nuevo($url,$extension,$identificador,$nombre)
	{
		$archivo = new EncuestaArchivo();
		
		$archivo->url_archivo = $url;
		$archivo->extension = $extension;
		$archivo->identificador = $identificador;
		$archivo->nombre = $nombre;
		$archivo->save();
		
	}
	public static function ListarBootGridEncuestaArchivo($datos,$identificador)
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
		
		
		$query .= " SELECT desastres_encuestas_archivos.url_archivo as url_archivo,
 							desastres_encuestas_archivos.nombre as nombre,
 						   desastres_encuestas_archivos.identificador as identificador ,
                           CASE  desastres_estados.id
                           		WHEN 1 THEN CONCAT('<span class=\"label label-success\">',desastres_estados.nombre_estado,'</span>') ELSE
                           					CONCAT('<span class=\"label label-danger\">',desastres_estados.nombre_estado,'</span>') END    as  nombre_estado
                    FROM desastres_encuestas_archivos
						inner join desastres_estados on desastres_estados.id = desastres_encuestas_archivos.estados_id
					WHERE desastres_encuestas_archivos.identificador = '" . $identificador . "'";
		
		
		if(!empty($_POST["searchPhrase"]))
		{
			$query .= ' AND (desastres_encuestas_archivos.url_archivo LIKE "%'.$_POST["searchPhrase"].'%" ';
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
			$query .= ' ORDER BY desastres_encuestas_archivos.url_archivo ASC ';
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
		
		
		$total_records = EncuestaArchivo::select('encuestas_archivos.identificador')
			->where('encuestas_archivos.identificador', $identificador )->count();
		
		
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
