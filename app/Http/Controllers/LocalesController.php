<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocalesController extends Controller
{
	public function LocalesMostrarRegistros(Request $request)
	{
		$datos = $request->all();
		
		return Local::ListarBootLocal($datos,Auth::id());
		//dd($datos);
	}
}
