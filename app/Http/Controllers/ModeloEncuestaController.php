<?php

namespace App\Http\Controllers;

use App\Models\CodigoFase;
use App\Models\Estado;
use App\Models\ModeloEncuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModeloEncuestaController extends Controller
{
	public function Listar()
	{
		
		#$instituciones= NivelInstitucion::Listar('_all_');
		return view('modeloencuestas.listar');
	}
	
	public function Editar($id)
	{
		
		$modelos = ModeloEncuesta::Listar_ID($id);
		$estados = Estado::Listar_Estados();
		
		return view('modeloencuestas.editar',compact('modelos','estados'));
		
	}
	
	public function Nuevo()
	{
		$estados = Estado::Listar_Estados();
		
		return view('modeloencuestas.nuevo',compact('estados'));
	
	}
	
	public function guardar(Request $request)
	{
		$data =  $request->all();
		
		if ( $data['id'] > 0 ) {
			$bresultado = ModeloEncuesta::Editar($data);
		} else
		{
			$bresultado = ModeloEncuesta::Nuevo($data);
		}
		
		if ($bresultado) {
			return redirect()->route('modeloencuestas')->with('status','Los Datos han sido actualizados correctamente.');
		} else {
			return redirect()->back()->with('errors','Los Datos no han sido actualizados correctamente.');
		}
		
	}
	
	public function ModeloEncuestaMostrarRegistros(Request $request)
	{
		$datos = $request->all();
		return ModeloEncuesta::ListarBootGridModeloEncuesta($datos,Auth::id());
		//dd($datos);
	}
}
