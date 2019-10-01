<?php

namespace App\Http\Controllers;

use App\Models\CodigoFase;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CodigoFaseController extends Controller
{
	public function Listar()
	{
		
		#$instituciones= NivelInstitucion::Listar('_all_');
		return view('codigosfases.listar');
	}
	
	public function Editar($id)
	{
		
		
		$estados = Estado::Listar_Estados();
		$codigosfases = CodigoFase::Listar_ID($id);
		
		return view('codigosfases.editar',compact('estados','codigosfases'));
		
	}
	
	public function Nuevo()
	{
		$estados = Estado::Listar_Estados();
		
		return view('codigosfases.nuevo',compact('estados'));
	}
	
	public function guardar(Request $request)
	{
		$data =  $request->all();
		// var_dump($data);
		
		if ( $data['id'] > 0) {
			$bresultado = CodigoFase::Editar($data);
		} else
		{
			$bresultado = CodigoFase::Nuevo($data);
		}
		#var_dump($data);
		
		if ($bresultado) {
			return redirect()->route('codigosfases')->with('status','Los Datos han sido actualizados correctamente.');
			#return $this->Listar();
		} else {
			return redirect()->back()->with('errors','Los Datos no han sido actualizados correctamente.');
		}
		
	}
	
	
	public function CodigoFaseMostrarRegistros(Request $request)
	{
		$datos = $request->all();
		return CodigoFase::ListarBootGridCodigoFase($datos,Auth::id());
		//dd($datos);
	}
}
