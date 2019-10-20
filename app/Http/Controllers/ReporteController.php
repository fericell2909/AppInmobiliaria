<?php

namespace App\Http\Controllers;

use App\Models\Caracteristica;
use App\Models\CondicionLaboral;
use App\Models\EncuestaCabecera;
use App\Models\Modalidad;
use App\Models\ModeloEncuesta;
use App\Models\Nivel;
use App\Models\Zona;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\Ubicacion;
use PDF;

class ReporteController extends Controller
{
    public function verreporteusuario()
    {
        $usuarios = User::Listar_Usuarios();
        $empresas =  Settings::Listar_Datos_Empresa();
        return view('reportes.usuarios.usuarios',compact('usuarios','empresas'));
    }

    public function verreporteubicacion()
    {

        $empresas =  Settings::Listar_Datos_Empresa();
        $ubicaciones = Ubicacion::ListarUbicaciones();
        //var_dump($ubicaciones);//
        return view('reportes.ubicaciones.ubicaciones',compact('empresas','ubicaciones'));
    }
   
    public function rptubicaciones($id)
    {

        $empresas =  Settings::Listar_Datos_Empresa();
        $ubicaciones = Ubicacion::ListarUbicaciones();
        
        $vistaurl = 'reportes.ubicaciones.impresionubicaciones';

        return $this->pdfubicaciones($empresas,$ubicaciones,$vistaurl,$id);
    }
    
	private function pdfubicaciones($empresa,$ubicacion,$vistaurl,$tipo)
    {

        $empresas = $empresa;

        $ubicaciones = $ubicacion;
        
        $nombre_documento = 'Reporte-Ubicaciones'; 

        $view =  \View::make($vistaurl,['empresas' => $empresas,'ubicaciones' => $ubicaciones])->render();
        
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
         
        //return $pdf; 
        if($tipo==2){return $pdf->stream(strval($nombre_documento));}
        if($tipo==1){return $pdf->download(strval($nombre_documento).'.pdf');} 
    }



   public function rptusuarios($id)
    {

        $empresas =  Settings::Listar_Datos_Empresa();
        $usuarios = User::Listar_Usuarios();
        
        $vistaurl = 'reportes.usuarios.impresionusuarios';

        return $this->pdf($empresas,$usuarios,$vistaurl,$id);
    }

    private function pdf($empresa,$usuario,$vistaurl,$tipo)
    {

        $empresas = $empresa;

        $usuarios = $usuario;
        
        $nombre_documento = 'Reporte-Usuarios'; 

        $view =  \View::make($vistaurl,['empresas' => $empresas,'usuarios' => $usuarios])->render();
        
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
         
        //return $pdf; 
        if($tipo==2){return $pdf->stream(strval($nombre_documento));}
        if($tipo==1){return $pdf->download(strval($nombre_documento).'.pdf');} 
    }

 public function imprimirfichas($id)
 {
 	
	 $usuarios = User::Listar_Usuarios();
	 $empresas =  Settings::Listar_Datos_Empresa();
	 
	 $cabeceras  = EncuestaCabecera::Datos_reporte($id);
	
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
	 
	 $detalles = EncuestaCabecera::Lista_Datos_encuestadetalle($id);
	 
	 
	 $view =  \View::make('reportes.fichas.impresionficha',['empresas' => $empresas,'usuarios' => $usuarios ,
		                                                    'cabeceras' => $cabeceras ,
		
		                                                    'modeloencuestas' => $modeloencuestas,
		                                                    'departamentos' => $departamentos,
		                                                    'niveles' => $niveles,
		                                                    'caracteristicas' => $caracteristicas,
		                                                    'modalidades' => $modalidades,
		                                                    'laborales' => $laborales,
		                                                    'productos' => $productos,
		                                                    'actividades' => $actividades,
		                                                    'fases' => $fases,
		                                                    'preguntas' => $preguntas,
		                                                    'opciones' => $opciones,
		                                                    'cadenaproductos' => $cadenaproductos,
		                                                    'cadenaactividades' => $cadenaactividades,
		                                                    'cadenafases' => $cadenafases,
		                                                    'cadenapreguntas' => $cadenapreguntas,
		                                                    'grupoactividades' => $grupoactividades,
		                                                    'grupofases' => $grupofases,
		                                                    'grupopreguntas' => $grupopreguntas,
		                                                    'preguntasfases' => $preguntasfases ,
	                                                        'detalles' => $detalles
	 ])->render();
	 
	 
	 $pdf = \App::make('dompdf.wrapper');
	 $pdf->loadHTML($view);
	 return $pdf->download(strval('Reporte_ficha_'.$id).'.pdf');
	 
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

