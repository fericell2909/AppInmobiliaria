@extends('layouts.app')
@section('htmlheader_title')
    Modificar Pregunta
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
                    <h2 class="text-center titulo-ubicacion" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Editar Preguntas &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></h2>
                    <h4 class="text-center titulo-ubicacion" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; {{ $preguntas[0]->preguntas_id}} &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></h4>

                </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'preguntasguardar', 'class' => 'form','method' => 'POST','id'=> 'EditarPreguntaForm','files' => true]) !!}
                        <input type="hidden" id="id" name="id" value="1">
                        <input type="hidden" id="pregunta_id" name="pregunta_id" value="{{ $preguntas[0]->preguntas_id }}">
                        <div class="form-group row">
                            <div class="col-sm-12">
                              <label class="color-azul">Nombre de Pregunta</label>
                              <input type="text" class="form-control text-center" id="descripcion" name="descripcion"  maxlength="100"
                                     placeholder="Descripcion" value="{{$preguntas[0]->descripcion}}">
                              <span  id ="ErrorMensaje-descripcion" class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label class="color-azul">Estado</label>
                                    <select class="form-control text-center" name="estados_id" id="estados_id">
                                        @foreach($estados as $estado)
                                            @if( $estado->id == $preguntas[0]->estados_id)
                                                <option selected value="{{$estado->id}}">{{$estado->nombre_estado}}</option>
                                            @else
                                                <option value="{{$estado->id}}">{{$estado->nombre_estado}}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                        <span  id ="ErrorMensaje-estado_id" class="help-block"></span>
                            </div>
                            <div class="col-sm-3">
                                <label class="color-azul">Opcion Multiple</label>
                                  <select class="form-control text-center" name="bOpcionMultiples" id="bOpcionMultiples">
                                      @if( $preguntas[0]->bOpcionMultiples ==  1 )
                                          <option value="0">NO</option>
                                          <option selected value="1">SI</option>
                                      @else
                                          <option selected value="0">NO</option>
                                          <option value="0">SI</option>
                                      @endif
                                  </select>
                                        <span  id ="ErrorMensaje-bOpcionMultiples" class="help-block"></span>
                            </div>
                            <div class="col-sm-3">
                                <label class="color-azul">Incluye Otros</label>
                                <select class="form-control text-center" name="bIncluyeotros" id="bIncluyeotros">
                                    @if( $preguntas[0]->bIncluyeotros ==  1 )
                                        <option value="0">NO</option>
                                        <option  selected value="1">SI</option>
                                    @else
                                        <option selected value="0">NO</option>
                                        <option value="1">SI</option>
                                    @endif
                                </select>
                                <span  id ="ErrorMensaje-bIncluyeotros" class="help-block"></span>
                            </div>
                            <div class="col-sm-3" style="display:none;">
                                <label class="color-azul">Tipo de Pregunta</label>
                                  <select class="form-control text-center" name="tipo_respuesta_id" id="tipo_respuesta_id">
                                       @foreach($tipopreguntas as $tipopregunta)
                                          @if($tipopregunta->id == $preguntas[0]->tipo_respuesta_id)
                                            <option selected value="{{$tipopregunta->id}}">{{$tipopregunta->descripcion}}</option>
                                          @else
                                              <option value="{{$tipopregunta->id}}">{{$tipopregunta->descripcion}}</option>
                                          @endif
                                      @endforeach
                                        </select>
                                        <span  id ="ErrorMensaje-tipo_respuesta_id" class="help-block"></span>          
                                  </select>
                            </div>
                            <div class="col-sm-3" id="lst_opcion_maestro" style="display:none;">
                                <label class="color-azul">Maestro</label>
                                <select class="form-control text-center" name="opcion_maestro" id="opcion_maestro">
                                    @foreach($opcionmaestros as $opcionmaestro)
                                        @if($opcionmaestro->id == $preguntas[0]->opcion_maestro )
                                            <option selected value="{{$opcionmaestro->id}}">{{$opcionmaestro->descripcion}}</option>
                                        @else
                                            <option value="{{$opcionmaestro->id}}">{{$opcionmaestro->descripcion}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span  id ="ErrorMensaje-opcion_maestro" class="help-block"></span>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" style="display:none;" class="form-control" name="user_id"  value="{{Auth::user()->id}}">
                            <input type="text" style="display:none;" class="form-control" name="id"  value="0">
                            <button type="submit" id = "btnEditarPregunta" class="btnEditarPregunta btn btn-principal btn-primary" >
                                <i class="fa fa-pencil-square-o"></i> &nbsp;Editar Pregunta
                            </button>
                        </div>
                        {!! Form::close() !!}
                            <fieldset style="">
                              <legend>Opciones de Respuesta a Pregunta</legend>

                            </fieldset>
                            <div class="form-group row">
                              <div class="col-sm-10 col-sm-offset-1">
                                  <a href="#" class="btn btn-small btn-primary" data-toggle="modal" data-target="#largeModal"
                                    onclick="abrir_ventana_modal('1','<?php echo $preguntas[0]->preguntas_id;?>', '1' , '', '1');"
                                    >
                                      <i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Nueva Opcion
                                  </a>
                                  <div class="table-responsive" id="lista-preguntas_opciones">

                                      <table class="table table-hover" id="tbl-preguntas_opciones">
                                          <thead>
                                              <tr>
                                                  <th class="text-center" style="vertical-align:middle;" data-column-id="descripcion">Descripcion</th>
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
                    <h4 class="modal-title" id="myModalLabel">Pregunta Opcion</h4>
                    <input type="hidden" id="hdd_tipo_opcion" value="0" name= "hdd_tipo_opcion" >
                    <input type="hidden" id="hdd_pregunta_opcion" value="0" name= "hdd_pregunta_opcion" >
                    <input type="hidden" id="hdd_correlativo_opcion" value="0" name= "hdd_correlativo_opcion" >
                </div>
                <div class="modal-body">
                    <h3 class="text-center" id="titulo_pregunta_opcion"></h3>
                    <label for="descripcion_opcion">Descripcion</label>
                    <input type="text" class="form form-control text-center " name="descripcion_opcion" id="descripcion_opcion" >
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

        var gridtable= $('#tbl-preguntas_opciones').bootgrid({
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
            url:"../../PreguntasOpciones/Listar/"+'<?php echo $preguntas[0]->preguntas_id;?>',
            formatters: {
                "commands": function(column, row)
                {

                    return  "<a  class=\"btn \" onclick=\" abrir_ventana_modal(\'2\',\'"  + row.preguntas_id + "\',\'"  + row.correlativo  + "\',\'"  + row.descripcion  + "\',\'"  + row.estados_id  + "\');\" " +
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




    });



</script>
@endsection