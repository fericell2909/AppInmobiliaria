<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
   public function UsuariosListar()
    {
    	$usuarios = User::Listar_Usuarios();

    	//var_dump($usuarios);

    	return view('usuarios.listar',compact('usuarios'));
	}
}
