<?php

namespace App\Http\Controllers;

use App\Models\Caracteristica;
use App\Models\CondicionLaboral;
use App\Models\Modalidad;
use App\Models\Nivel;
use App\Models\Zona;
use Illuminate\Http\Request;
use App\Models\ModeloEncuesta;
class FichaController extends Controller
{
    public function RegistroFichas(){
    	
    	$modeloencuestas = ModeloEncuesta::Listar_ID('E201900001');
	    $departamentos = Zona::Listar_zonas_departamentos();
	    $niveles = Nivel::Listar_Niveles();
	    $caracteristicas = Caracteristica::Listar_Caracteristicas_Institucion();
	    $modalidades = Modalidad::Listar_Modalidades_Institucion();
	    $laborales = CondicionLaboral::Listar(1);
	    
	    $productos = ModeloEncuesta::Listar_productos('E201900001');
	    $actividades = ModeloEncuesta::Listar_Actividades('E201900001');
	    $fases = ModeloEncuesta::Listar_Fases('E201900001');
	    
	    $preguntas =  ModeloEncuesta::Listar_Preguntas('E201900001');
	   
	    $opciones = ModeloEncuesta::Listar_Opciones('E201900001');
	    
	    return view('fichas.registrarficha',
		            compact('modeloencuestas','departamentos','niveles','caracteristicas',
			                        'modalidades','laborales','productos','actividades','fases','preguntas','opciones'));
    
    }
}
