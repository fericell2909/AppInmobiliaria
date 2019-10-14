<?php

namespace App\Models;

use App\Models\EncuestaDetalle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class EncuestaCabecera extends Model
{
	protected $table ='encuestas_cabecera';
	public $primarykey='id';
	
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
					$detalle->otros = ( (in_array($scadena.'_otros', $data)) ?  $data[$scadena.'_otros'] : "" ) ;
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
}
