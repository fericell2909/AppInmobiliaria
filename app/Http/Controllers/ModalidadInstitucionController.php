<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\ModalidadInstitucion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModalidadInstitucionController extends Controller
{
	public function Listar()
	{
		
		#$instituciones= ModalidadInstitucion::Listar('_all_');
		return view('modalidadinstitucion.listar');
	}
	
	public function Editar($id)
	{
		
		
		$estados = Estado::Listar_Estados();
		$modalidades = ModalidadInstitucion::Listar_ID($id);
		
		return view('modalidadinstitucion.editar',compact('estados','modalidades'));
		
	}
	
	public function Nuevo()
	{
		$estados = Estado::Listar_Estados();
		
		return view('modalidadinstitucion.nuevo',compact('estados'));
	}
	
	public function guardar(Request $request)
	{
		$data =  $request->all();
		// var_dump($data);
		
		if ( $data['id'] > 0) {
			$bresultado = ModalidadInstitucion::Editar($data);
		} else
		{
			$bresultado = ModalidadInstitucion::Nuevo($data);
		}
		
		if ($bresultado) {
			return redirect()->route('modalidadinstitucion')->with('status','Los Datos han sido actualizados correctamente.');
		} else {
			return redirect()->back()->with('errors','Los Datos no han sido actualizados correctamente.');
		}
		
	}
	
	
	public function ModalidadInstitucionMostrarRegistros(Request $request)
	{
		$datos = $request->all();
		return ModalidadInstitucion::ListarBootGridModalidadInstitucion($datos,Auth::id());
		//dd($datos);
	}
}
