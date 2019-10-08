
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
    </style>
</head>

<body>
<a href="/home"><i class="fa fa-home"></i> Inicio</a>


<div class="image-container set-full-height">

<!--   Big container   -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!--      Wizard container        -->
                <div class="wizard-container" style="padding-top: 10px !important;">
                    <div class="card wizard-card" data-color="red" id="wizard">
                        <form action="" method="">
                            <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

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
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <label class="color-azul">Titulo de Ficha:</label>
                                                <input type="text" class="form-control text-center" id="titulo_ficha"
                                                       name="titulo_ficha"  maxlength="100" placeholder="Titulo de Ficha">
                                                <span  id ="ErrorMensaje-titulo_ficha" class="help-block"></span>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="color-azul">Nivel</label>
                                                <select class="form-control text-center" name="clasificacion_id" id="clasificacion_id">
                                                    @foreach($niveles as $nivel)
                                                        <option class="text-center" value="{{$nivel->id}}">{{$nivel->descripcion}}</option>
                                                    @endforeach
                                                </select>
                                                <span  id ="ErrorMensaje-clasificacion_id" class="help-block"></span>
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
                                                        <select class="form-control text-center" name="tipos_id" id="tipos_id">
                                                            @foreach($caracteristicas as $caracteristica)
                                                                <option class="text-center" value="{{$caracteristica->id}}">{{$caracteristica->descripcion}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span  id ="ErrorMensaje-tipos_id" class="help-block"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="color-azul">Modalidad</label>
                                                        <select class="form-control text-center" name="cuarto_id" id="cuarto_id">
                                                            @foreach($modalidades as $modalidad)
                                                                <option value="{{$modalidad->id}}">{{$modalidad->descripcion}}</option>
                                                            @endforeach
                                                        </select>
                                                        <span  id ="ErrorMensaje-cuarto_id" class="help-block"></span>
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
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                  <i class="fa fa-group"></i>
                                                                </span>
                                                            </div>
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
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                  <i class="fa fa-group"></i>
                                                                </span>
                                                            </div>
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
                                                                                                                 <h4 style="margin-left:5px; margin-top : 5px">{{$pregunta->descripcion}}</h4>
                                                                                                         <div class="row">

                                                                                                         </div>
                                                                                                         @foreach($opciones as $opcion)
                                                                                                             @if($pregunta->codigopregunta == $opcion->codigopregunta  and
                                                                                                                 $pregunta->bingresacantidades == 0 and  $pregunta->bopcionmultiple == 0 )
                                                                                                             <label class="radio-inline" style="margin-left:5px;">
                                                                                                                 <input type="radio"
                                                                                                                        name="opt_fase_{{$fase->codigofase}}_pregunta_{{$opcion->codigopregunta}}"
                                                                                                                        value="{{ $opcion->codigoopcion }}">{{$opcion->descripcion}}
                                                                                                             </label>
                                                                                                             @endif
                                                                                                             @if($pregunta->codigopregunta == $opcion->codigopregunta  and
                                                                                                                         $pregunta->bingresacantidades == 0 and  $pregunta->bopcionmultiple == 1 )
                                                                                                                     <label class="radio-inline" style="margin-left:5px;">
                                                                                                                         <input type="checkbox"
                                                                                                                                name="opt_fase_{{$fase->codigofase}}_pregunta_{{$opcion->codigopregunta}}"
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
                                                                                                                         <input type="number" name="nAlmMascSecundaria" id="nAlmMascSecundaria" class="form-control text-center"
                                                                                                                                placeholder="{{$opcion->descripcion}}" value="0">
                                                                                                                     </div>
                                                                                                             @endif
                                                                                                         @endforeach
                                                                                                         @if($pregunta->bincluyeotros == 1 and
                                                                                                                 $pregunta->bingresacantidades == 0)
                                                                                                             <input type="text" name="opt_otros_fase_{{$fase->codigofase}}_pregunta_{{$opcion->codigopregunta}}"
                                                                                                                    id="opt_otros_fase_{{$fase->codigofase}}_pregunta_{{$opcion->codigopregunta}}"
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
                                           value='Registrar Ficha' id="Registrar_Ficha_Encuesta"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div> <!-- row -->
    </div> <!--  big container -->

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
    $( document ).ready(function() {

        $('#Registrar_Ficha_Encuesta').on('click',function() {

            let titulo = $('#titulo_ficha').val().trim();

            if( titulo.length == 0 || titulo == '' ) {

                Swal.fire({
                    type: 'warning',
                    title: 'Debe Ingresar un Titulo para la Ficha.'
                });
            }


        });



    });
</script>


</html>