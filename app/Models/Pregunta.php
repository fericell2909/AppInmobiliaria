<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;


class Pregunta extends Model
{
         protected $table ='mae_preguntas';
    public $primarykey='id';

    public static function Listar($estados_id = '_all_')
 	{
 		if( $estados_id == '_all_') {

 			return Pregunta::select("mae_preguntas.id","mae_preguntas.descripcion" , 
 										    "mae_preguntas.estados_id")
 						->get();

 		} else
 		{
 			return Pregunta::select("mae_preguntas.id","mae_preguntas.descripcion" , 
 										    "mae_preguntas.estados_id")
 									->where('mae_preguntas.estados_id',$estado_id)
 									->get();
 		}
	}

	public static function Listar_ID($id){

			return Pregunta::select("mae_preguntas.id","mae_preguntas.descripcion" , 
 										    "mae_preguntas.estados_id")
 									->where('mae_preguntas.id',$id)
 									->get();
	}

	public static function ListarBootGridPregunta($datos,$codigo_usuario)
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
        

        $query .= " SELECT desastres_mae_preguntas.preguntas_id, desastres_mae_preguntas.descripcion, 
                           CASE  desastres_estados.id WHEN 1 THEN CONCAT('<span class=\"label label-success\">',desastres_estados.nombre_estado,'</span>') ELSE  CONCAT('<span class=\"label label-danger\">',desastres_estados.nombre_estado,'</span>') END    as  nombre_estado ,
                           CASE  desastres_mae_preguntas.bOpcionMultiples WHEN 1 THEN CONCAT('<span class=\"label label-success\">SI</span>') ELSE  CONCAT('<span class=\"label label-danger\">NO</span>') END    as  nombre_opcion_multiple
                    FROM desastres_mae_preguntas 
						inner join desastres_estados on desastres_estados.id = desastres_mae_preguntas.estados_id";  


        if(!empty($_POST["searchPhrase"]))
        {
         $query .= ' WHERE (desastres_mae_preguntas.preguntas_id LIKE "%'.$_POST["searchPhrase"].'%" ';
         $query .= 'OR desastres_mae_preguntas.descripcion LIKE "%'.$_POST["searchPhrase"].'%" ';
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
         $query .= ' ORDER BY desastres_mae_preguntas.preguntas_id DESC ';
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


        $total_records = NivelInstitucion::select('desastres_mae_preguntas.preguntas_id')->count();


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
