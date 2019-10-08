@extends('layouts.app')
@section('htmlheader_title')
    Nueva Pregunta
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

                {!! Form::open(['route' => 'preguntasguardar', 'class' => 'form','method' => 'POST','id'=> 'RegistroPreguntForm','files' => true]) !!}
                <div class="panel-heading">
                    <h2 class="text-center titulo-ubicacion" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Registro de Preguntas &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></h2>
                </div>
                    <div class="panel-body">

                        <div class="form-group row">
                            <div class="col-sm-12">
                              <label class="color-azul">Nombre de Pregunta</label>
                              <input type="text" class="form-control text-center" id="descripcion" name="descripcion"
                                     maxlength="500" placeholder="Descripcion">
                              <span  id ="ErrorMensaje-descripcion" class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label class="color-azul">Estado</label>
                                    <select class="form-control text-center" name="estados_id" id="estados_id">
                                        @foreach($estados as $estado)
                                            <option value="{{$estado->id}}">{{$estado->nombre_estado}}</option>
                                        @endforeach
                                        </select>
                                        <span  id ="ErrorMensaje-estado_id" class="help-block"></span>
                            </div>
                            <div class="col-sm-3">
                                <label class="color-azul">Opcion Multiple</label>
                                  <select class="form-control text-center" name="bOpcionMultiples" id="bOpcionMultiples">
                                            <option value="0">NO</option>
                                            <option value="1">SI</option>
                                  </select>
                                        <span  id ="ErrorMensaje-bopcion_multiple" class="help-block"></span>
                            </div>
                            <div class="col-sm-3">
                                <label class="color-azul">Incluye Otros</label>
                                <select class="form-control text-center" name="bIncluyeotros" id="bIncluyeotros">
                                    <option value="0">NO</option>
                                    <option value="1">SI</option>
                                </select>
                                <span  id ="ErrorMensaje-bIncluyeotros" class="help-block"></span>
                            </div>
                            <div class="col-sm-3">
                                <label class="color-azul">Tipo de Pregunta</label>
                                  <select class="form-control text-center" name="tipo_respuesta_id" id="tipo_respuesta_id">
                                       @foreach($tipopreguntas as $tipopregunta)
                                            <option value="{{$tipopregunta->id}}">{{$tipopregunta->descripcion}}</option>
                                        @endforeach
                                        </select>
                                        <span  id ="ErrorMensaje-tipo_respuesta_id" class="help-block"></span>          
                                  </select>
                            </div>
                            <div class="col-sm-3" id="lst_opcion_maestro" style="display:none;">
                                <label class="color-azul">Maestro</label>
                                <select class="form-control text-center" name="opcion_maestro" id="opcion_maestro">
                                    @foreach($opcionmaestros as $opcionmaestro)
                                        <option value="{{$opcionmaestro->id}}">{{$opcionmaestro->descripcion}}</option>
                                    @endforeach
                                </select>
                                <span  id ="ErrorMensaje-opcion_maestro" class="help-block"></span>
                                </select>
                            </div>
                        </div>
                            
                            <fieldset style="display:none;">
                              <legend>Opciones de Respuesta a Pregunta</legend>

                            </fieldset>

                            <!--<div class="form-group row">
                              <div class="col-sm-8 col-sm-offset-2">
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
                            </div>-->
        

                        <div class="form-group">
                            <input type="text" style="display:none;" class="form-control" name="user_id"  value="{{Auth::user()->id}}">
                            <input type="text" style="display:none;" class="form-control" name="pregunta_id"  value="">
                            <button type="submit" id = "btnRegistrarPregunta" class="btnRegistrarPregunta btn btn-principal btn-primary" >
                            <i class="fa fa-question-circle"></i> &nbsp;Registrar Pregunta
                            </button>
                        </div>

                    </div>
              {!! Form::close() !!}
     
@endsection
@section('script-fin')
<script>

    $(document).ready(function()
    {

        $('#tipo_respuesta_id').change(function(){

            if($('#tipo_respuesta_id').val() == 3){
                $('#lst_opcion_maestro').css('display','block');
            } else
            {
                $('#lst_opcion_maestro').css('display','none');
            }


        });



        $('#RegistroPreguntForm').on('submit', function (evt) {

            var descripcion_id = $('#descripcion').val().trim();

            if( descripcion_id == null || descripcion_id.length == 0  ) {
                descripcion_id = null;
                $("#ErrorMensaje-descripcion").text('Debe Ingresar una Descripcion');
                $("#ErrorMensaje-descripcion").show();
                $("#descripcion").focus();
                evt.preventDefault();
                return false;
            }


        });

        $('#descripcion').on("keypress",function (){
            $("#ErrorMensaje-descripcion").hide();
        })
    });






</script>
@endsection