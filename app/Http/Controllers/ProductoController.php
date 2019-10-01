<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
	public function Listar()
	{
		
		#$instituciones= NivelInstitucion::Listar('_all_');
		return view('productos.listar');
	}
	
	public function Editar($id)
	{
		
		
		$estados = Estado::Listar_Estados();
		$productos = Producto::Listar_ID($id);
		
		return view('productos.editar',compact('estados','productos'));
		
	}
	
	public function Nuevo()
	{
		$estados = Estado::Listar_Estados();
		
		return view('productos.nuevo',compact('estados'));
	}
	
	public function guardar(Request $request)
	{
		$data =  $request->all();
		// var_dump($data);
		
		if ( $data['id'] > 0) {
			$bresultado = Producto::Editar($data);
		} else
		{
			$bresultado = Producto::Nuevo($data);
		}
		#var_dump($data);
		
		if ($bresultado) {
			return redirect()->route('productos')->with('status','Los Datos han sido actualizados correctamente.');
			#return $this->Listar();
		} else {
			return redirect()->back()->with('errors','Los Datos no han sido actualizados correctamente.');
		}
		
	}
	
	
	public function ProductoMostrarRegistros(Request $request)
	{
		$datos = $request->all();
		return Producto::ListarBootGridProducto($datos,Auth::id());
		//dd($datos);
	}
}
