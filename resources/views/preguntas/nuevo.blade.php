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
                              <input type="text" class="form-control text-center" id="descripcion" name="descripcion"  required maxlength="100" placeholder="Descripcion">
                              <span  id ="ErrorMensaje-descripcion" class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label class="color-azul">Estado</label>
                                    <select class="form-control text-center" name="estados_id" id="estados_id">
                                        @foreach($estados as $estado)
                                            <option value="{{$estado->id}}">{{$estado->nombre_estado}}</option>
                                        @endforeach
                                        </select>
                                        <span  id ="ErrorMensaje-estado_id" class="help-block"></span>
                            </div>
                            <div class="col-sm-4">
                                <label class="color-azul">Opcion Multiple</label>
                                  <select class="form-control text-center" name="bopcion_multiple" id="bopcion_multiple">
                                            <option value="0">NO</option>
                                            <option value="0">SI</option>
                                  </select>
                                        <span  id ="ErrorMensaje-bopcion_multiple" class="help-block"></span>
                            </div>
                            <div class="col-sm-4">
                                <label class="color-azul">Tipo de Pregunta</label>
                                  <select class="form-control text-center" name="tipo_respuesta_id" id="tipo_respuesta_id">
                                       @foreach($tipopreguntas as $tipopregunta)
                                            <option value="{{$tipopregunta->id}}">{{$tipopregunta->descripcion}}</option>
                                        @endforeach
                                        </select>
                                        <span  id ="ErrorMensaje-tipo_respuesta_id" class="help-block"></span>          
                                  </select>
                            </div>
                        </div>
                            
                            <fieldset>
                              <legend>Opciones de Respuesta a Pregunta</legend>

                            </fieldset>

                            <div class="form-group row">
                                  <div class="col-sm-4">
                                    <label class="color-azul">Maestro</label>
                                      <select class="form-control text-center" name="opcion_seleccionable" id="opcion_seleccionable">
                                         @foreach($maestros as $maestro)
                                            <option value="{{$maestro->id}}">{{$maestro->descripcion}}</option>
                                        @endforeach       
                                      </select>
                                        <span  id ="ErrorMensaje-bopcion_multiple" class="help-block"></span>
                                  </div>
                            </div>

                            <div class="form-group row">
                              <div class="col-sm-8 col-sm-offset-2">
                                  
                                  
                                 <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                        <th style="text-align:center;">Acciones</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                  </table>  
                                
                              </div>  
                            </div>
        

                        <div class="form-group">
                            <input type="text" style="display:none;" class="form-control" name="user_id"  value="{{Auth::user()->id}}">
                            <input type="text" style="display:none;" class="form-control" name="id"  value="0">
                            <button type="submit" id = "btnRegistrarPregunta" class="btnRegistrarPregunta btn btn-principal btn-primary" >
                            <i class="fa fa-pencil"></i> &nbsp;Registrar Pregunta       
                            </button>
                        </div>

                    </div>
              {!! Form::close() !!}
     
@endsection
@section('script-fin')
<script>
	
	$('#btnRegistrarPregunta').on('click', function (evt) {

	    var descripcion_id = $('#descripcion').val().trim();

	    if( descripcion_id == null || descripcion_id.length == 0  ) {
	       descripcion_id = null;
	       $("#ErrorMensaje-descripcion").text('Debe Ingresar una Descripcion');
	         $("#ErrorMensaje-descripcion").show();
	         $("#descripcion").focus();
	         return false;
	       }


	      $('#RegistroPreguntForm').submit(); 
	
	});

	$('#descripcion').on("keypress",function (){
		$("#ErrorMensaje-descripcion").hide();
	})


</script>
@endsection