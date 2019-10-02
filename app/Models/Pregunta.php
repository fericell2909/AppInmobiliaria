<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
use App\Models\PreguntaOpcion;

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
 									->where('mae_preguntas.estados_id',$estados_id)
 									->get();
 		}
	}

	public static function Listar_ID($id){

		return Pregunta::select( "mae_preguntas.preguntas_id","mae_preguntas.descripcion" ,
 								 "mae_preguntas.estados_id" , "mae_preguntas.bOpcionMultiples" ,
								 "mae_preguntas.tipo_respuesta_id" , "mae_preguntas.bIncluyeotros" ,
								 "mae_preguntas.opcion_maestro")
								->where('mae_preguntas.preguntas_id',$id)
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


        $total_records = Pregunta::select('desastres_mae_preguntas.preguntas_id')->count();


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

	public static function Nuevo($data)
	{

		try {
			
				$pregunta  = new Pregunta();
			
				$preguntas_id = Pregunta::ObtieneNuevoCorrelativo();
				
				$pregunta->preguntas_id = $preguntas_id[0]->correlativo;
				$pregunta->descripcion = $data['descripcion'];
				$pregunta->bOpcionMultiples = $data['bOpcionMultiples'];
				$pregunta->tipo_respuesta_id = $data['tipo_respuesta_id'];
				$pregunta->estados_id = $data['estados_id'];
				$pregunta->bIncluyeotros = $data['bIncluyeotros'];
				$pregunta->opcion_maestro = $data['opcion_maestro'];
				
				$pregunta->save();
				
				# Opcion de Respuesta SI ( ) -  NO ( )
				if ($data['tipo_respuesta_id'] == 2) {
					
					PreguntaOpcion::Nuevo(array(  'preguntas_id' => $preguntas_id[0]->correlativo,
					                              'opcion' => 1, 'descripcion' => 'SI','estados_id' => '1'
					                            )
										  );
					
					PreguntaOpcion::Nuevo(array(  'preguntas_id' => $preguntas_id[0]->correlativo,
					                              'opcion' => 2, 'descripcion' => 'NO','estados_id' => '1'
						)
					);
					
				} else {
					
					PreguntaOpcion::NuevoMaestro($preguntas_id[0]->correlativo, $data['opcion_maestro']);
				}
			
				return true;

		} catch (Exception $e) {
				return false;
		}
		
	}
	
	public static function ObtieneNuevoCorrelativo(){
		
		return DB::select("SELECT IF( MAX(preguntas_id) IS NULL, (CONCAT('P', YEAR(NOW()), '00001' )), (CONCAT('P', YEAR(NOW()), LPAD(RIGHT(MAX(preguntas_id), 5) + 1, 5, '0')))) as correlativo FROM desastres_mae_preguntas WHERE LEFT(preguntas_id, 5) = CONCAT('P',YEAR(NOW()));");
		
	}

	public static function Editar($institucion)
	{

		  try {

                $valores =  array(  'descripcion' => $institucion['descripcion'],
                                    'estados_id' => $institucion['estados_id'],
                                    'bOpcionMultiples' => $institucion['estados_id'],
									'bIncluyeotros' => $institucion['estados_id']
                                );
        
                    Pregunta::where('preguntas_id',$institucion['pregunta_id'])
                            ->update($valores);

                return true;
        } catch (Exception $e) {
                return false;
        }


	}
}
