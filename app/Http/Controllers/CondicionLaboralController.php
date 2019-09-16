<?php

namespace App\Http\Controllers;

use App\Models\CondicionLaboral;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CondicionLaboralController extends Controller
{
	public function Listar()
	{
		
		return view('condicionlaboral.listar');
	}
	
	public function Editar($id)
	{
		
		
		$estados = Estado::Listar_Estados();
		$laborales = CondicionLaboral::Listar_ID($id);
		
		return view('condicionlaboral.editar',compact('estados','laborales'));
		
	}
	
	public function Nuevo()
	{
		$estados = Estado::Listar_Estados();
		
		return view('condicionlaboral.nuevo',compact('estados'));
	}
	
	public function guardar(Request $request)
	{
		$data =  $request->all();
		// var_dump($data);
		
		if ( $data['id'] > 0) {
			$bresultado = CondicionLaboral::Editar($data);
		} else
		{
			$bresultado = CondicionLaboral::Nuevo($data);
		}
		#var_dump($data);
		
		if ($bresultado) {
			return redirect()->route('condicionlaboral')->with('status','Los Datos han sido actualizados correctamente.');
			
		} else {
			return redirect()->back()->with('errors','Los Datos no han sido actualizados correctamente.');
		}
		
	}
	
	
	public function CondicionLaboralMostrarRegistros(Request $request)
	{
		$datos = $request->all();
		return CondicionLaboral::ListarBootGridCondicionLaboral($datos,Auth::id());
		//dd($datos);
	}
}
