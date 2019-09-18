@extends('layouts.app')
@section('htmlheader_title')
    Editar Clave de Usuario
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

                {!! Form::open(['route' => 'musuariosguardarclave', 'class' => 'form','method' => 'POST',
                'id'=> 'EditarUsuarioClaveForm','files' => true]) !!}
                <div class="panel-heading">
                    <h2 class="text-center titulo-ubicacion" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Editar Clave de Usuario &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></h2>
                </div>
    <div class="panel-body">

        <div class="form-group row">
            <div class="col-sm-4">
                <label class="color-azul">Nombre</label>
                <input readonly disabled  type="text" class="form-control text-center" id="name" name="name"  maxlength="100" placeholder="Ingrese Nombre Usuario"
                    value="{{$usuarios[0]->nombre}}">
                <span  id ="ErrorMensaje-name" class="help-block"></span>
            </div>
            <div class="col-sm-4">
                <label class="color-azul">Usuario</label>
                <input readonly disabled type="text" class="form-control text-center" id="email" name="email"
                       maxlength="8" placeholder="DNI" onkeypress="soloNumeros(event);" value="{{ $usuarios[0]->email }}">
                <span  id ="ErrorMensaje-email" class="help-block"></span>
            </div>
            <div class="col-sm-4">
                <label class="color-azul">Nueva Clave</label>
                <input  type="password" class="form-control text-center" id="password" name="password"
                       maxlength="15" placeholder="Clave" style="font-size: 16px;" value="">
                <span  id ="ErrorMensaje-password" class="help-block"></span>
            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm-4">
                <label class="color-azul">Rol</label>
                <select class="form-control text-center" name="rol_id" id="rol_id">
                    @foreach($roles as $rol)
                        @if($rol->id == $usuarios[0]->rol_id )
                            <option selected value="{{$rol->id}}">{{$rol->descripcion}}</option>
                        @endif

                    @endforeach
                </select>
                <span  id ="ErrorMensaje-rol_id" class="help-block"></span>
            </div>
            <div class="col-sm-4">
                <label class="color-azul">Sexo</label>
                <select class="form-control text-center" name="nSexo" id="nSexo">
                    @if($usuarios[0]->nSexo == 1)
                        <option selected value="1">MASCULINO</option>
                     @else
                        <option selected value="2">FEMENINO</option>
                    @endif

                </select>
                <span  id ="ErrorMensaje-nSexo" class="help-block"></span>
            </div>
            <div class="col-sm-4">
                <label class="color-azul">Estado</label>
                <select class="form-control text-center" name="estados_id" id="estados_id">
                    @foreach($estados as $estado)
                        @if($estado->id == $usuarios[0]->estados_id )
                            <option selected value="{{$estado->id}}">{{$estado->nombre_estado}}</option>
                        @endif

                    @endforeach
                </select>
                <span  id ="ErrorMensaje-estado_id" class="help-block"></span>
            </div>
        </div>
        <div class="form-group">
            <input type="text" style="display:none;" class="form-control" name="id"  value="{{$usuarios[0]->id}}">
            <button type="submit" id = "btnEditarUsuario" class="btnEditarUsuario btn btn-principal btn-primary" >
                <i class="fa fa-map-marker"></i> &nbsp;Editar Clave Usuario
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


    $('#EditarUsuarioClaveForm').on('submit', function (evt) {

        var descripcion_id = $('#name').val().trim();

        if( descripcion_id == null || descripcion_id.length == 0  ) {
            descripcion_id = null;
            $("#ErrorMensaje-name").text('Debe Ingresar un Nombre de Usuario');
            $("#ErrorMensaje-name").show();
            $("#name").focus();
            evt.preventDefault();
            return false;
        }

        var usuario  = $('#email').val().trim();

        if( usuario == null || usuario.length == 0  ) {
            usuario = null;
            $("#ErrorMensaje-email").text('El DNI no puede ser vacio.');
            $("#ErrorMensaje-email").show();
            $("#email").focus();
            evt.preventDefault();
            return false;
        }

        var clave  = $('#password').val().trim();

        if( clave == null || clave.length == 0  ) {
            clave = null;
            $("#ErrorMensaje-password").text('La Clave no puede ser vacía.');
            $("#ErrorMensaje-password").show();
            $("#password").focus();
            evt.preventDefault();
            return false;
        }

    });

    $('#EditarUsuarioClaveForm').on('keypress', function (e) {
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