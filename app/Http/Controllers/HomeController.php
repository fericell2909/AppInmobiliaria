<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EncuestaCabecera;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	
    	$numeroencuestas =  array( 'numeroencuestas' => EncuestaCabecera::NumeroEncuestasRegistradas(Auth::user()->email));
        #var_dump($numeroencuestas);
        
    	return view('home',compact('numeroencuestas'));
    
    }
}
