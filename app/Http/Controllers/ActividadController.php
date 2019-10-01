<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActividadController extends Controller
{
	public function Listar()
	{
		
		#$instituciones= NivelInstitucion::Listar('_all_');
		return view('actividades.listar');
	}
	
	public function Editar($id)
	{
		
		
		$estados = Estado::Listar_Estados();
		$actividades = Actividad::Listar_ID($id);
		
		return view('actividades.editar',compact('estados','actividades'));
		
	}
	
	public function Nuevo()
	{
		$estados = Estado::Listar_Estados();
		
		return view('actividades.nuevo',compact('estados'));
	}
	
	public function guardar(Request $request)
	{
		$data =  $request->all();
		// var_dump($data);
		
		if ( $data['id'] > 0) {
			$bresultado = Actividad::Editar($data);
		} else
		{
			$bresultado = Actividad::Nuevo($data);
		}
		#var_dump($data);
		
		if ($bresultado) {
			return redirect()->route('actividades')->with('status','Los Datos han sido actualizados correctamente.');
			#return $this->Listar();
		} else {
			return redirect()->back()->with('errors','Los Datos no han sido actualizados correctamente.');
		}
		
	}
	
	
	public function ActividadMostrarRegistros(Request $request)
	{
		$datos = $request->all();
		return Actividad::ListarBootGridActividad($datos,Auth::id());
		//dd($datos);
	}
}
