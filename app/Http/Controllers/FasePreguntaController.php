<?php

namespace App\Http\Controllers;

use App\Models\FasePregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FasePreguntaController extends Controller
{
    public function FasePreguntaMostrarRegistros(Request $request)
    {
    	
	    $datos = $request->all();
	    
	    return FasePregunta::ListarBootGridFasePregunta($datos,Auth::id());
    	
	    
    }
}
