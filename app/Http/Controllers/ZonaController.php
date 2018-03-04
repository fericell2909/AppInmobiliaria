<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zona;

class ZonaController extends Controller
{
	public function Listar_Provincias_x_Departamento($id)
    {
    	return Zona::Listar_zonas_provincias_x_departamento($id);
    }

    public function Listar_Distritos_x_Provincia($id)
    {
    	return Zona::Listar_zonas_distritos_x_provincia($id);
    }  
	
}
