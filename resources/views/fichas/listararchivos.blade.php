@extends('layouts.app')
@section('htmlheader_title')
    Mantenimiento de Fases
@endsection
@section('css-inicio')
    <link rel="stylesheet" href="{{ asset('dist/css/jquery.bootgrid.min.css')}}">
@endsection
@section('script-inicio')
    <script src="{{ asset('dist/js/jquery.bootgrid.min.js')}}"></script>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('errors'))
        <div class="alert alert-warning">
            {{ session('errors') }}
        </div>
    @endif

    <div class="contenedor-list">

        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="row" class="text-center">
                    <h3>{{$cabeceras[0]->titulo}}</h3>
                </div>

                <br>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #C00000;">
                    <tr>
                        <th style="background-color:#8B0000; color:white;" colspan="3">I. INFORMACION GENERAL</th>
                    </tr>
                </table>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                </table>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                    <tr>
                        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
            border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > Nombre de la Institucion Educativa</th>
                        <th style="background-color: #ffffff; color:#58555A;width: 75%;padding:2px;
                    border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->nombre_local}}</th>
                    </tr>
                </table>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                </table>

                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                    <tr>
                        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
            border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > Departamento</th>
                        <th style="background-color: #ffffff; color:#58555A;width: 25%;padding:2px;
                    border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->departamento}}</th>
                        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
            border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > Provincia</th>
                        <th style="background-color: #ffffff; color:#58555A;width: 25%;padding:2px;
                    border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->provincia}}</th>
                    </tr>
                </table>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                </table>

                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                    <tr>
                        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
            border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > Distrito</th>
                        <th style="background-color: #ffffff; color:#58555A;width: 25%;padding:2px;
                    border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->distrito}}</th>
                        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
            border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > Direccion</th>
                        <th style="background-color: #ffffff; color:#58555A;width: 25%;padding:2px;
                    border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->direccion}}</th>
                    </tr>
                </table>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                </table>

                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                    <tr>
                        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
            border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > DRE</th>
                        <th style="background-color: #ffffff; color:#58555A;width: 25%;padding:2px;
                    border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->dre}}</th>
                        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
            border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > UGEL</th>
                        <th style="background-color: #ffffff; color:#58555A;width: 25%;padding:2px;
                    border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->ugel}}</th>
                    </tr>
                </table>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                </table>

                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                    <tr>
                        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
            border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > Codigo Local</th>
                        <th style="background-color: #ffffff; color:#58555A;width: 25%;padding:2px;
                    border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->codigo_local}}</th>
                        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
            border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" >Nivel </th>
                        <th style="background-color: #ffffff; color:#58555A;width: 25%;padding:2px;
                    border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->nivel}}</th>
                    </tr>
                </table>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                </table>

                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                    <tr>
                        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
            border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > Caracteristica</th>
                        <th style="background-color: #ffffff; color:#58555A;width: 25%;padding:2px;
                    border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->caracteristica}}</th>
                        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
            border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > Modalidad</th>
                        <th style="background-color: #ffffff; color:#58555A;width: 25%;padding:2px;
                    border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->modalidad}}</th>
                    </tr>
                </table>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                </table>



                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                </table>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #C00000;">
                    <tr>
                        <th style="background-color:#8B0000; color:white;" colspan="3">II. DATOS DEL DIRECTOR</th>
                    </tr>
                </table>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                </table>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                    <tr>
                        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
            border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > Apellidos y Nombres</th>
                        <th style="background-color: #ffffff; color:#58555A;width: 75%;padding:2px;
                    border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->director_contacto_nombre_apellidos}}</th>
                    </tr>
                </table>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                </table>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                    <tr>
                        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
            border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > Correo Electronico</th>
                        <th style="background-color: #ffffff; color:#58555A;width: 75%;padding:2px;
                    border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->director_contacto_email}}</th>
                    </tr>
                </table>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                </table>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                    <tr>
                        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
            border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > DNI</th>
                        <th style="background-color: #ffffff; color:#58555A;width: 25%;padding:2px;
                    border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->director_contacto_dni}}</th>
                        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
            border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > Celular</th>
                        <th style="background-color: #ffffff; color:#58555A;width: 25%;padding:2px;
                    border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->director_contacto_celular}}</th>
                    </tr>
                </table>
                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 14px;border:1px solid #ffffff;">
                </table>
            </div>

        </div>
    </div>
        <div class="panel-body">

            <div class="table-responsive" id="lista-fases">
                <table class="table table-hover" id="tbl-archivos">
                    <thead>
                    <tr>
                        <th class="text-center" style="vertical-align:middle;" data-column-id="nombre">Nombre del Archivo Cargado</th>
                        <th class="text-center" style="vertical-align:middle;" data-column-id="url_archivo">Url de Archivo</th>
                        <th class="text-center" style="vertical-align:middle;" data-column-id="commands" data-formatter="commands"
                            data-sortable="false">Acciones</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
@endsection
@section('script-fin')
    <script>
        $(document).ready(function()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var gridtable= $('#tbl-archivos').bootgrid({
                ajax:true,
                labels: {
                    noResults: "No Existen Resultados",
                    loading: "Cargando . . . ",
                    all: "Todos",
                    refresh: "Cargar",
                    search:"Buscar"
                },
                requestHandler: function (request) {
                    request.identificador = '<?php echo $identificador['identificador'];?>';
                    return request;
                },
                rowSelected:true,
                post:function(){
                    return {
                        id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
                    };
                },
                url:"../../FichasController/ListarArchivos",

                formatters: {

                    "commands": function(column, row)
                    {

                        return  "<a  class=\"btn \" donwload href=\"" +   row.url_archivo + "\"><i class=\"fa fa-download\" aria-hidden=\"true\"></i>&nbsp; Descargar</a>";
                        // <a  class=\"btn \" href=\"../Ubicaciones/Imprimir/" +   row.id + "\"><i class=\"fa fa-print\" aria-hidden=\"true\"></i>&nbsp; Imprimir</a>";
                    }
                }
            });

        });

    </script>
@endsection
