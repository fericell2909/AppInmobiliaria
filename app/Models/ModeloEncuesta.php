<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class ModeloEncuesta extends Model
{
	protected $table ='mae_modelo_encuesta';
	
	public static function Listar($estados_id = '_all_')
	{
		if( $estados_id == '_all_') {
			
			return ModeloEncuesta::select("mae_modelo_encuesta.codigo_encuesta","mae_modelo_encuesta.descripcion" ,
				"mae_modelo_encuesta.estados_id")
				->get();
			
		} else
		{
			return ModeloEncuesta::select("mae_modelo_encuesta.codigo_encuesta","mae_modelo_encuesta.descripcion" ,
				"mae_modelo_encuesta.estados_id")
				->where('mae_modelo_encuesta.estados_id',$estados_id)
				->get();
		}
	}
	
	public static function Listar_ID($id){
		
		return ModeloEncuesta::select( "mae_modelo_encuesta.codigo_encuesta","mae_modelo_encuesta.descripcion" ,
			"mae_modelo_encuesta.estados_id")
			->where('mae_modelo_encuesta.codigo_encuesta',$id)
			->get();
	}
	
	public static function Listar_productos($codigo){
		
		$query = "SELECT DISTINCT  p.id AS id, p.descripcion AS descripcion FROM desastres_mae_modelo_encuesta_detalle det INNER JOIN desastres_mae_productos p ON det.productos_id = p.id WHERE det.codigo_encuesta_id  = '".$codigo."';";
		
		return DB::select($query);
	
	}

	public static function Listar_Actividades($codigo){
		
		$query = "SELECT DISTINCT det.productos_id AS codigoproducto , det.actividades_id AS codigoactividad , act.`descripcion` AS descripcionactividad FROM desastres_mae_modelo_encuesta_detalle det INNER JOIN desastres_mae_actividades act ON act.id = det.actividades_id WHERE det.codigo_encuesta_id  = '".$codigo."';";
		
		return DB::select($query);
	}
	
	public static function Listar_Fases($codigo){
		
		$query = "SELECT DISTINCT productos_id  AS codigoproducto ,  actividades_id AS codigoactividad  , fases_id AS codigofase ,
	        			CONCAT( cf.descripcion , ' : ' , f.descripcion) AS descripcion , f.descripcion as mdescripcion , cf.descripcion as descripcioncdigofase
	        	 FROM desastres_mae_modelo_encuesta_detalle det
					INNER JOIN desastres_mae_fase f ON f.id  = det.fases_id
					INNER JOIN desastres_mae_codigos_fase cf ON cf.id =  f.codigos_fase_id
				WHERE det.estados_id = 1 AND det.codigo_encuesta_id  = '".$codigo."';";
		
		return DB::select($query);
	}
	
	public static function Listar_Preguntas($codigo){
		
		$query = "SELECT DISTINCT det.productos_id  AS codigoproducto ,
					        det.actividades_id AS codigoactividad  , fases_id AS codigofase ,
					        p.preguntas_id AS codigopregunta ,
					        p.descripcion AS descripcion ,
					        p.bIncluyeotros AS bincluyeotros ,
					        p.bingresacantidades as bingresacantidades ,
					        p.bOpcionMultiples as bopcionmultiple
				FROM desastres_mae_modelo_encuesta_detalle det
					INNER JOIN desastres_mae_fase_preguntas fp ON fp.codigos_fase_id =  det.fases_id
					INNER JOIN desastres_mae_preguntas p ON fp.codigo_pregunta =  p.preguntas_id
				WHERE det.estados_id = 1  AND det.codigo_encuesta_id  = '".$codigo."';";
		
		return DB::select($query);
		
	}
	
	public static function Listar_Opciones($codigo){
		
		$query = "  SELECT opc.preguntas_id AS codigopregunta , opc.opcion AS codigoopcion, opc.descripcion AS descripcion
					FROM desastres_mae_preguntas_opciones opc
					WHERE opc.preguntas_id IN (
					SELECT DISTINCT p.preguntas_id
					FROM desastres_mae_modelo_encuesta_detalle det
						INNER JOIN desastres_mae_fase_preguntas fp ON fp.codigos_fase_id =  det.fases_id
						INNER JOIN desastres_mae_preguntas p ON fp.codigo_pregunta =  p.preguntas_id
					WHERE det.estados_id = 1 AND det.codigo_encuesta_id  = '".$codigo."' ) AND opc.estados_id = 1;";
		
		return DB::select($query);
		
	}
	
	public static function Listar_Cantidad_Actividades_x_Producto($codigo){
		
		$query = "  SELECT GROUP_CONCAT(dt.cantidad SEPARATOR '#') AS cadena
					FROM (
							SELECT LENGTH(tmp.cantidad) - LENGTH(REPLACE( tmp.cantidad , '*','')) + 1 AS cantidad
							FROM
							(
								SELECT productos_id AS producto, GROUP_CONCAT(DISTINCT actividades_id SEPARATOR '*') AS cantidad
								FROM desastres_mae_modelo_encuesta_detalle
								WHERE codigo_encuesta_id = '".$codigo."'
								GROUP BY productos_id
							) tmp
						) dt";
		
		return DB::select($query);
	}
	
	public static function Listar_Cantidad_Fases_x_Actividad($codigo){
		
		$query = "  SELECT GROUP_CONCAT(dt.cantidad SEPARATOR '#') AS cadena
					FROM (
							SELECT LENGTH(tmp.cantidad) - LENGTH(REPLACE( tmp.cantidad , '*','')) + 1 AS cantidad
							FROM
							(
								SELECT actividades_id AS fase, GROUP_CONCAT(DISTINCT fases_id SEPARATOR '*') AS cantidad
								FROM desastres_mae_modelo_encuesta_detalle
								WHERE codigo_encuesta_id = '".$codigo."'
								GROUP BY actividades_id
							) tmp
					) dt";
		
		return DB::select($query);
	}
	
	public static function Listar_Cantidad_Preguntas_x_Fase($codigo)
	{
		
		$query = "  SELECT GROUP_CONCAT(dt.cantidad SEPARATOR '#') AS cadena
					FROM (
						SELECT LENGTH(tmp.cantidad) - LENGTH(REPLACE( tmp.cantidad , '*','')) + 1 AS cantidad
						FROM
							(
								SELECT p.codigos_fase_id AS codigos_fase_id, GROUP_CONCAT(DISTINCT p.codigo_pregunta SEPARATOR '*') AS cantidad
								FROM desastres_mae_modelo_encuesta_detalle det
								  INNER JOIN desastres_mae_fase_preguntas p ON det.fases_id = p.codigos_fase_id
								WHERE codigo_encuesta_id = '".$codigo."' AND det.estados_id = '1'
								GROUP BY p.codigos_fase_id
								) tmp
					) dt";
		
		return DB::select($query);
		
	}
	
	public static function Listar_Preguntas_x_fase($codigo){
		
		
		$query = "  SELECT GROUP_CONCAT(tmp.cantidad) AS cadena
					FROM	(
						SELECT p.codigos_fase_id AS codigos_fase_id, GROUP_CONCAT(DISTINCT p.codigo_pregunta SEPARATOR '*') AS cantidad
								FROM desastres_mae_modelo_encuesta_detalle det
								  INNER JOIN desastres_mae_fase_preguntas p ON det.fases_id = p.codigos_fase_id
								WHERE codigo_encuesta_id = '".$codigo."' AND det.estados_id = '1'
								GROUP BY p.codigos_fase_id
						) tmp";
		
		return DB::select($query);
		
	}
	
	public static function Listar_Names_Preguntas($codigo){
		$query = "  SELECT GROUP_CONCAT(tmp.cantidad SEPARATOR ',') AS cadena
					FROM
					(
						SELECT p.codigos_fase_id AS codigos_fase_id,
					GROUP_CONCAT(DISTINCT
								CONCAT(
									'opt_producto_',det.productos_id,'_actividad_',det.actividades_id,'_fase_',det.fases_id,'_pregunta_'
									,p.codigo_pregunta) SEPARATOR '*') AS cantidad
				FROM desastres_mae_modelo_encuesta_detalle det
					INNER JOIN desastres_mae_fase_preguntas p ON det.fases_id = p.codigos_fase_id
				WHERE codigo_encuesta_id = '".$codigo."' AND det.estados_id = '1'
				GROUP BY p.codigos_fase_id
				) tmp";
		
		return DB::select($query);
	}
	
	public static function ListarBootGridModeloEncuesta($datos,$codigo_usuario)
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
		
		
		$query .= " SELECT desastres_mae_modelo_encuesta.codigo_encuesta , desastres_mae_modelo_encuesta.descripcion,
                           CASE  desastres_estados.id WHEN 1 THEN CONCAT('<span class=\"label label-success\">',desastres_estados.nombre_estado,'</span>') ELSE  CONCAT('<span class=\"label label-danger\">',desastres_estados.nombre_estado,'</span>') END    as  nombre_estado
                    FROM desastres_mae_modelo_encuesta
						inner join desastres_estados on desastres_estados.id = desastres_mae_modelo_encuesta.estados_id";
		
		
		if(!empty($_POST["searchPhrase"]))
		{
			$query .= ' WHERE ( desastres_mae_modelo_encuesta.codigo_encuesta LIKE "%'.$_POST["searchPhrase"].'%" ';
			$query .= 'OR desastres_mae_modelo_encuesta.descripcion LIKE "%'.$_POST["searchPhrase"].'%" ';
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
			$query .= ' ORDER BY desastres_mae_modelo_encuesta.codigo_encuesta DESC ';
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
		
		
		$total_records = ModeloEncuesta::select('desastres_mae_modelo_encuesta.codigo_encuesta')->count();
		
		
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
			
			$encuesta  = new ModeloEncuesta();
			
			$preguntas_id = ModeloEncuesta::ObtieneNuevoCorrelativo();
			
			$encuesta->codigo_encuesta = $preguntas_id[0]->correlativo;
			$encuesta->descripcion = $data['descripcion'];
			$encuesta->estados_id = $data['estados_id'];
			
			$encuesta->save();
			
			return true;
			
		} catch (Exception $e) {
			return false;
		}
		
	}
	
	public static function ObtieneNuevoCorrelativo(){
		
		return DB::select("SELECT IF( MAX(codigo_encuesta) IS NULL, (CONCAT('E', YEAR(NOW()), '00001' )), (CONCAT('P', YEAR(NOW()), LPAD(RIGHT(MAX(codigo_encuesta), 5) + 1, 5, '0')))) as correlativo FROM desastres_mae_modelo_encuesta WHERE LEFT(codigo_encuesta, 5) = CONCAT('P',YEAR(NOW()));");
		
	}
	
	public static function Editar($data)
	{
		
		try {
			
			$valores =  array(  'descripcion' => $data['descripcion'],
			                    'estados_id' => $data['estados_id']
			);
			
			ModeloEncuesta::where('codigo_encuesta', $data['codigo_encuesta'])
				->update($valores);
			
			return true;
		} catch (Exception $e) {
			return false;
		}
		
		
	}
}
