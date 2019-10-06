@extends('layouts.app')
@section('htmlheader_title')
    Editar Actividades
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

    <img src="/img/construccion.jpg" class="img img-responsive" alt="Sitio en Construccion">
     
@endsection
@section('script-fin')
<script>
	


</script>
@endsection