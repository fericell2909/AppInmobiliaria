<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Banio;
use App\Models\Clasificacion;
use App\Models\Cuarto;
use App\Models\Estado;
use App\Models\Medida;
use App\Models\Moneda;
use App\Models\Roles;
use App\Models\Settings;
use App\Models\Tipo;
use App\Models\TipoDetalle;
use App\Models\Ubicacion;
use App\Models\Zona;
use App\Models\Nivel;
use App\Models\Caracteristica;
use App\Models\Modalidad;
use PDF;

class UbicacionController extends Controller
{
    public function gestionarubicaciones()
    {

    	$clasificaciones = Nivel::Listar_Niveles();
    	$tipos = Caracteristica::Listar_Caracteristicas_Institucion();
    	$cuartos = Modalidad::Listar_Modalidades_Institucion();
		$banios = Banio::Listar_Banios();    	
    	$medidas = Medida::Listar_Medidas();
    	$monedas = Moneda::Listar_Monedas();
    	$departamentos = Zona::Listar_zonas_departamentos(); 

    	return view('ubicaciones.index',compact('medidas','clasificaciones','cuartos','tipos','banios','monedas','departamentos'));

    }

    public function UbicacionesListar()
    {

    	return view('ubicaciones.listar');
    }
    public function UbicacionesBusqueda()
    {
        $departamentos = Zona::Listar_zonas_departamentos(); 

        return view('ubicaciones.busqueda',compact('departamentos'));
    }

    public function consultabusqueda()
    {
        // $id = Codigo de Zona.
        $ubicaciones = Ubicacion::ListarUbicaciones();
        
        return $ubicaciones;

    }
	public function UbicacionesMostrarRegistros(Request $request)
	{
		 $datos = $request->all();
        return Ubicacion::ListarBootGridUbicaciones($datos,Auth::id());
        //dd($datos);
	}    

	public function UbicacionesImprimir($id)
	{
		return 'Imprimir';
	}
	public function UbicacionesEditar($id)
	{
		$ubicaciones = Ubicacion::ObtenerDatosUbicacion($id);
		
		//var_dump($ubicaciones);

		$clasificaciones = Clasificacion::Listar_Clasificaciones();
    	$tipos = Tipo::Listar_Tipos();
    	$cuartos = Cuarto::Listar_Cuartos();
		$banios = Banio::Listar_Banios();    	
    	$medidas = Medida::Listar_Medidas();
    	$monedas = Moneda::Listar_Monedas();
    	$estados = Estado::Listar_Estados();

    	if (count($ubicaciones) > 0 ) {
    		$departamentos = Zona::Listar_zonas_departamentos(); 
    		$provincias = Zona::Listar_zonas_provincias_x_departamento($ubicaciones[0]->departamento_id);
    		$distritos = Zona::Listar_zonas_distritos_x_provincia($ubicaciones[0]->provincia_id);

    		$estilos = TipoDetalle::Listar_Estilos_x_Tipo($ubicaciones[0]->tipos_id);
    	} else{
  			$departamentos = ""; 
  			$provincias =  "";
    		$distritos =  "";
    		$estilos = "";
  		
    	}
  
    	return view('ubicaciones.editar',compact('medidas','clasificaciones','cuartos','tipos','banios','monedas','departamentos','ubicaciones','estilos','provincias','distritos','estados'));	
	}
	
	public function UbicacionesVer($id)
	{
		
		$ubicaciones = Ubicacion::ObtenerDatosUbicacion($id);
		
		//var_dump($ubicaciones);

		$clasificaciones = Clasificacion::Listar_Clasificaciones();
    	$tipos = Tipo::Listar_Tipos();
    	$cuartos = Cuarto::Listar_Cuartos();
		$banios = Banio::Listar_Banios();    	
    	$medidas = Medida::Listar_Medidas();
    	$monedas = Moneda::Listar_Monedas();

    	if (count($ubicaciones) > 0 ) {
    		$departamentos = Zona::Listar_Zona_x_ID($ubicaciones[0]->departamento_id); 
    		$provincias = Zona::Listar_Zona_x_ID($ubicaciones[0]->provincia_id);
    		$distritos = Zona::Listar_Zona_x_ID($ubicaciones[0]->distrito_id);
    		$estilos = TipoDetalle::Listar_Estilos_x_Tipo($ubicaciones[0]->tipos_id);
    	} else{
  			$departamentos = ""; 
    		$provincias =  "";
    		$distritos =  "";
    		$estilos = "";
  		
    	}
  
    	return view('ubicaciones.ver',compact('medidas','clasificaciones','cuartos','tipos','banios','monedas','departamentos','provincias','distritos','ubicaciones','estilos'));
	
	}

	public function registrarubicaciones(Request $request)
    {	

    	$data =  $request->all();

		// var_dump($data);

		$bresultado = Ubicacion::GuardarUbicacion($data,Auth::id());

		if ($bresultado) {
			 return redirect()->route('UbicacionesListar')->with('status','La ubicación han sido registrada correctamente.');
		} else {
			 return redirect()->back()->with('errors','Los Datos no han sido guardados correctamente.');
		}
		

    }

    public function editarguardar(Request $request)
    {
    	$data =  $request->all();
		// var_dump($data);

		$bresultado = Ubicacion::EditarUbicacion($data,Auth::id());

		if ($bresultado) {
			 return redirect()->route('UbicacionesListar')->with('status','La ubicación han sido editada correctamente.');
		} else {
			 return redirect()->back()->with('errors','Los Datos no han sido actualizados correctamente.');
		}

    }

    public function ImpresionUbicacion($id)
    {
        $empresas =  Settings::Listar_Datos_Empresa();

    }

    public function Listar_Estilos_x_Tipo($id)
    {
    	return TipoDetalle::Listar_Estilos_x_Tipo($id);
    }
}
