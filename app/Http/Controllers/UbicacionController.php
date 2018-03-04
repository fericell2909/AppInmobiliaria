<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Banio;
use App\Models\Clasificacion;
use App\Models\Cuarto;
use App\Models\Estado;
use App\Models\Medida;
use App\Models\Moneda;
use App\Models\Roles;
use App\Models\Settings;
use App\Models\Tipo;
use App\Models\TipoDetalle;
use App\Models\Ubicacion;
use App\Models\Zona;
use PDF;

class UbicacionController extends Controller
{
    public function gestionarubicaciones()
 	{
    	$clasificaciones = Clasificacion::Listar_Clasificaciones();
    	$tipos= Tipo::Listar_Tipos();
    	$cuartos= Cuarto::Listar_Cuartos();
    	$banios= Banio::Listar_Banios();
    	$medidas= Medida::Listar_Medidas();
    	$monedas= Moneda::Listar_Monedas();
    	$departamentos= Zona::Listar_zonas_departamentos();
	
    	return view('ubicaciones.index',compact('clasificaciones','tipos','cuartos','banios','medidas','monedas','departamentos'));
	} 

	public function Listar_Estilos_x_Tipo($id)
	  {
	  	
	  	return TipoDetalle::Listar_Estilos_x_Tipo($id);

	  } 


	public function registrarubicaciones(Request $request)
    {	

    	$data =  $request->all();

		// var_dump($data);

		$bresultado = Ubicacion::GuardarUbicacion($data,Auth::id());

		if ($bresultado) {
			 //return redirect()->route('UbicacionesListar')->with('status','La ubicación han sido registrada correctamente.');
			return 'Guardado Exitoso';
		} else {
			 return redirect()->back()->with('errors','Los Datos no han sido guardados correctamente.');
		}
		

    }

}
