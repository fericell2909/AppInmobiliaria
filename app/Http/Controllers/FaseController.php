<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\Fase;
use App\Models\OpcionRespuestaPregunta;
use App\Models\Pregunta;
use App\Models\CodigoFase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaseController extends Controller
{
	public function Listar()
	{
		
		#$instituciones= NivelInstitucion::Listar('_all_');
		return view('fases.listar');
	}
	
	public function Editar($id)
	{
		
		$fases = Fase::Listar_ID($id);
		$estados = Estado::Listar_Estados();
		$codigosfases = CodigoFase::Listar('1');
		
		return view('fases.editar',compact('fases','estados','codigosfases'));
		
	}
	
	public function Nuevo()
	{
		$estados = Estado::Listar_Estados();
		
		$codigosfases = CodigoFase::Listar('1');
		
		return view('fases.nuevo',compact('estados','codigosfases'));
	}
	
	public function guardar(Request $request)
	{
		$data =  $request->all();
		
		if ( $data['id'] > 0 ) {
			$bresultado = Fase::Editar($data);
		} else
		{
			$bresultado = Fase::Nuevo($data);
		}
		
		if ($bresultado) {
			return redirect()->route('fases')->with('status','Los Datos han sido actualizados correctamente.');
		} else {
			return redirect()->back()->with('errors','Los Datos no han sido actualizados correctamente.');
		}
		
	}
	
	
	public function FaseMostrarRegistros(Request $request)
	{
		$datos = $request->all();
		return Fase::ListarBootGridFase($datos,Auth::id());
		//dd($datos);
	}
}
