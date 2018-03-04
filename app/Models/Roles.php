<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
                protected $table ='roles';
    public $primarykey='id';

    public function users()
    {
    	return $this->belongsToMany('App\User')
    				->withTimestamps();
    }	
    public static function Listar_Roles()
 	{
 		return Roles::select("roles.id","roles.descripcion as name")
 						->whereIn("roles.id",array(2,5))
 						->get();	
	}
}
