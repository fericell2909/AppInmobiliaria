@extends('layouts.app')
@section('htmlheader_title')
    Subir Archivos
@endsection
@section('css-inicio')
    <link rel="stylesheet" href="{{ asset('dist/css/jquery.bootgrid.min.css')}}">
@endsection
@section('script-inicio')
    <script src="{{ asset('dist/js/jquery.bootgrid.min.js')}}"></script>
@endsection
@section('content')

    <div class="container">

        <div class="row">

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
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Agregar archivos</div>
                    <div class="panel-body">

                            {!! Form::open(['route' => 'savearchivo',
                                'class' => 'form','method' => 'POST','id'=> 'RegistroUpdateArhivos','files' => true]) !!}
                            <input type="hidden" value="{{$codigoficha['codigoficha']}}" id="identificador" name="identificador"/>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nuevo Archivo</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="file" >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
