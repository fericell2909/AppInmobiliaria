<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\CaracteristicaInstitucion;
use App\Models\Estado;

class CaracteristicaInstitucionController extends Controller
{
       public function Listar()
    {

    	#$instituciones= NivelInstitucion::Listar('_all_');
    	return view('caracteristicainstitucion.listar');
    }

    public function Editar($id)
    {


    	$estados = Estado::Listar_Estados();
    	$instituciones = CaracteristicaInstitucion::Listar_ID($id);
  
    	return view('caracteristicainstitucion.editar',compact('estados','instituciones'));	
    
    }

    public function Nuevo()
    {
    	$estados = Estado::Listar_Estados();

    	return view('caracteristicainstitucion.nuevo',compact('estados'));	
    }

    public function guardar(Request $request)
    {
    	$data =  $request->all();
		// var_dump($data);

    	if ( $data['id'] > 0) {
    		$bresultado = CaracteristicaInstitucion::Editar($data);
    	} else
    	{
    		$bresultado = CaracteristicaInstitucion::Nuevo($data);
    	}
    	#var_dump($data);
    	
		if ($bresultado) {
			return redirect()->route('caracteristicainstitucion')->with('status','Los Datos han sido actualizados correctamente.');
			#return $this->Listar();
		} else {
			 return "Error ------------------";
		}
		
    }


    public function CaracteristicaInstitucionMostrarRegistros(Request $request)
	{
		 $datos = $request->all();
        return CaracteristicaInstitucion::ListarBootGridCaracteristicaInstitucion($datos,Auth::id());
        //dd($datos);
	}  
}
