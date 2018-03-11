<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class Ubicacion extends Model
{
	protected $table='ubicaciones';
	public $primaryKey ='id';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'titulo_ubicacion'
            ]
        ];
    }
    
	public static function ListarBootGridUbicaciones($datos,$codigo_usuario)
	{
		$query = '';
        
        $records_per_page = 10;
        
        $start_from = 0;
        
        $current_page_number = 0;

        if(isset($_POST["rowCount"]))
        {
         $records_per_page = $datos["rowCount"];
        }
        else
        {
         $records_per_page = 10;
        }

        if(isset($_POST["current"]))
        {
         $current_page_number = $datos["current"];
        }
        else
        {
         $current_page_number = 1;
        }

        $start_from = ($current_page_number - 1) * $records_per_page;
        
        $query .= " SELECT inmobiliaria_ubicaciones.id, inmobiliaria_ubicaciones.titulo_ubicacion, 
                          inmobiliaria_estados.nombre_estado, zonas.cNomZona,
                          inmobiliaria_users.email
                    FROM inmobiliaria_ubicaciones 
                        inner join zonas on zonas.id = inmobiliaria_ubicaciones.distrito_id
						inner join inmobiliaria_users on inmobiliaria_users.id = inmobiliaria_ubicaciones.users_id
						inner join inmobiliaria_estados on inmobiliaria_estados.id = inmobiliaria_ubicaciones.estados_id";  


        if(!empty($_POST["searchPhrase"]))
        {
         $query .= ' WHERE (inmobiliaria_ubicaciones.id LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR inmobiliaria_ubicaciones.titulo_ubicacion LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR inmobiliaria_estados.nombre_estado LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR zonas.cNomZona LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR inmobiliaria_users.email LIKE "%'.$_POST["searchPhrase"].'%" ) AND (inmobiliaria_ubicaciones.users_id = ' .$codigo_usuario . ')  ';
        }

        $order_by = '';

        if(isset($_POST["sort"]) && is_array($_POST["sort"]))
        {
         foreach($_POST["sort"] as $key => $value)
         {
          $order_by .= " $key $value, ";
         }
        }
        else
        {
         $query .= ' ORDER BY inmobiliaria_ubicaciones.id DESC ';
        }

        if($order_by != '')
        {
         $query .= ' ORDER BY ' . substr($order_by, 0, -2);
        }

        if($records_per_page != -1)
        {
         $query .= " LIMIT " . $start_from . ", " . $records_per_page .";";
        }


        $results = DB::select($query);


        $total_records = Ubicacion::where('ubicaciones.users_id',$codigo_usuario)->count();


        $output = array(
         'current'  => intval($datos["current"]),
         'rowCount'  => $records_per_page,
         'total'   => intval($total_records),
         'rows'   => $results
        );

        $total_records = null;
        $query = null;
        $records_per_page = null;
        $order_by = null;
        $start_from = null;

        return json_encode($output);
	}

    public static function ListarUbicaciones()
    {
        return Ubicacion::select('ubicaciones.titulo_ubicacion','ubicaciones.descripcion_ubicacion','monedas.nombre_moneda',
                                'ubicaciones.nPrecio','medidas.descripcion_medida','ubicaciones.nExtension',
                                'ubicaciones.nLatitudNegocio','ubicaciones.nLongitudNegocio')
                            ->join('monedas','monedas.id','=','ubicaciones.monedas_id')
                            ->join('medidas','medidas.id','=','ubicaciones.medidas_id')
                            ->where('ubicaciones.estados_id',1)
                            ->get(); 
    }

    public static function ObtenerDatosUbicacion($codigo_ubicacion)
    {

        return Ubicacion::where('ubicaciones.id',$codigo_ubicacion)->get();

    }
	public static function GuardarUbicacion($data , $codigo_usuario)
	{

		try {
				$ubicacion = new Ubicacion();
				$ubicacion->titulo_ubicacion = $data['titulo_ubicacion'];
				$ubicacion->descripcion_ubicacion = $data['descripcion_id'];
				$ubicacion->clasificaciones_id = $data['clasificacion_id'];
				$ubicacion->tipos_id = $data['tipos_id'];
				$ubicacion->estilos_id = $data['estilo_id'];
				$ubicacion->cuartos_id = $data['cuarto_id'];
				$ubicacion->banios_id = $data['banio_id'];
				$ubicacion->medidas_id = $data['medidas_id'];
				$ubicacion->nExtension = $data['medida_cantidad'];
				$ubicacion->monedas_id = $data['moneda_id'];
				$ubicacion->nPrecio = $data['precio_ubicacion'];
				$ubicacion->nAniosAntiguedad = 0;
				$ubicacion->departamento_id = $data['departamento_id'];
				$ubicacion->provincia_id = $data['provincia_id'];
				$ubicacion->distrito_id = $data['distrito_id'];
				$ubicacion->nLatitudNegocio = $data['nLatitudNegocio'];
				$ubicacion->nLongitudNegocio = $data['nLongitudNegocio'];
				$ubicacion->cDireccionNegocio = $data['cDireccionNegocio'];
				$ubicacion->contacto_nombres_apellidos = $data['contacto_nombres_apellidos'];
				$ubicacion->contacto_dni = $data['contacto_dni'];
				$ubicacion->contacto_celular = $data['contacto_celular'];
				$ubicacion->contacto_email = $data['contacto_email'];
				$ubicacion->contacto_direccion = $data['contacto_direccion'];
				$ubicacion->bImagenes = 0;
				$ubicacion->users_id = $codigo_usuario;
				$ubicacion->estados_id = 1;

				$ubicacion->save();	

				return true;
		} catch (Exception $e) {
				return false;
		}
	}

    public static function EditarUbicacion($data , $codigo_usuario)
    {

        try {

                $valores =  array(  'titulo_ubicacion' => $data['titulo_ubicacion'],
                                    'descripcion_ubicacion' => $data['descripcion_id'],
                                    'clasificaciones_id' => $data['clasificacion_id'],
                                    'tipos_id' => $data['tipos_id'],
                                    'estilos_id' => $data['estilo_id'],
                                    'cuartos_id' => $data['cuarto_id'],
                                    'banios_id' => $data['banio_id'],
                                    'medidas_id' => $data['medidas_id'],
                                    'nExtension' => $data['medida_cantidad'],
                                    'monedas_id' => $data['moneda_id'],
                                    'nPrecio' => $data['precio_ubicacion'],
                                    'departamento_id' =>  $data['departamento_id'],
                                    'provincia_id' => $data['provincia_id'],
                                    'distrito_id' => $data['distrito_id'],
                                    'nLatitudNegocio' => $data['nLatitudNegocio'],
                                    'nLongitudNegocio' => $data['nLongitudNegocio'],
                                    'cDireccionNegocio' => $data['cDireccionNegocio'],
                                    'contacto_nombres_apellidos' => $data['contacto_nombres_apellidos'],
                                    'contacto_dni' => $data['contacto_dni'],
                                    'contacto_celular' => $data['contacto_celular'],
                                    'contacto_email' => $data['contacto_email'],
                                    'contacto_direccion' => $data['contacto_direccion'],
                                    'estados_id' => $data['estados_id'] 
                                );
        
                    Ubicacion::where('id',$data['codigo_id'])
                            ->update($valores);

                return true;
        } catch (Exception $e) {
                return false;
        }
    }
}
