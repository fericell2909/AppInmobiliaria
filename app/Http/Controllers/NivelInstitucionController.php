<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\NivelInstitucion;
use App\Models\Estado;


class NivelInstitucionController extends Controller
{


    public function Listar()
    {

    	#$instituciones= NivelInstitucion::Listar('_all_');
    	return view('nivelinstitucion.listar');
    }

    public function Editar($id)
    {


    	$estados = Estado::Listar_Estados();
    	$instituciones = NivelInstitucion::Listar_ID($id);
  
    	return view('nivelinstitucion.editar',compact('estados','instituciones'));	
    
    }

    public function Nuevo()
    {
    	$estados = Estado::Listar_Estados();

    	return view('nivelinstitucion.nuevo',compact('estados'));	
    }

    public function guardar(Request $request)
    {
    	$data =  $request->all();
		// var_dump($data);

    	if ( $data['id'] > 0) {
    		$bresultado = NivelInstitucion::Editar($data);
    	} else
    	{
    		$bresultado = NivelInstitucion::Nuevo($data);
    	}

		if ($bresultado) {
			 return redirect()->route('nivelinstitucion')->with('status','Los Datos han sido actualizados correctamente.');
		} else {
			 return redirect()->back()->with('errors','Los Datos no han sido actualizados correctamente.');
		}

    }


    public function NivelInstitucionMostrarRegistros(Request $request)
	{
		 $datos = $request->all();
        return NivelInstitucion::ListarBootGridNivelInstitucion($datos,Auth::id());
        //dd($datos);
	}  

}
