<?php

namespace App\Http\Controllers;

use App\Models\AliadoEstrategico;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AliadoEstrategicoController extends Controller
{
	public function Listar()
	{

		return view('aliadoestrategico.listar');
	}
	
	public function Editar($id)
	{
		
		
		$estados = Estado::Listar_Estados();
		$aliados = AliadoEstrategico::Listar_ID($id);
		
		return view('aliadoestrategico.editar',compact('estados','aliados'));
		
	}
	
	public function Nuevo()
	{
		$estados = Estado::Listar_Estados();
		
		return view('aliadoestrategico.nuevo',compact('estados'));
	}
	
	public function guardar(Request $request)
	{
		$data =  $request->all();
		// var_dump($data);
		
		if ( $data['id'] > 0) {
			$bresultado = AliadoEstrategico::Editar($data);
		} else
		{
			$bresultado = AliadoEstrategico::Nuevo($data);
		}
		#var_dump($data);
		
		if ($bresultado) {
			return redirect()->route('aliadoestrategico')->with('status','Los Datos han sido actualizados correctamente.');
		
		} else {
			return redirect()->back()->with('errors','Los Datos no han sido actualizados correctamente.');
		}
		
	}
	
	
	public function AliadoEstrategicoMostrarRegistros(Request $request)
	{
		$datos = $request->all();
		return AliadoEstrategico::ListarBootGridAliadoEstrategico($datos,Auth::id());
		//dd($datos);
	}
}
