<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class PreguntaOpcion extends Model
{
	protected $table ='mae_preguntas_opciones';
	
	public static function DevuelveCorrelativoOpcion($pregunta_id){
		return DB::select("SELECT IF( MAX(opcion) IS NULL, 1 , MAX(opcion) + 1) as correlativo FROM desastres_mae_preguntas_opciones WHERE preguntas_id = '" .$pregunta_id . "';");
	}
	public static function Nuevo($data){
		
		$preguntaopcion = new PreguntaOpcion();
		
		
		$preguntaopcion->preguntas_id = $data['pregunta_id'];
		$preguntaopcion->opcion = $data['opcion'];
		$preguntaopcion->descripcion = $data['descripcion'];
		$preguntaopcion->estados_id = $data['estados_id'];
		$preguntaopcion->save();
	}
	
	public static function NuevoMaestro($pregunta_id,$codigo){
		
		$cadenasql = "insert into desastres_mae_preguntas_opciones ( preguntas_id , opcion , descripcion , estados_id ) ";
		
		#$cadena_select = " SELECT  '" . $pregunta_id . "' , @rownum:=@rownum+1 , descripcion ,'1' FROM ";
		
		$cadena_select = " SELECT  '" . $pregunta_id . "' , id , descripcion ,'1' FROM ";
		
		$cadenasql = $cadenasql . $cadena_select;
		
		switch ($codigo) {
			case 1:
				# desastres_niveles_institucion
				$cadenasql = $cadenasql . " desastres_niveles_institucion WHERE estados_id = '1';";
				return DB::select($cadenasql);
				break;
			case 2:
				# desastres_caracteristicas_institucion
				$cadenasql = $cadenasql . " desastres_caracteristicas_institucion WHERE estados_id = '1';";
				return DB::select($cadenasql);
				break;
			case 3:
				# desastres_modalidad_institucion
				$cadenasql = $cadenasql . " desastres_modalidad_institucion WHERE estados_id = '1';";
				return DB::select($cadenasql);
				break;
			case 4:
				# desastres_aliados_estrategicos
				$cadenasql = $cadenasql . " desastres_aliados_estrategicos WHERE estados_id = '1';";
				return DB::select($cadenasql);
				break;
			
			case 5:
				# desastres_condicion_laboral
				$cadenasql = $cadenasql . " desastres_condicion_laboral WHERE estados_id = '1';";
				return DB::select($cadenasql);
				break;
		}
		
	}
	
	public static function Editar($data){
		
		$valores = array(
			'descripcion' => $data['descripcion'] ,
			'estados_id' => $data['estados_id']
		);
		
		PreguntaOpcion::where('preguntas_id',$data['pregunta_id'])
			->where('opcion',$data['opcion'])
			->update($valores);
		
	}
	
	public static function ListarBootGridPreguntaOpcion($datos,$pregunta_id)
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
		
		
		$query .= " SELECT desastres_mae_preguntas_opciones.preguntas_id, desastres_mae_preguntas_opciones.descripcion,
                           CASE  desastres_estados.id WHEN 1 THEN CONCAT('<span class=\"label label-success\">',desastres_estados.nombre_estado,'</span>') ELSE  CONCAT('<span class=\"label label-danger\">',desastres_estados.nombre_estado,'</span>') END    as  nombre_estado ,
                           desastres_mae_preguntas_opciones.opcion as correlativo , desastres_estados.id as estados_id
                    FROM desastres_mae_preguntas_opciones
						inner join desastres_estados on desastres_estados.id = desastres_mae_preguntas_opciones.estados_id
					WHERE desastres_mae_preguntas_opciones.preguntas_id = '" . $pregunta_id . "'";
		
		
		if(!empty($_POST["searchPhrase"]))
		{
			$query .= ' AND (desastres_mae_preguntas_opciones.preguntas_id LIKE "%'.$_POST["searchPhrase"].'%" ';
			$query .= 'OR desastres_mae_preguntas_opciones.descripcion LIKE "%'.$_POST["searchPhrase"].'%" ';
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
			$query .= ' ORDER BY desastres_mae_preguntas_opciones.opcion ASC ';
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
		
		
		$total_records = PreguntaOpcion::select('mae_preguntas_opciones.preguntas_id')
			->where('preguntas_id',$pregunta_id)->count();
		
		
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
