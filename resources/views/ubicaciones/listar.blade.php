@extends('layouts.app')
@section('htmlheader_title')
    Listado de Ubicaciones
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
                <h2 class="text-center titulo-ubicacion" style="font-weight:bold;"><i class="fa fa-list" aria-hidden="true"></i>&nbsp; Listado de Ubicaciones &nbsp;<i class="fa fa-list" aria-hidden="true"></i></h2>
            </div>
            <div class="panel-body">
					
	            <div id="tablePanel">
	                <div class="row">
	                    <div class="col-md-8">
	                        <a href="{{route("ubicaciones")}}">
	                            <button class="btn btn-sm btn-info" data-id=""><i class="fa fa-street-view"
	                                                          aria-hidden="true"></i> Registrar Ubicación
	                            </button>
	                        </a>
	                    </div>
	                </div>
	            </div>  <!-- end div #tablePanel -->
	            <div class="table-responsive" id="lista-ubicaciones">
                        <table class="table table-hover" id="tbl-ubicaciones">
						  <thead>
						     <tr>
						      <th class="text-center" style="vertical-align:middle;" data-column-id="id" data-type="numeric">#</th>
						      <th class="text-center" style="vertical-align:middle;" data-column-id="titulo_ubicacion">Nombre</th>
						      <th class="text-center" style="vertical-align:middle;" data-column-id="cNomZona">Email</th>
						      <th class="text-center" style="vertical-align:middle;" data-column-id="nombre_estado">Estado</th>
						      <th class="text-center" style="vertical-align:middle;" data-column-id="email">Usuario</th>
						      <th class="text-center" style="vertical-align:middle;" data-column-id="commands" data-formatter="commands" data-sortable="false">Acciones</th>
						    </tr>
						  </thead>
						  </table>
                    </div>
	       	</div> 
        	
        </div>    
@endsection
@section('script-fin')
<script>
$(document).ready(function()
{
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	var gridtable= $('#tbl-ubicaciones').bootgrid({		
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
			url:"../Ubicaciones/Listar",

			formatters: {

		        "commands": function(column, row)
		        {

		            return  "<a  class=\"btn \" href=\"../Ubicaciones/Ver/" +   row.id + "\"><i class=\"fa fa-eye\" aria-hidden=\"true\"></i>&nbsp; Ver</a><a  class=\"btn \" href=\"../Ubicaciones/Editar/" +   row.id + "\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i>&nbsp; Editar</a>";
		            // <a  class=\"btn \" href=\"../Ubicaciones/Imprimir/" +   row.id + "\"><i class=\"fa fa-print\" aria-hidden=\"true\"></i>&nbsp; Imprimir</a>";
		        }
    		}
	});

});

</script>
@endsection