<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
	protected $table ='turnos';
	public $primarykey='id';
	
	public static function Listar()
	{
		return Turno::select("turnos.id","turnos.descripcion")
			->get();
	}
}
