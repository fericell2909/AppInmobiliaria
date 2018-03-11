@extends('layouts.app')
@section('htmlheader_title')
Bienvenido
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    
    <h1 class="text-center text-primary">Bienvenido</h1>
    <div class="row container text-center"> 
                <div class="col-md-4">
                    <a href="{{route("ubicaciones")}}">
                        <div class="contenedor-reporte">
                            <i class="fa fa-street-view fa-5x"></i>
                            <h3><small>Registro de Ubicaciones</small></h3>
                        </div>
                    </a>    
                </div>
                <div class="col-md-4">
                    <a href="{{route("UbicacionesListar")}}">
                        <div class="contenedor-reporte">
                            <i class="fa fa-list fa-5x"></i>
                            <h3><small>Listado de Ubicaciones</small></h3>
                        </div>
                    </a>
                </div>
    </div>

    <section class="content container-fluid">

      @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
      @endif

      
    </section>


 

@endsection
