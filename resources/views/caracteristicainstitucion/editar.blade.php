@extends('layouts.app')
@section('htmlheader_title')
    Editar Nivel de Institucion
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

                {!! Form::open(['route' => 'nivelinstitucionguardar', 'class' => 'form','method' => 'POST','id'=> 'EditarNivelInstitucionForm','files' => true]) !!}
                <div class="panel-heading">
                    <h2 class="text-center titulo-ubicacion" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Editar Nivel de Institucion &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></h2>
                </div>
                    <div class="panel-body">

                        <div class="form-group row">
                            <div class="col-sm-8">
                              <label class="color-azul">Descripcion</label>
                              <input type="text" class="form-control text-center" id="descripcion" name="descripcion"  required maxlength="100" placeholder="Descripcion" value="{{ $instituciones[0]->descripcion }}">
                              <span  id ="ErrorMensaje-descripcion" class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-8">
                                <label class="color-azul">Estado</label>
                                    <select class="form-control text-center" name="estados_id" id="estados_id">
                                        @foreach($estados as $estado)
											@if( $instituciones[0]->estados_id == $estado->id ) 
                                            	<option selected value="{{$estado->id}}">{{$estado->nombre_estado}}</option>
                                        	@else
												<option value="{{$estado->id}}">{{$estado->nombre_estado}}</option>	
                                        	@endif
                                        @endforeach
                                        </select>
                                        <span  id ="ErrorMensaje-estado_id" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" style="display:none;" class="form-control" name="user_id"  value="{{Auth::user()->id}}">
                            <input type="text" style="display:none;" class="form-control" name="id"  value="{{$instituciones[0]->id}}">
                            <button type="submit" id = "btnEditarNivelInstitucion" class="btnRegistrarNivelInstitucion btn btn-principal btn-primary" >
                            <i class="fa fa-map-marker"></i> &nbsp;Editar Nivel Institucion       
                            </button>
                        </div>

                    </div>
              {!! Form::close() !!}
     
@endsection
@section('script-fin')
<script>
	
	$('#btnEditarNivelInstitucion').on('click', function (evt) {

	    var descripcion_id = $('#descripcion').val().trim();

	    if( descripcion_id == null || descripcion_id.length == 0  ) {
	       descripcion_id = null;
	       $("#ErrorMensaje-descripcion").text('Debe Ingresar una Descripcion');
	         $("#ErrorMensaje-descripcion").show();
	         $("#descripcion").focus();
	         return false;
	       }


	      $('#EditarNivelInstitucionForm').submit(); 
	
	});

	$('#descripcion').on("keypress",function (){
		$("#ErrorMensaje-descripcion").hide();
	})


</script>
@endsection