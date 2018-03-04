<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
