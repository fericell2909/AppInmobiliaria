<?php

namespace App\Http\Controllers;

use App\Models\EncuestaArchivo;
use App\Models\EncuestaCabecera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StorageController extends Controller
{
    public function index($id){
    	
    	$codigoficha = array('codigoficha'=>$id);
	    $cabeceras  = EncuestaCabecera::Datos_reporte($id);
	
	    return view('fichas.subirarchivos',compact('codigoficha','cabeceras'));
     
    }
    
	public function save(Request $request)
	{
		
		try
		{
			
			if ($_FILES['file']['name'] != null) {
			
				$data = $request->all();
				
				//obtenemos el campo file definido en el formulario
				$file = $request->file('file');
				
				//obtenemos el nombre del archivo
				$nombre = $file->getClientOriginalName();
				
				$cabeceras  = EncuestaCabecera::Datos_reporte($data['identificador']);
				
				$nombre = '' .$cabeceras[0]->codigo_local . '_' .Auth::user()->name . '.'.strtolower($file->getClientOriginalExtension());
				
				//indicamos que queremos guardar un nuevo archivo en el disco local
				\Storage::disk('local')->put('/'.$data['identificador'].'/'.$nombre,  \File::get($file));
				
				$extension = strtolower($file->getClientOriginalExtension());
				
				EncuestaArchivo::Nuevo('/storage/'.$data['identificador'].'/'.$nombre,$extension,$data['identificador'],$nombre);
				
				return redirect()->route('consultarfichas')->with('status',
						'El Archivo ha sido cargado correctamente . Archivo : '.$nombre);
				
			}else{
				return redirect()->route('consultarfichas')->with('errors',
					'Debe Seleccionar un Archivo para cargar....: ');
			}
			
		} catch(Exception $e){
			return redirect()->route('consultarfichas')->with('error',
				'El Archivo NO se ha podido cargar. Archivo : '.$nombre);
		}
	
	}
}
