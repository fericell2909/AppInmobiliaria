<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Moneda;

class MonedaController extends Controller
{
 	public function MonedasListar()
 	{
    	$monedas = Moneda::Listar_Monedas_Estados();

    	//var_dump($monedas);

    	return view('monedas.listar',compact('monedas'));
	}   
}
