<?php

namespace App\Http\Controllers;

use App\Models\Caracteristica;
use App\Models\CondicionLaboral;
use App\Models\EncuestaCabecera;
use App\Models\Modalidad;
use App\Models\Nivel;
use App\Models\Zona;
use App\Models\Turno;
use Illuminate\Http\Request;
use App\Models\ModeloEncuesta;
use Illuminate\Support\Facades\Auth;

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
		
	    $grupoactividades = ModeloEncuesta::Listar_Cantidad_Actividades_x_Producto('E201900001');
	
	    $grupofases = ModeloEncuesta::Listar_Cantidad_Fases_x_Actividad('E201900001');
	
	    $grupopreguntas = ModeloEncuesta::Listar_Cantidad_Preguntas_x_Fase('E201900001');
	    $preguntasfases = ModeloEncuesta::Listar_Preguntas_x_fase('E201900001');
	    
	    $cadenaproductos = array( 'cadenaproductos' => $this->devuelve_cadena_productos($productos));
	    $cadenaactividades = array( 'cadenaactividades' => $this->devuelve_cadena_actividades($actividades));
		$cadenafases = array('cadenafases' => $this->devuelve_cadena_fases($fases));
	    $cadenapreguntas = array('cadenapreguntas' => $this->devuelve_cadena_preguntas($preguntas));
	
	    $namepreguntas = ModeloEncuesta::Listar_Names_Preguntas('E201900001');
	
	    $codigo_encuesta = array('codigo_encuesta' => 'E201900001');
	    $usuarioregistro = array('usuarioregistro' => Auth::user()->email);
	    #var_dump($cadenapreguntas);
		
	    $turnos = Turno::Listar();
		   
	    return view('fichas.registrarficha',
		            compact('modeloencuestas','departamentos','niveles','caracteristicas',
			                        'modalidades','laborales','productos','actividades','fases','preguntas','opciones',
			                        'cadenaproductos', 'cadenaactividades','cadenafases','cadenapreguntas',
		                            'grupoactividades' , 'grupofases', 'grupopreguntas','preguntasfases' ,
		                            'namepreguntas','codigo_encuesta','usuarioregistro' , 'turnos'
			            ));
    
	    
    }
    
    public function guardarNuevo(Request $request)
    {
		
    	$data = $request->all();
    	
	    $bresultado = EncuestaCabecera::Nuevo($data);
	    
	    $output = array(
		    'codigorespuesta'  => ($bresultado) ? 1 : 0,
		    'mensajerespuesta'  => ($bresultado) ? "Ficha ha sido registrada correctamente" : "Ha Ocurrido un Error. Comuniquese con Sosporte."
	    );
	
	    return json_encode($output);
	    
    }
    
    public function consultarfichas()
    {
		  
	    $usuarios = EncuestaCabecera::Listar_Usuarios(Auth::user()->rol_id,Auth::user()->email);
    	return view('fichas.consultafichas',compact('usuarios'));
    }
    
    public function ListarFichasMostrarRegistros(Request $request)
    {
	
	    $datos = $request->all();
	    return EncuestaCabecera::Listar_Fichas_x_Usuario($datos,$datos['email']);
    }
    
    private function devuelve_cadena_productos($datos){
    	
    	$cadena = "";
    	$i = 1;
    	foreach($datos as $data)
	    {
			if ($i == count($datos))
			{
				$cadena = $cadena . $data->id;
			}
		     else
		     {
			     $cadena = $cadena . $data->id . '#';
		     }
	    	$i= $i + 1;
	    }
    	return $cadena;
    }
    private function devuelve_cadena_actividades($datos){
	
	    $cadena = "";
	    $i = 1;
	    foreach($datos as $data)
	    {
		    if ($i == count($datos))
		    {
			    $cadena = $cadena . $data->codigoactividad;
		    }
		    else
		    {
			    $cadena = $cadena . $data->codigoactividad . '#';
		    }
		    $i= $i + 1;
	    }
	    return $cadena;
    	
    }
    
    private function devuelve_cadena_fases($datos)
    {
	
	    $cadena = "";
	    $i = 1;
	    foreach($datos as $data)
	    {
		    if ($i == count($datos))
		    {
			    $cadena = $cadena . $data->codigofase;
		    }
		    else
		    {
			    $cadena = $cadena . $data->codigofase . '#';
		    }
		    $i= $i + 1;
	    }
	    return $cadena;
    }
    private function devuelve_cadena_preguntas($datos)
    {
	
	    $cadena = "";
	    $i = 1;
	    foreach($datos as $data)
	    {
		    if ($i == count($datos))
		    {
			    $cadena = $cadena . $data->codigopregunta;
		    }
		    else
		    {
			    $cadena = $cadena . $data->codigopregunta . '#';
		    }
		    $i= $i + 1;
	    }
	    return $cadena;
    }
}
