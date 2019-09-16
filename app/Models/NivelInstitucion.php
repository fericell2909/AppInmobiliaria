<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
class NivelInstitucion extends Model
{
     protected $table ='niveles_institucion';
    public $primarykey='id';

    public static function Listar($estados_id = '_all_')
 	{
 		if( $estados_id == '_all_') {

 			return NivelInstitucion::select("niveles_institucion.id","niveles_institucion.descripcion" , 
 										    "niveles_institucion.estados_id")
 						->get();

 		} else
 		{
 			return NivelInstitucion::select("niveles_institucion.id","niveles_institucion.descripcion" , 
 										    "niveles_institucion.estados_id")
 									->where('niveles_institucion.estados_id',$estados_id)
 									->get();
 		}
	}

	public static function Listar_ID($id){

			return NivelInstitucion::select("niveles_institucion.id","niveles_institucion.descripcion" , 
 										    "niveles_institucion.estados_id")
 									->where('niveles_institucion.id',$id)
 									->get();
	}

	public static function ListarBootGridNivelInstitucion($datos,$codigo_usuario)
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
        
        $nombre_estado = '<span class="'.'"label label-success"> amen</span>';

        $query .= " SELECT desastres_niveles_institucion.id, desastres_niveles_institucion.descripcion, 
                           CASE  desastres_estados.id WHEN 1 THEN CONCAT('<span class=\"label label-success\">',desastres_estados.nombre_estado,'</span>') ELSE  CONCAT('<span class=\"label label-danger\">',desastres_estados.nombre_estado,'</span>') END    as  nombre_estado 
                    FROM desastres_niveles_institucion 
						inner join desastres_estados on desastres_estados.id = desastres_niveles_institucion.estados_id";  


        if(!empty($_POST["searchPhrase"]))
        {
         $query .= ' WHERE (desastres_niveles_institucion.id LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR desastres_niveles_institucion.descripcion LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR desastres_estados.nombre_estado LIKE "%'.$_POST["searchPhrase"].'%" )';
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
         $query .= ' ORDER BY desastres_niveles_institucion.id DESC ';
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


        $total_records = NivelInstitucion::select('desastres_niveles_institucion.id')->count();


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

	public static function Nuevo($institucion)
	{

		try {
				$niveles_institucion  = new NivelInstitucion();
				$niveles_institucion->descripcion = $institucion['descripcion'];
				$niveles_institucion->estados_id = $institucion['estados_id'];

				$niveles_institucion->save();	

				return true;

		} catch (Exception $e) {
				return false;
		}


	}

	public static function Editar($institucion)
	{

		  try {

                $valores =  array(  'descripcion' => $institucion['descripcion'],
                                    'estados_id' => $institucion['estados_id']
                                );
        
                    NivelInstitucion::where('id',$institucion['id'])
                            ->update($valores);

                return true;
        } catch (Exception $e) {
                return false;
        }


	}


}
