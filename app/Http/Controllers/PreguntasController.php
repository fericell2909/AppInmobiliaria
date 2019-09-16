<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pregunta;
use App\Models\Estado;
use App\Models\TipoPregunta;

class PreguntasController extends Controller
{
    public function Listar()
    {

    	#$instituciones= NivelInstitucion::Listar('_all_');
    	return view('preguntas.listar');
    }

    public function Editar($id)
    {


    	$estados = Estado::Listar_Estados();
    	$instituciones = Pregunta::Listar_ID($id);
  
    	return view('preguntas.editar',compact('estados','instituciones'));	
    
    }

    public function Nuevo()
    {
    	$estados = Estado::Listar_Estados();

    	$tipopreguntas = TipoPregunta::Listar('1');

    	$maestros =  TipoPregunta::Listar_opciones_respuesta();

    	return view('preguntas.nuevo',compact('estados','tipopreguntas','maestros'));	
    }

    public function guardar(Request $request)
    {
    	$data =  $request->all();
		// var_dump($data);

    	if ( $data['id'] > 0) {
    		$bresultado = Pregunta::Editar($data);
    	} else
    	{
    		$bresultado = Pregunta::Nuevo($data);
    	}

		if ($bresultado) {
			 return redirect()->route('nivelinstitucion')->with('status','Los Datos han sido actualizados correctamente.');
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
