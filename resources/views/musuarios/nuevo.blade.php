@extends('layouts.app')
@section('htmlheader_title')
    Nuevo Usuario
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

                {!! Form::open(['route' => 'musuariosguardar', 'class' => 'form','method' => 'POST',
                'id'=> 'RegistroUsuariosForm','files' => true]) !!}
                <div class="panel-heading">
                    <h2 class="text-center titulo-ubicacion" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Registar Nuevo Usuario &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></h2>
                </div>
                    <div class="panel-body">

                        <div class="form-group row">
                            <div class="col-sm-8">
                              <label class="color-azul">Nombre</label>
                              <input type="text" class="form-control text-center" id="name" name="name"  maxlength="100" placeholder="Ingrese Nombre Usuario">
                              <span  id ="ErrorMensaje-name" class="help-block"></span>
                            </div>
                            <div class="col-sm-4">
                                <label class="color-azul">Usuario</label>
                                <input type="text" class="form-control text-center" id="usuario" name="usuario"
                                       maxlength="8" placeholder="DNI" onkeypress="soloNumeros(event);">
                                <span  id ="ErrorMensaje-usuario" class="help-block"></span>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label class="color-azul">Rol</label>
                                <select class="form-control text-center" name="rol_id" id="rol_id">
                                    @foreach($roles as $rol)
                                        <option value="{{$rol->id}}">{{$rol->descripcion}}</option>
                                    @endforeach
                                </select>
                                <span  id ="ErrorMensaje-rol_id" class="help-block"></span>
                            </div>
                            <div class="col-sm-4">
                                <label class="color-azul">Sexo</label>
                                <select class="form-control text-center" name="nSexo" id="nSexo">
                                    <option value="1">MASCULINO</option>
                                    <option value="2">FEMENINO</option>
                                </select>
                                <span  id ="ErrorMensaje-nSexo" class="help-block"></span>
                            </div>
                            <div class="col-sm-4">
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
                            <button type="submit" id = "btnRegistrarUsuario" class="btnRegistrarUsuario btn btn-principal btn-primary" >
                            <i class="fa fa-map-marker"></i> &nbsp;Registrar Nuevo Usuario
                            </button>
                        </div>

                    </div>
              {!! Form::close() !!}
     
@endsection
@section('script-fin')
<script>

    function soloNumeros(e){
        var key = window.event ? e.which : e.keyCode;
        if (key < 48 || key > 57) {
            e.preventDefault();
        }
    }
  

	$('#RegistroUsuariosForm').on('submit', function (evt) {

	    var descripcion_id = $('#name').val().trim();

	    if( descripcion_id == null || descripcion_id.length == 0  ) {
	       descripcion_id = null;
	       $("#ErrorMensaje-name").text('Debe Ingresar un Nombre de Usuario');
	         $("#ErrorMensaje-name").show();
	         $("#name").focus();
            evt.preventDefault();
	         return false;
	       }

	    var usuario  = $('#usuario').val().trim();

        if( usuario == null || usuario.length == 0  ) {
            usuario = null;
            $("#ErrorMensaje-usuario").text('El DNI no puede ser vacio.');
            $("#ErrorMensaje-usuario").show();
            $("#usuario").focus();
            evt.preventDefault();
            return false;
        }

	});

  $('#RegistroUsuariosForm').on('keypress', function (e) {
      tecla = (document.all) ? e.keyCode :e.which;
    // si la tecla no es 13 devuelve verdadero,  si es 13 devuelve false y la pulsación no se ejecuta
    return (tecla!=13);
  
  });

	$('#name').on("keypress",function (){
		$("#ErrorMensaje-name").hide();
	})

    $('#usuario').on("keypress",function (){
        $("#ErrorMensaje-usuario").hide();
    })

</script>
@endsection