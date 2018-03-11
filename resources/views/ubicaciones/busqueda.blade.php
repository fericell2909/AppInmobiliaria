@extends('layouts.app')
@section('htmlheader_title')
    Consulta las Ubicaciones en el Mapas
@endsection
@section('script-inicio')
    <script type="text/javascript"  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcgRnXLInbYYPxnduPpUY42YFWe8rpig4"></script>
@endsection
@section('content')
                
                <div class="panel-heading">
                    <h2 class="text-center titulo-ubicacion" style="font-weight:bold;"><i class="fa fa-search" aria-hidden="true"></i>&nbsp; Búsqueda Ubicación &nbsp;<i class="fa fa-search" aria-hidden="true"></i></h2>
                </div>

                    <input type="text" style="display:none;" id="editar" value="Busqueda">
                
              {{--   {!! Form::open(['route' => 'ubicacion/consultabusqueda', 'class' => 'form','method' => 'POST','id'=> 'ConsultaBusquedaForm','files' => true]) !!}   --}}
                    {{-- <div class="panel-body">
                        <fieldset>  
                        
                           <div class="form-group row">
                                          <div class="col-sm-3">
                                            <label class="color-azul">Departamento:</label>
                                            <select class="form-control text-center" name="departamento_id" id="departamento_id">
                                                @foreach($departamentos as $departamento)
                                                      <option  value="{{ $departamento->id }}">{{ $departamento->cNomZona}}</option>
                                                @endforeach
                                            </select>
                                            <span  id ="ErrorMensaje-departamento_id" class="help-block"></span>
                                          </div>
                                          <div class="col-sm-3">
                                            <label class="color-azul">Provincia:</label>
                                            <select class="form-control text-center" name="provincia_id" id="provincia_id">
                                            </select>
                                            <span  id ="ErrorMensaje-provincia_id" class="help-block"></span>
                                          </div>
                                          <div class="col-sm-3">
                                            <label class="color-azul">Distrito:</label>
                                            <select class="form-control text-center" name="distrito_id" id="distrito_id" >
                                            </select>
                                            <span  id ="ErrorMensaje-distrito_id" class="help-block"></span>
                                          </div>
                                          <div class="col-sm-2">
                                                <br>  
                                               <button  id = "ConsultaBusquedaForm" class="btnRealizarConsulta btn btn-principal btn-primary" >
                                                  <i class="fa fa-search"></i> &nbsp;Búsqueda       
                                                </button> 
                                          </div>
                                        </div>
                        </fieldset>
                    </div> --}}
                    <section id="mapCanvas" style ="height:35em;"></section>
{{--                   {!! Form::close() !!} --}}
@endsection
@section('script-fin')
{{-- <script src="{{ asset('dist/js/consulta.js')}}"></script> --}}
<script>
$(document).ready(function() {
// function initMap() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapCanvas"), mapOptions);
    map.setTilt(50);
        
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    var contentinfowindow= [];
    jQuery.ajax({
          url: '../ubicacion/consultabusqueda',
          type: 'POST',
          data: {"_token": $('meta[name="csrf-token"]').attr('content'),},
          success: function(respuesta){
              //console.log(respuesta);

              if (respuesta.length <= 0 || respuesta == undefined ) {alert('No Hay Ubicaciones Disponibles.'); return false;}
              $.each(respuesta, function(index, val) {

                             var position = new google.maps.LatLng( respuesta[index].nLatitudNegocio, respuesta[index].nLongitudNegocio);
                              bounds.extend(position);
                              marker = new google.maps.Marker({
                                  position: position,
                                  map: map,
                                  title: respuesta[index].titulo_ubicacion
                              });

                           var mensaje = '<div>' +
                                      '<h3 class="text-center" style="color: blue;">' + respuesta[index].titulo_ubicacion + '</h3>' +
                                      '<p><span style="font-weight: bold; color:red;">Descripcion :</span> ' + respuesta[index].descripcion_ubicacion + '</p>' + 
                                      '<p><span style="font-weight: bold; color:red;">Moneda :</span> ' + respuesta[index].nombre_moneda +'</p>' +
                                      '<p><span style="font-weight: bold; color:red;">Precio :</span> ' + respuesta[index].nPrecio.toFixed(2) +'</p>' +
                                      '<p><span style="font-weight: bold; color:red;">Medida :</span> ' + respuesta[index].descripcion_medida +'</p>' +
                                      '<p><span style="font-weight: bold; color:red;">Extension :</span> ' + respuesta[index].nExtension.toFixed(2) +'</p>' +
                                      '</div>';
                            //var mensaje = respuesta[index].titulo_ubicacion + ' **** ' + respuesta[index].descripcion_ubicacion;
                            contentinfowindow.push(String(mensaje));
                            //console.log(contentinfowindow);
                              //alert(String(mensaje));
        // Add info window to marker    
                          google.maps.event.addListener(marker, 'click', (function(marker, i) {
                              return function() { //infoWindowContent[index][0]
                                  infoWindow.setContent(contentinfowindow[index]);
                                  infoWindow.open(map, marker);
                              }
                          })(marker, i));
                          mensaje = null;
        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);


                                                
                            });
              respuesta = null;
            }});

    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(12);
        google.maps.event.removeListener(boundsListener);
    });
  });
</script>
@endsection