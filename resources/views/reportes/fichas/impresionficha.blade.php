<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ficha de Encuesta</title>
<body>
<br>
<div style="text-align:center;">
    <table cellspacing="0" style="width: 100%;text-align: center;">
        <tr>
            <td style="width:10%;color:#ffffff;background-color: #ffffff;">
                demooooddddddd
            </td>
            <td style="width: 20%; color: #34495e;font-size:12px;text-align:center">
                <img src="http://desastres.com/img/escudo.png" alt="Escudo" style="width:35px; height:35px;" />
            </td>
            <td style="width : 50px; background-color: #EF0000; color: #ffffff;font-size:12px;text-align:center;
                        vertical-align: middle;">
                PERU
            </td>
            <td style="width : 100px;  background-color: #3C4953; color: #ffffff;font-size:12px;text-align:center;
                        vertical-align: middle;">
                Ministerio de Educacion
            </td>

            <td style="width : 100px;  background-color: #91A3AC; color: #ffffff;font-size:12px;text-align:center;
                        vertical-align: middle;">
                Secretaria General
            </td>

            <td style="width : 120px;  background-color: #C2D1D8; color: #ffffff;font-size:12px;text-align:left;
                        vertical-align: middle;padding:5px;">
                Oficina de Defensa Nacional y de Gestion del Riesgo de Desastres
            </td>
        </tr>
    </table>
</div>

<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
    <tr>
        <th style="background-color:#ffffff; color:white;" colspan="3"></th>
    </tr>
</table>
<div style="text-align:center;">
    <table cellspacing="0">
        <tr>
            <th style="width:100%; color: #000000; text-align:center;">{{$cabeceras[0]->titulo}}</th>
        </tr>
    </table>
</div>

<br>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #C00000;">
    <tr>
        <th style="background-color:#8B0000; color:white;" colspan="3">I. INFORMACION GENERAL</th>
    </tr>
</table>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
</table>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
    <tr>
        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
        border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > Nombre de la Institucion Educativa</th>
        <th style="background-color: #ffffff; color:#58555A;width: 75%;padding:2px;
                border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->nombre_local}}</th>
    </tr>
</table>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
</table>

<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
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
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
</table>

<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
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
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
</table>

<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
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
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
</table>

<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
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
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
</table>

<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
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
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
</table>



<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
</table>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #C00000;">
    <tr>
        <th style="background-color:#8B0000; color:white;" colspan="3">II. DATOS DEL DIRECTOR</th>
    </tr>
</table>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
</table>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
    <tr>
        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
        border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > Apellidos y Nombres</th>
        <th style="background-color: #ffffff; color:#58555A;width: 75%;padding:2px;
                border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->director_contacto_nombre_apellidos}}</th>
    </tr>
</table>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
</table>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
    <tr>
        <th style="background-color: #58555A; color:#ffffff;width: 25%;padding:2px;
        border-top: 1px solid #58555A; border-left: 1px solid #58555A;border-bottom:1px solid #58555A;" > Correo Electronico</th>
        <th style="background-color: #ffffff; color:#58555A;width: 75%;padding:2px;
                border-top: 1px solid #58555A; border-right: 1px solid #58555A;border-bottom:1px solid #58555A;" > {{$cabeceras[0]->director_contacto_email}}</th>
    </tr>
</table>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
</table>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
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
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
</table>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #8B0000;">
    <tr>
        <th style="background-color:#8B0000; color:white;" colspan="3">III. DATOS DE LA FICHA</th>
    </tr>
</table>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
</table>
@foreach($productos as $producto)
    <div class="tab-pane" id="captain_producto_id_{{ $producto->id  }}">
        @foreach($actividades as $actividad)
            @if( $producto->id == $actividad->codigoproducto )
                <div class="row">
                    <div class="accordion" id="accordionExample_act_{{ $actividad->codigoactividad  }}">
                        <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #C6C5FE;">
                            <tr>
                                <th style="background-color:#C6C5FE; color:white;" colspan="3">{{$actividad->descripcionactividad}}</th>
                            </tr>
                        </table>

                            <div id="collapseOne_act_{{ $actividad->codigoactividad  }}" class="collapse <?php if($actividad->codigoactividad == 1) { echo ""; } else { echo "false";} ?>" aria-labelledby="headingOne_act_{{ $actividad->codigoactividad  }}" data-parent="#accordionExample_act_{{ $actividad->codigoactividad  }}">

                                @foreach($fases as $fase)
                                    @if( $producto->id == $fase->codigoproducto and $fase->codigoactividad == $actividad->codigoactividad )
                                        <div class="row" style="margin-bottom: 5px;">
                                            <div class="col-sm-12">
                                                <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #D2CCDE;">
                                                    <tr>
                                                        <th style="background-color:#D2CCDE; color:white;" colspan="3">{{$fase->descripcion}}</th>
                                                    </tr>
                                                </table>
                                                @foreach($preguntas as $pregunta)
                                                    @if( $producto->id == $pregunta->codigoproducto and $pregunta->codigoactividad == $actividad->codigoactividad
                                                       and $pregunta->codigofase == $fase->codigofase)


                                                        <table cellspacing="0" style="width: 100%; text-align: left; font-size: 8px;border:1px solid #ffffff;">
                                                            <tr>
                                                                <th style="background-color:#ffffff; color:#000000;" colspan="3">{{ $pregunta->codigopregunta . ' - ' .  $pregunta->descripcion}}</th>
                                                            </tr>
                                                        </table>
                                                        @foreach($opciones as $opcion)
                                                            @if($pregunta->codigopregunta == $opcion->codigopregunta  and
                                                                $pregunta->bingresacantidades == 0 and  $pregunta->bopcionmultiple == 0 )
                                                                <label class="radio-inline" style="margin-left:5px; font-size:8px;">
                                                                    <input type="radio"
                                                                           name="opt_producto_{{$producto->id}}_actividad_{{$actividad->codigoactividad}}_fase_{{$fase->codigofase}}_pregunta_{{$opcion->codigopregunta}}"
                                                                           value="{{ $opcion->codigoopcion }}"

                                                                           @foreach($detalles as $detalle)
                                                                               @if( $detalle->llave == 'opt_producto_'.$producto->id.'_actividad_'.$actividad->codigoactividad.'_fase_'.$fase->codigofase.'_pregunta_'.$opcion->codigopregunta )
                                                                                    @if( $detalle->valor == $opcion->codigoopcion)
                                                                                        checked
                                                                                    @endif
                                                                               @endif
                                                                           @endforeach
                                                                           style="font-size:8px;"><span>
                                                                            {{  $opcion->descripcion}}
                                                                    </span>

                                                                </label>


                                                            @endif
                                                            @if($pregunta->codigopregunta == $opcion->codigopregunta  and
                                                                        $pregunta->bingresacantidades == 0 and  $pregunta->bopcionmultiple == 1 )
                                                                <label class="radio-inline" style="margin-left:5px;font-size:8px;">
                                                                    <input type="checkbox"
                                                                           name="opt_producto_{{$producto->id}}_actividad_{{$actividad->codigoactividad}}_fase_{{$fase->codigofase}}_pregunta_{{$opcion->codigopregunta}}[]"
                                                                           value="{{ $opcion->codigoopcion }}"
                                                                           @foreach($detalles as $detalle)
                                                                               @if( $detalle->llave == 'opt_producto_'.$producto->id.'_actividad_'.$actividad->codigoactividad.'_fase_'.$fase->codigofase.'_pregunta_'.$opcion->codigopregunta )
                                                                                    @if( strpos(''.$detalle->valor, ''.$opcion->codigoopcion ) === false )
                                                                                        nochecked
                                                                                    @else
                                                                                        checked
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                            >{{$opcion->descripcion}}
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

                                                                                <label for="nAlmMascSecundaria" style="font-size: 8px;">
                                                                                    {{$opcion->descripcion}}</label>
                                                                                <label for="" style="font-size: 8px;">

                                                                                    @foreach($detalles as $detalle)
                                                                                        @if( $detalle->llave == 'opt_producto_'.$producto->id.'_actividad_'.$actividad->codigoactividad.'_fase_'.$fase->codigofase.'_pregunta_'.$opcion->codigopregunta )
                                                                                            <?php
                                                                                                $array = explode( ',' , $detalle->valor);
                                                                                                echo $array[$opcion->codigoopcion-1]
                                                                                            ?>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </label>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        @if($pregunta->bincluyeotros == 1 and
                                                                $pregunta->bingresacantidades == 0)

                                                            <label for="" style="font-size: 8px;">
                                                                @foreach($detalles as $detalle)
                                                                    @if( $detalle->preguntas_id == $pregunta->codigopregunta )
							                                            {{$detalle->otros}}
                                                                    @endif
                                                                @endforeach
                                                            </label>
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
</body>
