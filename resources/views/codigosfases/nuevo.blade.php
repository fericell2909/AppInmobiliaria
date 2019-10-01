@extends('layouts.app')
@section('htmlheader_title')
    Nuevo Codigos de Fases
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

                {!! Form::open(['route' => 'codigosfasesguardar', 'class' => 'form','method' => 'POST','id'=> 'RegistroCodigoFaseForm','files' => true]) !!}
                <div class="panel-heading">
                    <h2 class="text-center titulo-ubicacion" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Registar Nuevo Codigo de Fase&nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></h2>
                </div>
                    <div class="panel-body">

                        <div class="form-group row">
                            <div class="col-sm-8">
                              <label class="color-azul">Descripcion</label>
                              <input type="text" class="form-control text-center" id="descripcion" name="descripcion"  maxlength="50" placeholder="Descripcion">
                              <span  id ="ErrorMensaje-descripcion" class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-8">
                                <label class="color-azul">Estado</label>
                                    <select class="form-control text-center" name="estados_id" id="estados_id">
                                        @foreach($estados as $estado)
                                            <option value="{{$estado->id}}">{{$estado->nombre_estado}}</option>
                                        @endforeach
                                        </select>
                                        <span  id ="ErrorMensaje-estado_id" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" style="display:none;" class="form-control" name="user_id"  value="{{Auth::user()->id}}">
                            <input type="text" style="display:none;" class="form-control" name="id"  value="0">
                            <button type="submit" id = "btnRegistrarCodigoFase" class="btnRegistrarCodigoFase btn btn-principal btn-primary" >
                            <i class="fa fa-plus"></i> &nbsp;Registrar Codigo de Fase
                            </button>
                        </div>

                    </div>
              {!! Form::close() !!}
     
@endsection
@section('script-fin')
<script>
	
  

	$('#RegistroCodigoFaseForm').on('submit', function (evt) {

	    var descripcion_id = $('#descripcion').val().trim();

	    if( descripcion_id == null || descripcion_id.length == 0  ) {
	       descripcion_id = null;
	       $("#ErrorMensaje-descripcion").text('Debe Ingresar una Descripcion');
	         $("#ErrorMensaje-descripcion").show();
	         $("#descripcion").focus();
	         return false;
	       }


	});

  $('#RegistroCodigoFaseForm').on('keypress', function (e) {
      tecla = (document.all) ? e.keyCode :e.which;
    // si la tecla no es 13 devuelve verdadero,  si es 13 devuelve false y la pulsación no se ejecuta
    return (tecla!=13);
  
  });

	$('#descripcion').on("keypress",function (){
		$("#ErrorMensaje-descripcion").hide();
	})


</script>
@endsection