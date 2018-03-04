<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDetalle extends Model
{
            protected $table ='tiposdetalles';
    public $primarykey='id';

    public static function Listar_Estilos_x_Tipo($tipo_id)
 	{
 		return TipoDetalle::select("tiposdetalles.id","tiposdetalles.nombre_detalle_tipo")
 						->where('tiposdetalles.estados_id',1)
 						->where('tiposdetalles.tipos_id',$tipo_id)
 						->get();	
	}
}
