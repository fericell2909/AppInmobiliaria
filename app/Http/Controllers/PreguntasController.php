<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pregunta;
use App\Models\Estado;
use App\Models\TipoPregunta;
use App\Models\OpcionRespuestaPregunta;

class PreguntasController extends Controller
{
    public function Listar()
    {

    	#$instituciones= NivelInstitucion::Listar('_all_');
    	return view('preguntas.listar');
    }

    public function Editar($id)
    {
    	
    	$preguntas = Pregunta::Listar_ID($id);
	    $estados = Estado::Listar_Estados();
	    $tipopreguntas = TipoPregunta::Listar('1');
	    $maestros =  TipoPregunta::Listar_opciones_respuesta();
	    $opcionmaestros = OpcionRespuestaPregunta::Listar('1');
	    
    	return view('preguntas.editar',compact('preguntas','estados','tipopreguntas','maestros','opcionmaestros'));
    
    }

    public function Nuevo()
    {
    	$estados = Estado::Listar_Estados();

    	$tipopreguntas = TipoPregunta::Listar('1');

    	$maestros =  TipoPregunta::Listar_opciones_respuesta();
			
    	$opcionmaestros = OpcionRespuestaPregunta::Listar('1');
     
	    return view('preguntas.nuevo',compact('estados','tipopreguntas','maestros','opcionmaestros'));
    }

    public function guardar(Request $request)
    {
    	$data =  $request->all();
		//var_dump($data);
	    //exit;
    	# print_r($data);
    	# exit;
	    if ( $data['pregunta_id'] <> '') {
    		$bresultado = Pregunta::Editar($data);
    	} else
    	{
    		$bresultado = Pregunta::Nuevo($data);
    	}

		if ($bresultado) {
			 return redirect()->route('preguntas')->with('status','Los Datos han sido actualizados correctamente.');
		} else {
			 return redirect()->back()->with('errors','Los Datos no han sido actualizados correctamente.');
		}

    }


    public function PreguntasMostrarRegistros(Request $request)
	{
		 $datos = $request->all();
        return Pregunta::ListarBootGridPregunta($datos,Auth::id());
        //dd($datos);
	}  
}
