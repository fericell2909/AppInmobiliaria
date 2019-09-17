<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;

class User extends Model
{
      protected $table ='users';
    public $primarykey='id';

    public static function Listar_Usuarios()
 	{
 		return User::select("users.id","users.name","users.email","estados.nombre_estado")
 						->join('estados','estados.id','users.estado')
 						->get();	

 		//  Users::all();
	}
	
	
	public static function Listar($estados_id = '_all_')
	{
		if( $estados_id == '_all_') {
			
			return User::select("users.id","users.name as nombre" ,
				"users.estado as estado_id")
				->get();
			
		} else
		{
			return User::select("users.id","users.name as nombre" ,
				"users.estado as estados_id")
				->where('users.estados_id',$estados_id)
				->get();
		}
	}
	
	public static function Listar_ID($id){
		
		return User::select("users.id","users.name as nombre" ,
			"users.estado as estados_id")
			->where('users.id',$id)
			->get();
	}
	
	public static function ListarBootGridUser($datos,$codigo_usuario)
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
		
		$query .= " SELECT desastres_users.id, desastres_users.name AS nombre,
 					desastres_users.email AS usuario,
                           CASE  desastres_users.estado WHEN 1 THEN CONCAT('<span class=\"label label-success\">',desastres_estados.nombre_estado,'</span>') ELSE  CONCAT('<span class=\"label label-danger\">',desastres_estados.nombre_estado,'</span>') END    AS  nombre_estado ,
                           desastres_users.avatar ,
                           CASE  desastres_users.nSexo WHEN 1
                           	THEN CONCAT('<span class=\"label label-success\"> MASCULINO </span>') ELSE
                        		 CONCAT('<span class=\"label label-danger\"> FEMENINO </span>') END    AS  nombre_sexo,
                           desastres_roles.descripcion AS nombrerol
                    FROM desastres_users
						INNER JOIN desastres_estados ON desastres_estados.id = desastres_users.estado
						INNER JOIN desastres_roles ON desastres_roles.id = desastres_users.rol_id";
		
		#echo $query;
		if(!empty($_POST["searchPhrase"]))
		{
			$query .= ' WHERE (desastres_users.id LIKE "%'.$_POST["searchPhrase"].'%" ';
			$query .= 'OR desastres_users.name LIKE "%'.$_POST["searchPhrase"].'%" ';
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
			$query .= ' ORDER BY desastres_users.id DESC ';
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
		
		
		$total_records = User::select('desastres_users.id')->count();
		
		
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
			$user  = new User();
			$user->name= $data['name'];
			$user->email= $data['usuario'];
			$user->password= bcrypt($data['password']);
			$user->estado = $data['estados_id'];
			$user->rol_id = $data['rol_id'];
			$user->nSexo = $data['sexo_id'];
			$user->documento = $data['usuario'];
			$user->save();
			
			return true;
			
		} catch (Exception $e) {
			return false;
		}
		
		
	}
	
	public static function Editar($data)
	{
		
		try {
			
			$valores =  array(  'name' => $data['name'],
			                    'password' => bcrypt($data['password']),
			                    'estado' => $data['estados_id'],
			                    'rol_id' => $data['rol_id'],
			                    'nSexo' => $data['sexo_id']
			);
			
			User::where('id',$data['id'])
				->update($valores);
			
			return true;
		} catch (Exception $e) {
			return false;
		}
		
		
	}
}
