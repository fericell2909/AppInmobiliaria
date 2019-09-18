<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Estado;
use App\Models\User;
use App\Models\Roles;
use function PHPSTORM_META\elementType;

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
	public function EditarClave($id){
		$estados = Estado::Listar_Estados();
		$usuarios = User::Listar_ID($id);
		$roles = Roles::Listar_Roles();
		
		return view('musuarios.editarclave',compact('estados','usuarios','roles'));
	
   }
	public function Nuevo()
	{
		$estados = Estado::Listar_Estados();
		$roles = Roles::Listar_Roles();
		
		return view('musuarios.nuevo',compact('estados','roles'));
	
	}
	
	public function guardarclave(Request $request){
		$data =  $request->all();
		// var_dump($data);
		$bvalidacion = false;
		
			$bresultado = User::EditarPassword($data);
		
		if ($bresultado) {
			return redirect()->route('musuarios')->with('status','La Clave ha sido Actualizada Correctamente.');
			
		} else{
			
				return redirect()->back()->with('errors','Ha Ocurrido un Erro. No se pudo actualizar la clave.');
			
		}
	}
	public function guardar(Request $request)
	{
		$data =  $request->all();
		// var_dump($data);
		$bvalidacion = false;
		
		if ( $data['id'] > 0) {
			$bresultado = User::Editar($data);
		} else
		{
			# Validar si el usuario ya existe.
			
			if (User::ExisteUsuario($data['email']) <= 0)
			{
				$bresultado = User::Nuevo($data);
			} else
			{
				$bresultado = false;
				$bvalidacion = true;
			}
			
		}
		#var_dump($data);
		
		if ($bresultado) {
			return redirect()->route('musuarios')->with('status','Los Datos han sido actualizados correctamente.');
			
		} else {
			if ( !$bvalidacion) {
				return redirect()->back()->with('errors','Los Datos no han sido actualizados correctamente.');
			} else {
				return redirect()->route('musuarios')->with('status','El Usuario : ' .$data['email'] . ' ya existe en el sistema.' );
			}
			
		}
		
	}
	
	
	public function UserMostrarRegistros(Request $request)
	{
		$datos = $request->all();
		return User::ListarBootGridUser($datos,Auth::id());
		//dd($datos);
	}
}
