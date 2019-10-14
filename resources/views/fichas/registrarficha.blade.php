
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Registro de Ficha</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <style>
        .nav-pills>li.nav-item.active {
            background-color: #f44336 !important;
        }
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('/img/loading.gif') 50% 50% no-repeat rgb(249,249,249);
            opacity: .8;
        }
    </style>
</head>

<body>
<a href="/home"><i class="fa fa-home"></i> Inicio</a>

<div class="loader"></div>
<div class="image-container set-full-height">

<!--   Big container   -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!--      Wizard container        -->
                <div class="wizard-container" style="padding-top: 10px !important;">
                    <div class="card wizard-card" data-color="red" id="wizard">
                        <form action="" method="" id="registro_ficha">
                            <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

                            <input type="hidden" id="hdd_productos_total" name="hdd_productos_total" value="<?php echo count($productos);?>" />
                            <input type="hidden" id="hdd_productos_codigos" name="hdd_productos_total" value="<?php echo $cadenaproductos['cadenaproductos']?>" />

                            <input type="hidden" id="hdd_actividades_codigos" name="hdd_actividades_codigos" value="<?php echo $cadenaactividades['cadenaactividades']?>" />
                            <input type="hidden" id="hdd_actividades_total" name="hdd_actividades_total" value="<?php echo count($actividades)?>" />


                            <input type="hidden" id="hdd_fases_codigos" name="hdd_fases_codigos" value="<?php echo $cadenafases['cadenafases']?>" />
                            <input type="hidden" id="hdd_fases_total" name="hdd_fases_total" value="<?php echo count($fases)?>" />

                            <input type="hidden" id="hdd_preguntas_codigos" name="hdd_preguntas_codigos" value="<?php echo $cadenapreguntas['cadenapreguntas']?>" />
                            <input type="hidden" id="hdd_preguntas_total" name="hdd_preguntas_total" value="<?php echo count($preguntas)?>" />


                            <input type="hidden" id="hdd_grupoactividades" name="hdd_grupoactividades" value="<?php echo $grupoactividades[0]->cadena?>" />

                            <input type="hidden" id="hdd_grupofases" name="hdd_grupofases" value="<?php echo $grupofases[0]->cadena?>" />

                            <input type="hidden" id="hdd_grupopreguntas" name="hdd_grupopreguntas" value="<?php echo $grupopreguntas[0]->cadena?>" />

                            <input type="hidden" id="hdd_cadenaspreguntas_fases" name="hdd_cadenaspreguntas_fases" value="<?php echo $preguntasfases[0]->cadena;?>">

                            <input type="hidden" id ="hdd_name_preguntas" name ="hdd_name_preguntas" value="<?php echo $namepreguntas[0]->cadena;?>" />

                            <input type="hidden" id ="usuarioregistro" name ="usuarioregistro" value="<?php echo $usuarioregistro['usuarioregistro'];?>" />
                            <input type="hidden" id ="codigo_encuesta" name ="codigo_encuesta" value="<?php echo $codigo_encuesta['codigo_encuesta'];?>" />

                            <div class="wizard-header">
                                <h3 class="wizard-title">
                                    {{$modeloencuestas[0]->descripcion }}
                                </h3>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#details" data-toggle="tab">INFORMACION BASICA</a></li>

                                    @foreach($productos as $producto)
                                        <li><a href="#captain_producto_id_{{ $producto->id  }}" data-toggle="tab">{{ $producto->descripcion }}</a></li>
                                    @endforeach

                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="details">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="color-azul">Departamento:</label>
                                                <select class="form-control text-center" name="departamento_id" id="departamento_id">
                                                    @foreach($departamentos as $departamento)
                                                        <option value="{{ $departamento->id }}">{{ $departamento->cNomZona}}</option>
                                                    @endforeach
                                                </select>
                                                <span  id ="ErrorMensaje-departamento_id" class="help-block"></span>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="color-azul">Provincia:</label>
                                                <select class="form-control text-center" name="provincia_id" id="provincia_id" style="display:none;">
                                                </select>
                                                <span  id ="ErrorMensaje-provincia_id" class="help-block"></span>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="color-azul">Distrito:</label>
                                                <select class="form-control text-center" name="distrito_id" id="distrito_id" style="display:none;">
                                                </select>
                                                <span  id ="ErrorMensaje-distrito_id" class="help-block"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <legend style="display: inline-block;">
                                                <a href="#" class="btn btn-small btn-primary" data-toggle="modal" data-target="#largeModal"
                                                           onclick="abrir_ventana_modal('1','', '1' , '', '1');"
                                                    >
                                                        <i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Local
                                                    </a></legend>

                                            <div class="row">
                                                <div class="col-xs-12 col-lg-3">
                                                    <label class="color-azul">DRE / GRE </label>
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control text-center"
                                                               id="ficha_dre_local" name="ficha_dre_local"
                                                               placeholder="" disabled ></div>
                                                    <span id="ErrorMensaje-ficha_dre_local" class="help-block"></span>
                                                </div>
                                                <div class="col-xs-12 col-lg-3">
                                                    <label class="color-azul"> UGEL </label>
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control text-center"
                                                               id="ficha_ugel" name="ficha_ugel"
                                                               placeholder="" disabled ></div>
                                                    <span id="ErrorMensaje-ficha_ugel" class="help-block"></span>
                                                </div>
                                                <div class="col-xs-12 col-lg-3">
                                                    <label class="color-azul">NOMBRE DE LA I.E. </label>
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control text-center"
                                                               id="ficha_nombre_ie" name="ficha_nombre_ie"
                                                               placeholder="" disabled ></div>
                                                    <span id="ErrorMensaje-ficha_nombre_ie" class="help-block"></span>
                                                </div>
                                                <div class="col-xs-12 col-lg-3">
                                                    <label class="color-azul">CODIGO LOCAL </label>
                                                    <div class="form-group ">
                                                        <input type="text" class="form-control text-center"
                                                               id="ficha_codigo_local" name="ficha_codigo_local"
                                                               placeholder="" disabled ></div>
                                                    <span id="ErrorMensaje-ficha_codigo_local" class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <label class="color-azul">Titulo de Ficha:</label>
                                                <input type="text" class="form-control text-center" id="titulo_ficha"
                                                       name="titulo_ficha"  maxlength="100" placeholder="Titulo de Ficha">
                                                <span  id ="ErrorMensaje-titulo_ficha" class="help-block"></span>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="color-azul">Nivel</label>
                                                <select class="form-control text-center" name="nivel_id" id="nivel_id">
                                                    @foreach($niveles as $nivel)
                                                        <option class="text-center" value="{{$nivel->id}}">{{$nivel->descripcion}}</option>
                                                    @endforeach
                                                </select>
                                                <span  id ="ErrorMensaje-nivel_id" class="help-block"></span>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <label class="color-azul">Observaciones</label>
                                                <textarea  placeholder="Escriba sus Observaciones" class="form-control"
                                                           name="descripcion_id" id="descripcion_id" rows="8"></textarea>
                                                <span  id ="ErrorMensaje-descripcion_id" class="help-block"></span>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="color-azul">Caracteristicas</label>
                                                        <select class="form-control text-center" name="caracteristica_id" id="caracteristica_id">
                                                            @foreach($caracteristicas as $caracteristica)
                                                                <option class="text-center" value="{{$caracteristica->id}}">{{$caracteristica->descripcion}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span  id ="ErrorMensaje-caracteristica_id" class="help-block"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="color-azul">Modalidad</label>
                                                        <select class="form-control text-center" name="modalidad_id" id="modalidad_id">
                                                            @foreach($modalidades as $modalidad)
                                                                <option value="{{$modalidad->id}}">{{$modalidad->descripcion}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span  id ="ErrorMensaje-modalidad_id" class="help-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <legend>Toltal Alumnos</legend>
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <div class="form-group bmd-form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                  <i class="fa fa-group"></i>
                                                                </span>
                                                                </div>
                                                                <label for="nAlmMascInicial">Inicial - Hombres</label>
                                                                <input type="number" name="nAlmMascInicial" id="nAlmMascInicial" class="form-control text-center"
                                                                       placeholder="Total de Alumnos" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group bmd-form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                  <i class="fa fa-group"></i>
                                                                </span>
                                                                </div>
                                                                <label for="nAlmMascInicial">Primaria - Hombres</label>
                                                                <input type="number" name="nAlmMascPrimaria" id="nAlmMascPrimaria" class="form-control text-center"
                                                                       placeholder="Total de Alumnos" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group bmd-form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                  <i class="fa fa-group"></i>
                                                                </span>
                                                                </div>
                                                                <label for="nAlmMascSecundaria">Secundaria - Hombres</label>
                                                                <input type="number" name="nAlmMascSecundaria" id="nAlmMascSecundaria" class="form-control text-center"
                                                                       placeholder="Total de Alumnos" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group bmd-form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                  <i class="fa fa-group"></i>
                                                                </span>
                                                                </div>
                                                                <label for="nAlmMascEBE">EBE - Hombres</label>
                                                                <input type="number" name="nAlmMascEBE" id="nAlmMascEBE" class="form-control text-center"
                                                                       placeholder="Total de Alumnos" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group bmd-form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                  <i class="fa fa-group"></i>
                                                                </span>
                                                                </div>
                                                                <label for="nAlmMascEBA">EBA - Hombres</label>
                                                                <input type="number" name="nAlmMascEBA" id="nAlmMascEBA" class="form-control text-center"
                                                                       placeholder="Total de Alumnos" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="form-group bmd-form-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                  <i class="fa fa-group"></i>
                                                                </span>
                                                                </div>
                                                                <label for="nAlmMascCETPRO">CETPRO - Hombres</label>
                                                                <input type="number" name="nAlmMascCETPRO" id="nAlmMascCETPRO" class="form-control text-center"
                                                                       placeholder="Total de Alumnos" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <legend>Toltal Alumnos</legend>
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <div class="form-group bmd-form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                  <i class="fa fa-group"></i>
                                                                </span>
                                                            </div>
                                                            <label for="nAlmMujInicial">Inicial - Mujeres</label>
                                                            <input type="number" name="nAlmMujInicial" id="nAlmMujInicial" class="form-control text-center"
                                                                   placeholder="Total de Alumnos" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group bmd-form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                  <i class="fa fa-group"></i>
                                                                </span>
                                                            </div>
                                                            <label for="nAlmMujPrimaria">Primaria - Mujeres</label>
                                                            <input type="number" name="nAlmMujPrimaria" id="nAlmMujPrimaria" class="form-control text-center"
                                                                   placeholder="Total de Alumnos" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group bmd-form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                  <i class="fa fa-group"></i>
                                                                </span>
                                                            </div>
                                                            <label for="nAlmMujSecundaria">Secundaria - Mujeres</label>
                                                            <input type="number" name="nAlmMujSecundaria" id="nAlmMujSecundaria" class="form-control text-center"
                                                                   placeholder="Total de Alumnos" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group bmd-form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                  <i class="fa fa-group"></i>
                                                                </span>
                                                            </div>
                                                            <label for="nAlmMujEBE">EBE - Mujeres</label>
                                                            <input type="number" name="nAlmMujEBE" id="nAlmMujEBE" class="form-control text-center"
                                                                   placeholder="Total de Alumnos" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group bmd-form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                  <i class="fa fa-group"></i>
                                                                </span>
                                                            </div>
                                                            <label for="nAlmMujEBA">EBA - Mujeres</label>
                                                            <input type="number" name="nAlmMujEBA" id="nAlmMujEBA" class="form-control text-center"
                                                                   placeholder="Total de Alumnos" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group bmd-form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                  <i class="fa fa-group"></i>
                                                                </span>
                                                            </div>
                                                            <label for="nAlmMujCETPRO">CETPRO - Mujeres</label>
                                                            <input type="number" name="nAlmMujCETPRO" id="nAlmMujCETPRO" class="form-control text-center"
                                                                   placeholder="Total de Alumnos" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <fieldset>
                                                <legend  class="color-azul">DATOS DEL DIRECTOR ( EN CASO DE QUE LA IE SEA UNIDOCENTE LLENAR SOLO COMO DIRECTOR)</legend>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label class="color-azul">Nombres y Apellidos</label>
                                                        <input type="text" class="form-control text-center"  id="director_contacto_nombres_apellidos" name="director_contacto_nombres_apellidos"
                                                               placeholder="Nombres y Apellidos">
                                                        <span  id ="ErrorMensaje-director_contacto_nombres_apellidos" class="help-block"></span>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="color-azul">Dni</label>
                                                        <input type="text"  class="form-control text-center"  id="director_contacto_dni" name="director_contacto_dni"
                                                               placeholder="Dni : 445770924" maxlength="8">
                                                        <span  id ="ErrorMensaje-director_contacto_dni" class="help-block"></span>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="color-azul">Correo Electrónico</label>
                                                        <input type="text"  class="form-control text-center"  id="director_contacto_email" name="director_contacto_email"
                                                               placeholder="ejemplo@ejemplo.com">
                                                        <span  id ="ErrorMensaje-director_contacto_email" class="help-block"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label class="color-azul">Condicion Laboral</label>
                                                        <select class="form-control text-center" name="director_laboral_id" id="director_laboral_id">
                                                            @foreach($laborales as $laboral)
                                                                <option class="text-center" value="{{$laboral->id}}">{{$laboral->descripcion}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span  id ="ErrorMensaje-director_laboral_id" class="help-block"></span>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="color-azul">Celular</label>
                                                        <input type="text"  class="form-control text-center"  id="director_contacto_celular" name="director_contacto_celular"
                                                               placeholder="Celular : 955555555" maxlength="9">
                                                        <span  id ="ErrorMensaje-director_contacto_celular" class="help-block"></span>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="input-group">
                                                            <label for="director_contacto_tiempo_cargo">Tiempo Cargo - Meses</label>
                                                            <input type="number" name="director_contacto_tiempo_cargo" id="director_contacto_tiempo_cargo"
                                                                   class="form-control text-center"
                                                                   placeholder="Tiempo en el Cargo" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="">
                                            <fieldset>
                                                <legend  class="color-azul">DATOS DEL  RESPONSABLE EN GRD</legend>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label class="color-azul">Nombres y Apellidos</label>
                                                        <input type="text" class="form-control text-center"  id="responsable_contacto_nombres_apellidos" name="responsable_contacto_nombres_apellidos"
                                                               placeholder="Nombres y Apellidos">
                                                        <span  id ="ErrorMensaje-responsable_contacto_nombres_apellidos" class="help-block"></span>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="color-azul">Dni</label>
                                                        <input type="text"  class="form-control text-center"  id="responsable_contacto_dni" name="responsable_contacto_dni"
                                                               placeholder="Dni : 445770924" maxlength="8">
                                                        <span  id ="ErrorMensaje-responsable_contacto_dni" class="help-block"></span>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="color-azul">Correo Electrónico</label>
                                                        <input type="text"  class="form-control text-center"  id="responsable_contacto_email" name="responsable_contacto_email"
                                                               placeholder="ejemplo@ejemplo.com">
                                                        <span  id ="ErrorMensaje-responsable_contacto_email" class="help-block"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label class="color-azul">Condicion Laboral</label>
                                                        <select class="form-control text-center" name="responsable_laboral_id" id="responsable_laboral_id">
                                                            @foreach($laborales as $laboral)
                                                                <option class="text-center" value="{{$laboral->id}}">{{$laboral->descripcion}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span  id ="ErrorMensaje-responsable_laboral_id" class="help-block"></span>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label class="color-azul">Celular</label>
                                                        <input type="text"  class="form-control text-center"  id="responsable_contacto_celular" name="responsable_contacto_celular"
                                                               placeholder="Celular : 955555555" maxlength="9">
                                                        <span  id ="ErrorMensaje-responsable_contacto_celular" class="help-block"></span>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="input-group">
                                                            <label for="responsable_contacto_tiempo_cargo">Tiempo Cargo - Meses</label>
                                                            <input type="number" name="responsable_contacto_tiempo_cargo" id="responsable_contacto_tiempo_cargo"
                                                                   class="form-control text-center"
                                                                   placeholder="Tiempo en el Cargo" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                    @foreach($productos as $producto)
                                        <div class="tab-pane" id="captain_producto_id_{{ $producto->id  }}">
                                                @foreach($actividades as $actividad)
                                                     @if( $producto->id == $actividad->codigoproducto )
                                                                 <div class="row">
                                                                     <div class="accordion" id="accordionExample_act_{{ $actividad->codigoactividad  }}">
                                                                         <div class="card">
                                                                             <div class="card-header" id="headingOne_act_{{ $actividad->codigoactividad  }}">
                                                                                 <h2 class="mb-0">
                                                                                     <button class="btn btn-danger" type="button" data-toggle="collapse"
                                                                                             data-target="#collapseOne_act_{{ $actividad->codigoactividad  }}"
                                                                                             aria-expanded="true" aria-controls="collapseOne_act_{{ $actividad->codigoactividad  }}"
                                                                                            style="margin: 5px !important;"
                                                                                     >
                                                                                         {{$actividad->descripcionactividad}}
                                                                                     </button>
                                                                                 </h2>
                                                                             </div>

                                                                             <div id="collapseOne_act_{{ $actividad->codigoactividad  }}" class="collapse <?php if($actividad->codigoactividad == 1) { echo ""; } else { echo "false";} ?>" aria-labelledby="headingOne_act_{{ $actividad->codigoactividad  }}" data-parent="#accordionExample_act_{{ $actividad->codigoactividad  }}">

                                                                                 @foreach($fases as $fase)
                                                                                     @if( $producto->id == $fase->codigoproducto and $fase->codigoactividad == $actividad->codigoactividad )
                                                                                         <div class="row" style="margin-bottom: 5px;">
                                                                                             <div class="col-sm-12">
                                                                                                <label for="" class="label label-primary"
                                                                                                      style="font-size: 15px !important; margin-left: 5px !important;" >{{$fase->descripcion}}</label>
                                                                                                 @foreach($preguntas as $pregunta)
                                                                                                     @if( $producto->id == $pregunta->codigoproducto and $pregunta->codigoactividad == $actividad->codigoactividad
                                                                                                        and $pregunta->codigofase == $fase->codigofase)
                                                                                                                 <h4 style="margin-left:5px; margin-top : 5px"  >{{ $pregunta->codigopregunta . ' - ' .  $pregunta->descripcion}}</h4>
                                                                                                         <input type="hidden" id="opt_producto_{{$producto->id}}_actividad_{{$actividad->codigoactividad}}_fase_{{$fase->codigofase}}_pregunta_{{$pregunta->codigopregunta}}_cantidades" value =
                                                                                                                "{{$pregunta->bingresacantidades}}">
                                                                                                         <input type="hidden" id="opt_producto_{{$producto->id}}_actividad_{{$actividad->codigoactividad}}_fase_{{$fase->codigofase}}_pregunta_{{$pregunta->codigopregunta}}_multiselect" value =
                                                                                                         "{{$pregunta->bopcionmultiple}}">
                                                                                                         <div class="row">

                                                                                                         </div>
                                                                                                         @foreach($opciones as $opcion)
                                                                                                             @if($pregunta->codigopregunta == $opcion->codigopregunta  and
                                                                                                                 $pregunta->bingresacantidades == 0 and  $pregunta->bopcionmultiple == 0 )
                                                                                                             <label class="radio-inline" style="margin-left:5px;">
                                                                                                                 <input type="radio"
                                                                                                                        name="opt_producto_{{$producto->id}}_actividad_{{$actividad->codigoactividad}}_fase_{{$fase->codigofase}}_pregunta_{{$opcion->codigopregunta}}"
                                                                                                                        value="{{ $opcion->codigoopcion }}">{{$opcion->descripcion}}
                                                                                                             </label>
                                                                                                             @endif
                                                                                                             @if($pregunta->codigopregunta == $opcion->codigopregunta  and
                                                                                                                         $pregunta->bingresacantidades == 0 and  $pregunta->bopcionmultiple == 1 )
                                                                                                                     <label class="radio-inline" style="margin-left:5px;">
                                                                                                                         <input type="checkbox"
                                                                                                                                name="opt_producto_{{$producto->id}}_actividad_{{$actividad->codigoactividad}}_fase_{{$fase->codigofase}}_pregunta_{{$opcion->codigopregunta}}[]"
                                                                                                                                value="{{ $opcion->codigoopcion }}">{{$opcion->descripcion}}
                                                                                                                     </label>
                                                                                                             @endif

                                                                                                             @if($pregunta->codigopregunta == $opcion->codigopregunta  and
                                                                                                                $pregunta->bingresacantidades == 1)
                                                                                                                     <div class="input-group" style="display: inline-block;">
                                                                                                                         <div class="input-group-prepend">
                                                                                                                            <span class="input-group-text">
                                                                                                                              <i class="fa fa-group"></i>
                                                                                                                            </span>
                                                                                                                         </div>
                                                                                                                         <label for="nAlmMascSecundaria">{{$opcion->descripcion}}</label>
                                                                                                                         <input type="number"
                                                                                                                                name="opt_producto_{{$producto->id}}_actividad_{{$actividad->codigoactividad}}_fase_{{$fase->codigofase}}_pregunta_{{$opcion->codigopregunta}}_dcantidad"
                                                                                                                                class="form-control text-center"
                                                                                                                                placeholder="{{$opcion->descripcion}}" value="0">
                                                                                                                     </div>
                                                                                                             @endif
                                                                                                         @endforeach
                                                                                                         @if($pregunta->bincluyeotros == 1 and
                                                                                                                 $pregunta->bingresacantidades == 0)
                                                                                                             <input type="text"
                                                                                                                    name="opt_producto_{{$producto->id}}_actividad_{{$actividad->codigoactividad}}_fase_{{$fase->codigofase}}_pregunta_{{$pregunta->codigopregunta}}_otros"
                                                                                                                    id="opt_producto_{{$producto->id}}_actividad_{{$actividad->codigoactividad}}_fase_{{$fase->codigofase}}_pregunta_{{$pregunta->codigopregunta}}_otros"
                                                                                                                    class="form text-center"
                                                                                                                    style="width: 350px;"
                                                                                                                    placeholder="Otros" value="">
                                                                                                         @endif
                                                                                                     @endif
                                                                                                 @endforeach
                                                                                             </div>
                                                                                         </div>
                                                                                     @endif
                                                                                 @endforeach
                                                                             </div>
                                                                         </div>
                                                                     </div>
                                                                </div>
                                                     @endif
                                                @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <input type='button' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish'
                                           value='Registrar Ficha' id="Registrar_Ficha_Encuesta"
                                            onclick="save_registrar_ficha();"
                                    />
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div> <!-- row -->
    </div> <!--  big container -->

</div>
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Busqueda de Local</h4>
                <input type="hidden" id="hdd_tipo_opcion" value="0" name= "hdd_tipo_opcion" >
                <input type="hidden" id="hdd_pregunta_opcion" value="0" name= "hdd_pregunta_opcion" >
                <input type="hidden" id="hdd_correlativo_opcion" value="0" name= "hdd_correlativo_opcion" >
            </div>
            <div class="modal-body">
                <label for="descripcion_opcion">Nombre de Local a Buscar</label>
                <input type="text" class="form form-control text-center " name="txtbusquedalocal" id="txtbusquedalocal"
                placeholder="Digite un Nombre o Codigo y presione Enter...">
                <div id="div_txtbusquedalocal" style=""></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>Cerrar</button>
            </div>
        </div>
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="assets/js/material-bootstrap-wizard.js"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="assets/js/jquery.validate.min.js"></script>
<script src="{{ asset('dist/js/inmobiliaria.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    function abrir_ventana_modal(ptipo,ppreguntaid , pcorrelativo , pdescripcion , pestado)
    {

        $('#txtbusquedalocal').val('');
        if ( ptipo != 1 ) { $('#largeModal').modal('show') }


    }

    function save_registrar_ficha() {

        let titulo = $('#titulo_ficha').val().trim();

        if( titulo.length == 0 || titulo == "" ) {

            Swal.fire({
                type: 'warning',
                title: 'Debe Ingresar un Titulo para la Ficha.'
            });
            return false;
        }

        let codigo_local = $('#ficha_codigo_local').val().trim();

        if( codigo_local.length == 0 || codigo_local == '' ) {

            Swal.fire({
                type: 'warning',
                title: 'Debe Seleccionar un Local.'
            });
            return false;
        }

        let data_procesar = {
            codigo_departamento: $('#departamento_id').val(),
            codigo_provincia: $('#provincia_id').val(),
            codigo_distrito: $('#distrito_id').val(),
            codigo_local: $('#ficha_codigo_local').val(),
            titulo_ficha: $('#titulo_ficha').val().trim(),
            observaciones: $('#descripcion_id').val().trim(),
            nivel: $('#nivel_id').val().trim(),
            caracteristica: $('#caracteristica_id').val().trim(),
            modalidad: $('#modalidad_id').val().trim(),
            nAlmMascInicial: $('#nAlmMascInicial').val().trim(),
            nAlmMascPrimaria: $('#nAlmMascPrimaria').val().trim(),
            nAlmMascSecundaria: $('#nAlmMascSecundaria').val().trim(),
            nAlmMascEBE: $('#nAlmMascEBE').val(),
            nAlmMascEBA: $('#nAlmMascEBA').val(),
            nAlmMascCETPRO: $('#nAlmMascCETPRO').val(),
            nAlmMujInicial: $('#nAlmMujInicial').val(),
            nAlmMujPrimaria: $('#nAlmMujPrimaria').val(),
            nAlmMujSecundaria: $('#nAlmMujSecundaria').val(),
            nAlmMujcEBE: $('#nAlmMujEBE').val(),
            nAlmMujcEBA: $('#nAlmMujEBA').val(),
            nAlmMujCETPRO: $('#nAlmMujCETPRO').val(),
            director_contacto_nombres_apellidos: $('#director_contacto_nombres_apellidos').val().trim(),
            director_contacto_dni: $('#director_contacto_dni').val().trim(),
            director_contacto_email: $('#director_contacto_email').val().trim(),
            director_laboral: $('#director_laboral_id').val(),
            director_contacto_celular: $('#director_contacto_celular').val(),
            director_contacto_tiempo_cargo: $('#director_contacto_tiempo_cargo').val(),

            responsable_contacto_nombres_apellidos: $('#responsable_contacto_nombres_apellidos').val().trim(),
            responsable_contacto_dni: $('#responsable_contacto_dni').val().trim(),
            responsable_contacto_email: $('#responsable_contacto_email').val().trim(),
            responsable_laboral: $('#responsable_laboral_id').val(),
            responsable_contacto_celular: $('#responsable_contacto_celular').val(),
            responsable_contacto_tiempo_cargo: $('#responsable_contacto_tiempo_cargo').val(),
            cantidad_productos: '<?php echo count($productos);?>',

            hdd_productos_total: $('#hdd_productos_total').val(),
            hdd_productos_codigos: $('#hdd_productos_codigos').val(),
            hdd_actividades_codigos: $('#hdd_actividades_codigos').val(),
            hdd_actividades_total: $('#hdd_actividades_total').val(),
            hdd_fases_codigos: $('#hdd_fases_codigos').val(),
            hdd_fases_total: $('#hdd_fases_total').val(),
            hdd_preguntas_codigos: $('#hdd_preguntas_codigos').val(),
            hdd_preguntas_total: $('#hdd_preguntas_total').val(),
            hdd_grupoactividades: $('#hdd_grupoactividades').val(),
            hdd_grupofases: $('#hdd_grupofases').val(),
            hdd_grupopreguntas: $('#hdd_grupopreguntas').val(),
            hdd_cadenaspreguntas_fases: $('#hdd_cadenaspreguntas_fases').val(),
            hhdd_cadena_name_preguntas : $('#hdd_name_preguntas').val(),
            usuarioregistro : $('#usuarioregistro').val(),
            codigo_encuesta : $('#codigo_encuesta').val()
        }


        // opt_producto_1_actividad_1_fase_1_pregunta_P201900001
        let hhdd_cadena_name = $('#hdd_name_preguntas').val();

        let explode_names = hhdd_cadena_name.split(',');
        let cadena_aux_preguntas = "";
        let t_pregunta = 0;
        let t_fase = $('#hdd_fases_total').val();
        for (var i_fase = 1; i_fase <= t_fase; i_fase++) {

            cadena_aux_preguntas = explode_names[i_fase-1].split('*');
            t_pregunta =     cadena_aux_preguntas.length;

            for (i_pregunta = 1 ; i_pregunta <= t_pregunta; i_pregunta++) {

                let scadena = cadena_aux_preguntas[i_pregunta-1];

                let valor = $("input:radio[name=" + scadena + "]:checked").val();
                let valor_otros = $("#" + scadena + "_otros").val();

                let ingresa_cantidades = $("#" + scadena + "_cantidades").val();

                let ingresa_multiselect = $("#" + scadena + "_multiselect").val();

                if( valor == undefined ) {

                    if (ingresa_cantidades <= 0) {

                        if(ingresa_multiselect <= 0){

                            Swal.fire({
                                type: 'warning',
                                title: 'La Pregunta : ' + scadena.slice(-10) + ' Aun no ha sido respondida'
                            });

                            return false;

                        } else
                        {

                            let i_cnt = 1;
                            let saux = "";

                            $("input[name='" + scadena + "[]']:checked").each(function () {
                                if (i_cnt == 1) {
                                    saux = $(this).val();
                                } else {
                                    saux = saux + ',' + $(this).val();
                                }

                                i_cnt = i_cnt + 1;
                            });

                            if (saux == '')
                            {
                                Swal.fire({
                                    type: 'warning',
                                    title: 'La Pregunta : ' + scadena.slice(-10) + ' Aun no ha sido respondida'
                                });

                                return false;

                            } else
                            {
                                data_procesar[scadena] = saux;
                            }

                        }

                    } else {
                        if (parseInt(ingresa_cantidades) > 0) {

                            let ii = 1;
                            let scad_aux = "";

                            $("input[name='" + scadena + "_dcantidad']").each(function () {
                                if (ii == 1) {
                                    scad_aux = $(this).val();
                                } else {
                                    scad_aux = scad_aux + ',' + $(this).val();
                                }

                                ii = ii + 1;
                            });

                            data_procesar[scadena] = scad_aux;
                        }
                    }
                }
                else
                {

                   data_procesar[scadena] = valor;


                    if(valor_otros == undefined)
                    {
                        valor_otros = '-1';

                    }

                    data_procesar[scadena+'_otros'] = valor_otros;


                }

            }

        }

        console.log(data_procesar);

        $(".loader").css("display","block");

        $.ajax({
            url: '../FichaController/GuardarFicha',
            data : data_procesar,
            type: 'POST',
            datatype: 'JSON',
            success: function(respuesta) {
                let data =  JSON.parse(respuesta);
                Swal.fire({
                    type: 'success',
                    title: 'Atencion. Aviso Importante',
                    text: data.mensajerespuesta
            });

                $(".loader").css("display","none");

                window.location.href = "/home";

            },
            error: function() {
                Swal.fire({
                    type: 'error',
                    title: 'Atencion. Aviso Importante',
                    text: respuesta.mensajerespuesta
                });
                $(".loader").css("display","none");
            }
        });


    }

    $( document ).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#Registrar_Ficha_Encuesta').on('click',function() {




        });

        $('#txtbusquedalocal').on('keypress', function(e) {
            if (e.which == 13) {

                let string_cdatoslocales = '<select class="custom-select form form-control" id="lst_txtbusquedalocal">';

                $('#div_txtbusquedalocal').html('');
                $('#div_txtbusquedalocal').css('display','block');

                $('#div_txtbusquedalocal').html('');

                let datajson  = {
                    current : 1 ,
                    rowCount: 20 ,
                    searchPhrase : $('#txtbusquedalocal').val()
                }

                $.ajax({
                    url: '../../Locales/Listar',
                    data: datajson,
                    method: 'POST',
                    datatype: 'json',
                    async: false
                }).done(function (respuesta) {

                    let data  =  JSON.parse(respuesta);

                    if (data.total > 0 && data.rows.length > 0) {
                        let rows =  data.rows;
                        $.each(rows, function (index, val) {
                            let id = rows[index].id;
                            let codigo = rows[index].codigo;
                            let nombre =  rows[index].nombre;
                            let dre = rows[index].dre;
                            let ugel = rows[index].ugel;

                            if(nombre == '') {
                                nombre = 'No se ha defi';
                            }
                            string_cdatoslocales = string_cdatoslocales +
                                '<option value="' + id + '" data-id="' + id + '" ' +
                                'data-codigo="' + codigo + '" ' +
                                'data-nombre = "' + nombre + '" ' +
                                'data-dre = "' + dre + '"' +
                                'data-ugel = "' + ugel + '"' +
                                ' >' + nombre + '</option>';

                        });

                        string_cdatoslocales = string_cdatoslocales + '</select>';
                        console.log(string_cdatoslocales);
                        $('#div_txtbusquedalocal').html(string_cdatoslocales);

                        let lst_datostxtbusquedalocal = $('#lst_txtbusquedalocal');
                        lst_datostxtbusquedalocal.attr('size', '10');

                        $('#lst_txtbusquedalocal').click(function(){

                            var seleccionado = $(this).find('option:selected');
                            // 'type' es lo que va a continuación del guión en data-type
                            // var animal = seleccionado.data('type');

                            $('#div_txtbusquedalocal').html('');

                            $('#ficha_dre_local').val(seleccionado.data("dre"));
                            $('#ficha_ugel').val(seleccionado.data("ugel"));
                            $('#ficha_nombre_ie').val(seleccionado.data("nombre"));
                            //$('#ficha_codigo_local').val(lst_datostxtbusquedalocal.data('codigo'));

                            $('#ficha_codigo_local').val(seleccionado.data("codigo"));
                            $('#largeModal').modal('hide');


                        });


                    } else{
                        Swal.fire({
                            type: 'warning',
                            title: 'No se Encontraron Registros Disponibles'
                        });
                    }
                }).fail(function (xhr) {
                    Swal.fire({
                        type: 'error',
                        title: 'HA Ocurrido un Error.'
                    });
                });
            }
        });

    });
</script>

<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut("slow");
    });
</script>
</html>