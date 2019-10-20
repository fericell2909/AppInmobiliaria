@extends('layouts.app')
@section('htmlheader_title')
Consulta de Fichas
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
<div class="contenedor-list">
	<div class="panel-heading">
		<h2 class="text-center titulo-ubicacion" style="font-weight:bold;"><i class="fa fa-columns" aria-hidden="true"></i>&nbsp; Consulta de Fichas &nbsp;<i class="fa fa-columns" aria-hidden="true"></i></h2>
	</div>
    <div class="row">
        <div class="col-xs-12 col-lg-3">

        </div>
    </div>

	<div class="panel-body">
        <label for="lbl_usuario_busqueda">Usuario</label>

        <select name="usuario_consulta" id="usuario_consulta" class="form form-control">
            @foreach($usuarios as $usuario)
                <option value="{{$usuario->email}}">{{$usuario->name}}</option>
            @endforeach
        </select>
		<div class="table-responsive" id="lista-fases">
			<table class="table table-hover" id="tbl-fichas_usuarios">
				<thead>
				<tr>
                    <th class="text-center" style="vertical-align:middle;" data-column-id="usuario">Usuario</th>
					<th class="text-center" style="vertical-align:middle;" data-column-id="identificador">Identificador</th>
					<th class="text-center" style="vertical-align:middle;" data-column-id="codigo_local">Codigo Local</th>
                    <th class="text-center" style="vertical-align:middle;" data-column-id="nombrelocal">Nombre Local</th>
					<th class="text-center" style="vertical-align:middle;" data-column-id="nombre_estado">Estado</th>
					<th class="text-center" style="vertical-align:middle;" data-column-id="commands" data-formatter="commands"
					    data-sortable="false">Acciones</th>
				</tr>
				</thead>
			</table>
		</div>
	</div>

</div>
@endsection
@section('script-fin')
<script>

    function recargar_grilla(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#tbl-fichas_usuarios').bootgrid({
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
            url:"../FichaController/ListarFichas",
            requestHandler: function (request) {
                request.email = $('#usuario_consulta').val();
                return request;
            },
            formatters: {

                "commands": function(column, row)
                {

                    return  "<a  class=\"btn \" href=\"../Fases/Editar/" +   row.identificador + "\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>&nbsp; Adjuntar Archivo</a> <a  class=\"btn \" href=\"../FichasController/Imprimir/" +   row.identificador + "\"><i class=\"fa fa-print\" aria-hidden=\"true\"></i>&nbsp; Ver Reporte</a>";
                }
            }
        });
    }
    $(document).ready(function()
    {

            recargar_grilla();

    });

</script>
@endsection
