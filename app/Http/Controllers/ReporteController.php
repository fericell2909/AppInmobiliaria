<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use PDF;

class ReporteController extends Controller
{
    public function verreporteusuario()
    {
        $usuarios = User::Listar_Usuarios();
        $empresas =  Settings::Listar_Datos_Empresa();
        return view('reportes.usuarios.usuarios',compact('usuarios','empresas'));
    }
   
   public function rptusuarios($id)
    {

        $empresas =  Settings::Listar_Datos_Empresa();
        $usuarios = User::Listar_Usuarios();
        
        $vistaurl = 'reportes.usuarios.impresionusuarios';

        return $this->pdf($empresas,$usuarios,$vistaurl,$id);
    }

    private function pdf($empresa,$usuario,$vistaurl,$tipo)
    {

        $empresas = $empresa;

        $usuarios = $usuario;
        
        $nombre_documento = 'Reporte-Usuarios'; 

        $view =  \View::make($vistaurl,['empresas' => $empresas,'usuarios' => $usuarios])->render();
        
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
         
        //return $pdf; 
        if($tipo==2){return $pdf->stream(strval($nombre_documento));}
        if($tipo==1){return $pdf->download(strval($nombre_documento).'.pdf');} 
    }

 

}

