<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
