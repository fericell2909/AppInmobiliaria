<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use Illuminate\Http\Request;
use App\Models\PreguntaOpcion;
use Illuminate\Support\Facades\Auth;

class PreguntaOpcionesController extends Controller
{
 
	public function PreguntasOpcionesMostrarRegistros($id,Request $request)
	{
		// $id = preguntas_id
		$datos = $request->all();
		return PreguntaOpcion::ListarBootGridPreguntaOpcion($datos,$id);
		//dd($datos);
	}
	public function Mantenimiento(Request $request){
		
		$data  = $request->all();
		
		//{"tipo" : ptipo ,  "pregunta_id" : ppreguntaid , "opcion" :  pcorrelativo ,
        //  "descripcion" : pdescripcion}
		#print_r($data);
		$codigorespuesta = 0;
		$mensajerespuesta = "";
		try {
			
	        switch($data['tipo'])
	        {
	            #Nuevo
		        case 1:
		        	
			        $correlativo = PreguntaOpcion::DevuelveCorrelativoOpcion($data["pregunta_id"]);
			        $data["opcion"] = $correlativo[0]->correlativo;
			        PreguntaOpcion::Nuevo($data);
		            $mensajerespuesta = "La Opcion ha sido registrada correctamente";
		            break;
		        #Editar
		        case 2:
		            PreguntaOpcion::Editar($data);
			        $mensajerespuesta = "La Opcion ha sido actualizada correctamente";
		            break;
		            
	        }
			$codigorespuesta = 1;
	  
		} catch (Exception $e) {
			$codigorespuesta = 0;
			$mensajerespuesta = "Ha Ocurrido un Error. Comuniquese con Sistemas.";
		}
		
		$output = array(
			'codigorespuesta'  => $codigorespuesta,
			'mensajerespuesta'  => $mensajerespuesta
		);
		
		return json_encode($output);
	}
}
