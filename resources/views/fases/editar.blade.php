@extends('layouts.app')
@section('htmlheader_title')
    Modificar Fase
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


                <div class="panel-heading">
                    <h2 class="text-center titulo-ubicacion" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Editar Fase &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></h2>
                    <h4 class="text-center titulo-ubicacion" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; {{ $fases[0]->id}} &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></h4>

                </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'fasesguardar', 'class' => 'form','method' => 'POST','id'=> 'EditarFaseForm','files' => true]) !!}
                        <input type="hidden" id="id" name="id" value="{{ $fases[0]->id }}">
                        <div class="form-group row">
                            <div class="col-sm-12">
                              <label class="color-azul">Nombre de Pregunta</label>
                              <input type="text" class="form-control text-center" id="descripcion" name="descripcion"  maxlength="100"
                                     placeholder="Descripcion" value="{{$fases[0]->descripcion}}">
                              <span  id ="ErrorMensaje-descripcion" class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label class="color-azul">Estado</label>
                                    <select class="form-control text-center" name="estados_id" id="estados_id">
                                        @foreach($estados as $estado)
                                            @if( $estado->id == $fases[0]->estados_id)
                                                <option selected value="{{$estado->id}}">{{$estado->nombre_estado}}</option>
                                            @else
                                                <option value="{{$estado->id}}">{{$estado->nombre_estado}}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                        <span  id ="ErrorMensaje-estado_id" class="help-block"></span>
                            </div>
                            <div class="col-sm-3" style="">
                                <label class="color-azul">Codigo de Fases</label>
                                  <select class="form-control text-center" name="codigos_fases_id" id="codigos_fases_id">
                                       @foreach($codigosfases as $codigofase)
                                          @if($codigofase->id == $fases[0]->codigos_fases_id)
                                            <option selected value="{{$codigofase->id}}">{{$codigofase->descripcion}}</option>
                                          @else
                                              <option value="{{$codigofase->id}}">{{$codigofase->descripcion}}</option>
                                          @endif
                                      @endforeach
                                        </select>
                                        <span  id ="ErrorMensaje-codigos_fases_id" class="help-block"></span>
                                  </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" style="display:none;" class="form-control" name="user_id"  value="{{Auth::user()->id}}">
                            <input type="text" style="display:none;" class="form-control" name="id"  value="0">
                            <button type="submit" id = "btnEditarFase" class="btnEditarFase btn btn-principal btn-primary" >
                                <i class="fa fa-pencil-square-o"></i> &nbsp;Editar Fase
                            </button>
                        </div>
                        {!! Form::close() !!}
                            <fieldset style="">
                              <legend>Preguntas Asociadas</legend>

                            </fieldset>
                            <div class="form-group row">
                              <div class="col-sm-10 col-sm-offset-1">
                                  <a href="#" class="btn btn-small btn-primary" data-toggle="modal" data-target="#largeModal"
                                    onclick="abrir_ventana_modal('1','<?php echo $fases[0]->id;?>', '1' , '', '1');"
                                    >
                                      <i class="fa fa-plus" aria-hidden="true"></i>&nbsp; ASociar Pregunta a Fase
                                  </a>
                                  <div class="table-responsive" id="lista-preguntas_fase">

                                      <table class="table table-hover" id="tbl-preguntas_fase">
                                          <thead>
                                              <tr>
                                                  <th class="text-center" style="vertical-align:middle;" data-column-id="codigo_pregunta">Codigo</th>
                                                  <th class="text-center" style="vertical-align:middle;" data-column-id="descripcionpregunta">Descripcion</th>
                                                  <th class="text-center" style="vertical-align:middle;" data-column-id="nombre_estado">Estado</th>
                                                  <th class="text-center" style="vertical-align:middle;" data-column-id="commands" data-formatter="commands" data-sortable="false">Acciones</th>
                                              </tr>
                                          </thead>
                                      </table>
                                  </div>
                              </div>  
                            </div>


                    </div>

    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> Nueva Pregunta Fase</h4>
                    <input type="hidden" id="hdd_tipo_opcion" value="0" name= "hdd_tipo_opcion" >
                    <input type="hidden" id="hdd_pregunta_opcion" value="0" name= "hdd_pregunta_opcion" >
                    <input type="hidden" id="hdd_correlativo_opcion" value="0" name= "hdd_correlativo_opcion" >
                </div>
                <div class="modal-body">
                    <h3 class="text-center" id="titulo_fase_pregunta"></h3>
                    <label for="descripcion_opcion">Busqueda de Pregunta</label>
                    <input type="text" class="form form-control text-center " name="txtbusquedapregunta"
                           id="txtbusquedapregunta"
                            placeholder="Escriba Codigo o una Descripcion y Pulse [Enter]."
                                >
                    <div id="div_txtbusquedapregunta" style=""></div>
                    <label for="lbl_codigo_fase_pregunta">Codigo de Pregunta</label>
                    <input type="text" class="form form-control text-center " name="lbl_codigo_fase_pregunta"
                           id="lbl_codigo_fase_pregunta" readonly style="background-color: #eee !important;"
                    >
                    <label for="lbl_descripcion_fase_pregunta">Descripcion de Pregunta</label>
                    <input type="text" class="form form-control text-center " name="lbl_descripcion_fase_pregunta"
                           id="lbl_descripcion_fase_pregunta" readonly style="background-color: #eee !important;"
                    >
                    <label for="estado_id_opcion">Estado</label>
                    <select class="form-control text-center" name="estado_id_opcion" id="estado_id_opcion">
                            <option selected value="1">ACTIVO</option>
                            <option value="2">INACTIVO</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="save_pregunta_opcion();" ><i class="fa fa-save"></i> Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
     
@endsection
@section('script-fin')
<script>

    function save_pregunta_opcion(){

        action_pregunta_opciones($('#hdd_tipo_opcion').val(), $('#hdd_pregunta_opcion').val() , $('#hdd_correlativo_opcion').val() ,
            $('#descripcion_opcion').val() , $('#estado_id_opcion').val());

    }

    function abrir_ventana_modal(ptipo,ppreguntaid , pcorrelativo , pdescripcion , pestado)
    {

        $('#hdd_tipo_opcion').val(ptipo);
        $('#descripcion_opcion').val(pdescripcion);
        $('#estado_id_opcion').val(pestado);
        $('#hdd_pregunta_opcion').val(ppreguntaid);
        $('#hdd_correlativo_opcion').val(pcorrelativo);
        if ( ptipo != 1 ) { $('#largeModal').modal('show') }


    }

    function action_pregunta_opciones(ptipo,ppreguntaid , pcorrelativo , pdescripcion , pestado)
    {

        let data_proceso =  {"tipo" : ptipo ,  "pregunta_id" : ppreguntaid , "opcion" :  pcorrelativo ,
                             "descripcion" : pdescripcion , "estados_id" : pestado}

        $.ajax({
            url: '../../PreguntasOpciones/Mantenimiento',
            data : data_proceso ,
            type: 'POST',
            success: function(respuesta) {
                //alert('amen');
                //recargar_grilla();
                $('#tbl-preguntas_opciones').bootgrid('reload');
                $('#largeModal').modal('hide');
                },
            error: function() {
                console.log("No se ha podido obtener la información");
            }
        });

    }

    function recargar_grilla() {

        var gridtable = $('#tbl-preguntas_fase').bootgrid({
            ajax:true,
            labels: {
                noResults: "No Existen Resultados",
                loading: "Cargando . . . ",
                all: "Todos",
                refresh: "Cargar",
                search:"Buscar"
            },
            rowSelected:true,
            post:function(){
                return {
                    id: "b0df282a-0d67-40e5-8558-c9e93b7befed"
                };
            },
            url:"../../FasesPreguntas/Listar/"+'<?php echo $fases[0]->id;?>',
            formatters: {
                "commands": function(column, row)
                {

                    return  "<a  class=\"btn \" onclick=\" abrir_ventana_modal(\'2\',\'"  + row.codigo_pregunta + "\',\'"  + row.codigos_fase_id  + "\',\'"  + row.descripcion  + "\1',\'"  + row.estados_id  + "\');\" " +
                        "><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>&nbsp; Editar</a>";
                    // <a  class=\"btn \" href=\"../Ubicaciones/Imprimir/" +   row.id + "\"><i class=\"fa fa-print\" aria-hidden=\"true\"></i>&nbsp; Imprimir</a>";
                }
            }
        });

    }


    $(document).ready(function()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        recargar_grilla();


        $('#tipo_respuesta_id').change(function(){

            if($('#tipo_respuesta_id').val() == 3){
                $('#lst_opcion_maestro').css('display','block');
            } else
            {
                $('#lst_opcion_maestro').css('display','none');
            }


        });



        $('#EditarPreguntaForm').on('submit', function (evt) {

            var descripcion_id = $('#descripcion').val().trim();

            if( descripcion_id == null || descripcion_id.length == 0  ) {
                descripcion_id = null;
                $("#ErrorMensaje-descripcion").text('Debe Ingresar una Descripcion');
                $("#ErrorMensaje-descripcion").show();
                $("#descripcion").focus();
                evt.preventDefault();
                return false;
            }

            $('#id').val(1);
        });

        $('#descripcion').on("keypress",function (){
            $("#ErrorMensaje-descripcion").hide();
        })


        $('#txtbusquedapregunta').on('keypress', function(e) {
            if (e.which == 13) {

                let string_cdatospreguntas = '<select class="custom-select" id="lst_txtbusquedapregunta">';

                $('#div_txtbusquedapregunta').html('');
                $('#div_txtbusquedapregunta').css('display','block');

                $('#div_txtbusquedapregunta').html('');

                let datajson  = {
                    current : 1 ,
                    rowCount: 20 ,
                    searchPhrase : $('#txtbusquedapregunta').val()
                }

                $.ajax({
                    url: '../../Preguntas/Listar',
                    data: datajson,
                    method: 'POST',
                    async: false
                }).done(function (respuesta) {
                    //console.log(respuesta);
                    console.log( JSON.parse(respuesta));
                    console.log(JSON.stringify(respuesta));
                    if (respuesta.total > 0) {

                        $.each(respuesta.rows, function (index, val) {
                            let codigopregunta = respuesta.rows[index].preguntas_id;
                            let descripcionpregunta = respuesta.rows[index].descripcion;

                            string_cdatospreguntas = string_cdatospreguntas + '<option value="' + codigopregunta + '" >' + descripcionpregunta + '</option>';

                        });

                        string_cdatospreguntas = string_cdatospreguntas + '</select>';

                        $('#div_txtbusquedapregunta').html(string_cdatospreguntas);

                        let lst_datostxtbusquedapregunta = $('#lst_txtbusquedapregunta');
                        lst_datostxtbusquedapregunta.attr('size', '10');

                        lst_datostxtbusquedapregunta.click(function () {

                            let lst_val = lst_datostxtbusquedapregunta.val();
                            let lst_this = $('#lst_txtbusquedapregunta option:selected');
                            let txtdatostxtbusquedapregunta = lst_this.text();

                            $('#lbl_codigo_fase_pregunta').val(txtdatostxtbusquedapregunta);
                            $('#lbl_descripcion_fase_pregunta').val(lst_val);
                            $('#div_txtbusquedapregunta').html('');

                        });
                    } else{

                        string_cdatospreguntas = string_cdatospreguntas + '<option value="_none_">Sin Concidencias</option>';
                        string_cdatospreguntas = string_cdatospreguntas + '</select>';

                        $('#div_txtbusquedapregunta').html(string_cdatospreguntas);
                        $('#lst_txtbusquedapregunta').attr('size', '2');

                        var lst_datostxtbusquedapregunta = $('#lst_txtbusquedapregunta');
                        lst_datostxtbusquedapregunta.attr('size', '10');

                        lst_datostxtbusquedapregunta.click(function () {

                            $('#div_txtbusquedapregunta').html('');
                        });
                    }
                }).fail(function (xhr) {
                    console.log("Ocurrio un Error.")
                });
            }
        });


    });



</script>
@endsection