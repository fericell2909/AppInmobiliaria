@extends('layouts.app')
@section('htmlheader_title')
    Nueva Fase
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

                {!! Form::open(['route' => 'fasesguardar', 'class' => 'form','method' => 'POST','id'=> 'RegistroFaseForm','files' => true]) !!}
                <div class="panel-heading">
                    <h2 class="text-center titulo-ubicacion" style="font-weight:bold;"><i class="fa fa-columns" aria-hidden="true"></i>&nbsp; Registro de Fases &nbsp;<i class="fa fa-columns" aria-hidden="true"></i></h2>
                </div>
                    <div class="panel-body">

                        <div class="form-group row">
                            <div class="col-sm-12">
                              <label class="color-azul">Nombre de Fase</label>
                              <input type="text" class="form-control text-center" id="descripcion" name="descripcion"
                                     maxlength="100" placeholder="Descripcion">
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
                                <label class="color-azul">Codigo de Fase</label>
                                  <select class="form-control text-center" name="codigos_fase_id" id="codigos_fase_id">
                                       @foreach($codigosfases as $codigofase)
                                            <option value="{{$codigofase->id}}">{{$codigofase->descripcion}}</option>
                                        @endforeach
                                        </select>
                                        <span  id ="ErrorMensaje-tipo_respuesta_id" class="help-block"></span>          
                                  </select>
                            </div>
                        </div>

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
                            <input type="text" style="display:none;" class="form-control" name="id"  value="0">
                            <button type="submit" id = "btnRegistrarFase" class="btnRegistrarFase btn btn-principal btn-primary" >
                            <i class="fa fa-columns"></i> &nbsp;Registrar Fase
                            </button>
                        </div>
                    </div>
              {!! Form::close() !!}
@endsection
@section('script-fin')
<script>

    $(document).ready(function()
    {


        $('#RegistroFaseForm').on('submit', function (evt) {

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