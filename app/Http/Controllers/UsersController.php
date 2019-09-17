<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Estado;
use App\Models\User;
use App\Models\Roles;

class UsersController extends Controller
{
   public function UsuariosListar()
    {
    	$usuarios = User::Listar_Usuarios();

    	//var_dump($usuarios);

    	return view('usuarios.listar',compact('usuarios'));
	}
	
	public function Listar()
	{
		
		return view('musuarios.listar');
	}
	
	public function Editar($id)
	{
		
		
		$estados = Estado::Listar_Estados();
		$usuarios = User::Listar_ID($id);
		$roles = Roles::Listar_Roles();
		
		return view('musuarios.editar',compact('estados','usuarios','roles'));
		
	}
	
	public function Nuevo()
	{
		$estados = Estado::Listar_Estados();
		$roles = Roles::Listar_Roles();
		
		return view('musuarios.nuevo',compact('estados','roles'));
	
	}
	
	public function guardar(Request $request)
	{
		$data =  $request->all();
		// var_dump($data);
		
		if ( $data['id'] > 0) {
			$bresultado = User::Editar($data);
		} else
		{
			$bresultado = User::Nuevo($data);
		}
		#var_dump($data);
		
		if ($bresultado) {
			return redirect()->route('musuarios')->with('status','Los Datos han sido actualizados correctamente.');
			
		} else {
			return redirect()->back()->with('errors','Los Datos no han sido actualizados correctamente.');
		}
		
	}
	
	
	public function UserMostrarRegistros(Request $request)
	{
		$datos = $request->all();
		return User::ListarBootGridUser($datos,Auth::id());
		//dd($datos);
	}
}
