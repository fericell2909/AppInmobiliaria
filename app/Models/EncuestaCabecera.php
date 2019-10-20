<?php

namespace App\Models;

use App\Models\EncuestaDetalle;
use App\Models\User;
use App\Models\Pregunta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
class EncuestaCabecera extends Model

{
	protected $table ='encuestas_cabecera';
	public $primarykey='id';
	
	public static function Listar_Usuarios($rol_usuario,$email){
	
		if ( $rol_usuario == 1 || $rol_usuario == 2 ) {
			
			return User::select("users.name","users.email")
				->get();
		
		} else
		{
			return User::select("users.name","users.email")
						->where("users.email",$email)->get();
			
		}
	
	}
	
	public static function Lista_Datos_encuestadetalle($identificador)
	{
		
		return DB::select("SELECT desastres_encuestas_detalle.preguntas_id AS preguntas_id,
								desastres_encuestas_detalle.llave AS llave ,
								desastres_encuestas_detalle.valor AS valor ,
								desastres_encuestas_detalle.otros AS otros
							FROM desastres_encuestas_detalle
							WHERE desastres_encuestas_detalle.identificador = '" .$identificador.  "';");
		
	}
	public static function Datos_reporte($identificador)
	{
		
		return DB::select("SELECT desastres_locales.nombre AS nombre_local ,
							       desastres_locales.departamento AS departamento,
							       desastres_locales.provincia AS provincia,
							       desastres_locales.distrito AS distrito,
							       desastres_locales.direccion AS direccion,
							       desastres_locales.dre AS dre ,
							       desastres_locales.ugel AS ugel,
							       desastres_locales.codigo AS codigo_local,
							       desastres_niveles_institucion.descripcion AS nivel,
							       desastres_caracteristicas_institucion.descripcion AS caracteristica ,
							       desastres_modalidad_institucion.descripcion AS modalidad ,
							       desastres_mae_modelo_encuesta.descripcion AS titulo ,
							       desastres_encuestas_cabecera.director_contacto_celular AS director_contacto_celular,
							       desastres_encuestas_cabecera.director_contacto_dni AS director_contacto_dni,
							       desastres_encuestas_cabecera.director_contacto_email AS director_contacto_email,
							       desastres_encuestas_cabecera.director_contacto_nombres_apellidos AS director_contacto_nombre_apellidos
							FROM desastres_encuestas_cabecera
								  INNER JOIN desastres_locales ON desastres_encuestas_cabecera.codigo_local = desastres_locales.codigo
								  INNER JOIN desastres_niveles_institucion ON desastres_niveles_institucion.id = desastres_encuestas_cabecera.nivel
								  INNER JOIN desastres_caracteristicas_institucion ON desastres_caracteristicas_institucion.id = desastres_encuestas_cabecera.caracteristica
								  INNER JOIN desastres_modalidad_institucion ON desastres_modalidad_institucion.id = desastres_encuestas_cabecera.modalidad
								  INNER JOIN desastres_mae_modelo_encuesta ON desastres_mae_modelo_encuesta.codigo_encuesta =  desastres_encuestas_cabecera.codigo_encuesta
							WHERE identificador = '" .$identificador.  "';");
	
	}
	
	public static function Listar_Fichas_x_Usuario($datos,$email)
	{
		
		#return EncuestaCabecera::select("encuestas_cabecera.identificador","encuestas_cabecera.codigo_local","encuestas_cabecera.director_contacto_nombres_apellidos")
		#			->where("encuestas_cabecera.usuarioregistro",$usuario)
		#			->get();
		
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
		
		
		$query .= " SELECT desastres_encuestas_cabecera.usuarioregistro as usuario ,
 						   desastres_encuestas_cabecera.identificador as identificador,
 						   desastres_encuestas_cabecera.codigo_local as codigo_local,
 						   desastres_locales.nombre as nombrelocal,
                           CASE  desastres_estados.id
                           		WHEN 1 THEN CONCAT('<span class=\"label label-success\">',desastres_estados.nombre_estado,'</span>') ELSE
                           					CONCAT('<span class=\"label label-danger\">',desastres_estados.nombre_estado,'</span>') END    as  nombre_estado ,
                           desastres_encuestas_cabecera.director_contacto_nombres_apellidos as director_contacto_nombres_apellidos
                    FROM desastres_encuestas_cabecera
						inner join desastres_estados on desastres_estados.id = desastres_encuestas_cabecera.estados_id
						inner join desastres_locales on desastres_locales.codigo =  desastres_encuestas_cabecera.codigo_local
					WHERE desastres_encuestas_cabecera.usuarioregistro = '" . $email . "'";
		
		
		if(!empty($_POST["searchPhrase"]))
		{
			$query .= ' AND ( desastres_encuestas_cabecera.identificador LIKE "%'.$_POST["searchPhrase"].'%" ';
			#$query .= 'OR desastres_mae_preguntas.descripcion LIKE "%'.$_POST["searchPhrase"].'%" ';
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
			$query .= ' ORDER BY desastres_encuestas_cabecera.identificador ASC ';
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
		
		
		$total_records = EncuestaCabecera::select('encuestas_cabecera.usuarioregistro')
			->where('usuarioregistro', $email)->count();
		
		
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
	public static function NumeroEncuestasRegistradas($usuario){
		
		return EncuestaCabecera::select("encuestas_cabecera.identificador")
			->where('encuestas_cabecera.usuarioregistro',$usuario)
			->count();
	}
	public static function ObtieneNuevoCorrelativo(){
		
		return DB::select("SELECT IF( MAX(identificador) IS NULL, (CONCAT('F', YEAR(NOW()), '000000000000001' )),
								(CONCAT('F', YEAR(NOW()), LPAD(RIGHT(MAX(identificador), 15) + 1, 15, '0')))) as correlativo
								FROM desastres_encuestas_cabecera WHERE LEFT(identificador, 5) = CONCAT('F',YEAR(NOW()));");
		
	}
	public static function Nuevo($data){
		
		try
		{
			$encuesta =  new EncuestaCabecera();
			
			$identificador = EncuestaCabecera::ObtieneNuevoCorrelativo();
			
			$encuesta->identificador = $identificador[0]->correlativo;
			$encuesta->cantidad_productos = $data['cantidad_productos'];
			$encuesta->caracteristica = $data['caracteristica'];
			$encuesta->modalidad = $data['modalidad'];
			$encuesta->nivel = $data['nivel'];
			
			$encuesta->codigo_departamento = $data['codigo_departamento'];
			$encuesta->codigo_distrito = $data['codigo_distrito'];
			$encuesta->codigo_provincia = $data['codigo_provincia'];
			$encuesta->codigo_local = $data['codigo_local'];
			
			$encuesta->director_contacto_celular = $data['director_contacto_celular'];
			$encuesta->director_contacto_dni = $data['director_contacto_dni'];
			$encuesta->director_contacto_email = $data['director_contacto_email'];
			$encuesta->director_contacto_nombres_apellidos = $data['director_contacto_nombres_apellidos'];
			
			$encuesta->director_contacto_tiempo_cargo = $data['director_contacto_tiempo_cargo'];
			
			$encuesta->director_laboral = $data['director_laboral'];
			
			$encuesta->responsable_contacto_celular = $data['responsable_contacto_celular'];
			$encuesta->responsable_contacto_dni = $data['responsable_contacto_dni'];
			$encuesta->responsable_contacto_email = $data['responsable_contacto_email'];
			$encuesta->responsable_contacto_nombres_apellidos = $data['responsable_contacto_nombres_apellidos'];
			$encuesta->responsable_contacto_tiempo_cargo = $data['responsable_contacto_tiempo_cargo'];
			$encuesta->responsable_laboral = $data['responsable_laboral'];
			
			$encuesta->observaciones = $data['observaciones'];
			
			$encuesta->nAlmMascCETPRO = $data['nAlmMascCETPRO'];
			$encuesta->nAlmMascEBA = $data['nAlmMascEBA'];
			$encuesta->nAlmMascEBE = $data['nAlmMascEBE'];
			$encuesta->nAlmMascInicial = $data['nAlmMascInicial'];
			$encuesta->nAlmMascPrimaria = $data['nAlmMascPrimaria'];
			$encuesta->nAlmMascSecundaria = $data['nAlmMascSecundaria'];
			$encuesta->nAlmMujCETPRO = $data['nAlmMujCETPRO'];
			$encuesta->nAlmMujInicial = $data['nAlmMujInicial'];
			$encuesta->nAlmMujPrimaria = $data['nAlmMujPrimaria'];
			$encuesta->nAlmMujSecundaria = $data['nAlmMujSecundaria'];
			$encuesta->nAlmMujcEBA = $data['nAlmMujcEBA'];
			$encuesta->nAlmMujcEBE = $data['nAlmMujcEBE'];
			
			
			$encuesta->hdd_actividades_codigos = $data['hdd_actividades_codigos'];
			$encuesta->hdd_actividades_total = $data['hdd_actividades_total'];
			$encuesta->hdd_cadenaspreguntas_fases = $data['hdd_cadenaspreguntas_fases'];
			$encuesta->hdd_fases_codigos = $data['hdd_fases_codigos'];
			$encuesta->hdd_fases_total =  $data['hdd_fases_total'];
			$encuesta->hdd_grupoactividades = $data['hdd_grupoactividades'];
			$encuesta->hdd_grupofases = $data['hdd_grupofases'];
			$encuesta->hdd_grupopreguntas = $data['hdd_grupopreguntas'];
			$encuesta->hdd_preguntas_codigos = $data['hdd_preguntas_codigos'];
			$encuesta->hdd_preguntas_total = $data['hdd_preguntas_total'];
			$encuesta->hdd_productos_codigos = $data['hdd_productos_codigos'];
			$encuesta->hdd_productos_total = $data['hdd_productos_total'];
			$encuesta->hhdd_cadena_name_preguntas = $data['hhdd_cadena_name_preguntas'];
			$encuesta->usuarioregistro = $data['usuarioregistro'];
			$encuesta->estados_id = 1;
			$encuesta->codigo_encuesta = $data['codigo_encuesta'];
			$encuesta->ficha_turno_id = $data['ficha_turno_id'];
			
			$encuesta->save();
			
			$t_fase = $data['hdd_fases_total'];
			$t_pregunta = "";
			$hhdd_cadena_name = $data['hhdd_cadena_name_preguntas'];
			$explode_names = explode(',',$hhdd_cadena_name);
			
			$scadena = "";
			
			for ($i_fase = 1; $i_fase <= $t_fase; $i_fase++) {
				
				$cadena_aux_preguntas = explode('*',$explode_names[$i_fase-1]);
				
				$t_pregunta = count($cadena_aux_preguntas);
				
				for ($i_pregunta = 1 ; $i_pregunta <= $t_pregunta; $i_pregunta++) {
					
					$scadena = $cadena_aux_preguntas[$i_pregunta-1];
					
					$detalle = new EncuestaDetalle();
					
					$detalle->identificador = $identificador[0]->correlativo;
					
					$detalle->preguntas_id = substr($scadena, -10);
					$detalle->llave = $scadena;
					$detalle->valor = $data[$scadena];
					
					if (EncuestaCabecera::Incluye_Otros(substr($scadena, -10)) == 1) {
						
						#echo $data[$scadena.'_otros'];
						if(isset($data[$scadena.'_otros']) ? null : '' == null)
						{
							$detalle->otros = '' ;
						} else
						{
							$detalle->otros = $data[$scadena.'_otros'] ;
						}
					} else
					{
						$detalle->otros = ( (in_array($scadena.'_otros', $data)) ?  $data[$scadena.'_otros'] : "" ) ;
					}
					
					
					
					$detalle->estados_id = 1;
					
					$detalle->save();
					
				}
			}
			
			return true;
			
		}catch(Exception $e)
		{
			return fase;
		}
		
		
	
	
	}
	
	public static function Incluye_Otros($pregunta)
	{
		$data =  Pregunta::select("mae_preguntas.bIncluyeotros")
				->where("mae_preguntas.preguntas_id",$pregunta)
			->get();
		
		if (count($data) > 0 )
		{
			return $data[0]->bIncluyeotros;
			
		} else
		{
			return 0;
		}
	}
}
