<?php

namespace App\Http\Controllers;

use App\Models\FasePregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FasePreguntaController extends Controller
{
    public function FasePreguntaMostrarRegistros(Request $request)
    {
    	
	    $datos = $request->all();
	    
	    return FasePregunta::ListarBootGridFasePregunta($datos,Auth::id());
    	
	    
    }
    public function Mantenimiento(Request $request){
    	
	    $data  = $request->all();
	
	    $mensajerespuesta = "";
	    $codigorespuesta = 0;
	    try {
		
		    switch($data['tipo'])
		    {
			    #Nuevo
			    case 1:
			    	
				    FasePregunta::Nuevo($data);
				    $mensajerespuesta = "La Fase ha sido asociada correctamente.";
				    $codigorespuesta = 1;
				    break;
				    
			    #Editar
			    case 2:
			    	
				    FasePregunta::Editar($data);
				    $mensajerespuesta = "La Fase ha sido editada correctamente.";
				    $codigorespuesta = 1;
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
