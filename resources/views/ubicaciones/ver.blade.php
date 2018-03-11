@extends('layouts.app')
@section('htmlheader_title')
    Ver Ubicación
@endsection
@section('script-inicio')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcgRnXLInbYYPxnduPpUY42YFWe8rpig4&libraries=adsense&language=es"></script>
@endsection
@section('content')
                <div class="panel-heading">
                    <h2 class="text-center titulo-ubicacion" style="font-weight:bold;"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Ver Ubicación &nbsp;<i class="fa fa-eye" aria-hidden="true"></i></h2>
                </div>
                
                @if(count($ubicaciones) > 0)    
                    <div class="panel-body">
                         
                        <div class="form-group row">
                            <div class="col-sm-8">
                              <label class="color-azul">Titulo de Ubicación:</label>
                              <input type="text" class="form-control text-center" id="titulo_ubicacion" name="titulo_ubicacion"  required maxlength="100" placeholder="Titulo de Ubicación" value="{{$ubicaciones[0]->titulo_ubicacion}}" readonly>
                            </div>
                            <div class="col-sm-4">
                                    <label class="color-azul">Clasificación</label>
                                    <select class="form-control text-center" name="clasificacion_id" id="clasificacion_id" readonly>
                                        @foreach($clasificaciones as $clasificacion)
                                          @if($clasificacion->id == $ubicaciones[0]->clasificaciones_id)
                                            <option class="text-center" selected value="{{$clasificacion->id}}">{{$clasificacion->nombre_clasificacion}}</option>
                                          @endif
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8">
                              <label class="color-azul">Breve Descripción</label>
                              <textarea  placeholder="Escribir una Breve Descripción" class="form-control" name="descripcion_id" id="descripcion_id" rows="12" readonly>{{$ubicaciones[0]->descripcion_ubicacion}}</textarea>
                            </div>
                            <div class="col-sm-4">  
                                <div class="form-group row">
                                  <div class="col-sm-12">
                                    <label class="color-azul">Tipo de Residencia</label>
                                    <select class="form-control text-center" name="tipos_id" id="tipos_id" readonly>
                                        @foreach($tipos as $tipo)                                         
                                          @if($tipo->id == $ubicaciones[0]->tipos_id)
                                            <option class="text-center" selected value="{{$tipo->id}}">{{$tipo->nombre_tipo}}</option>
                                          @endif
                                        @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="color-azul">Estilo</label>
                                        <select class="form-control text-center" name="estilo_id" id="estilo_id">
                                        @foreach($estilos as $estilo)
                                          @if($estilo->id == $ubicaciones[0]->estilos_id )
                                              <option value="{{$estilo->id}}" selected>{{$estilo->nombre_detalle_tipo}}</option>
                                          @endif
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="color-azul"># de Habitaciones</label>
                                        <select class="form-control text-center" name="cuarto_id" id="cuarto_id">
                                          @foreach($cuartos as $cuarto)
                                            @if($cuarto->id == $ubicaciones[0]->cuartos_id )
                                              <option value="{{$cuarto->id}}" selected>{{$cuarto->nombre_descripcion_cuartos}}</option>
                                            @endif
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="color-azul"># de Baños</label>
                                        <select class="form-control text-center" name="banio_id" id="banio_id">
                                          @foreach($banios as $banio)
                                            @if($banio->id == $ubicaciones[0]->banios_id )
                                              <option value="{{$banio->id}}">{{$banio->nombre_descripcion_banios}}</option>
                                            @endif
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <fieldset>
                            <legend  class="color-azul">Precios y Medidas</legend>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="color-azul">Precio Estimado</label>
                                    <input type="number" readonly class="form-control text-center"  id="precio_ubicacion" name="precio_ubicacion"  value="{{$ubicaciones[0]->nPrecio}}" >
                                </div>
                                <div class="col-sm-3">
                                    <label class="color-azul">Moneda</label>
                                    <select class="form-control text-center" name="moneda_id" id="moneda_id">
                                        @foreach($monedas as $moneda)
                                          @if($moneda->id ==  $ubicaciones[0]->monedas_id)
                                            <option selected value="{{$moneda->id}}">{{$moneda->nombre_moneda}}</option>
                                          @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label class="color-azul">Medida</label>
                                    <input type="number"  class="form-control text-center"  id="medida_cantidad" name="medida_cantidad"  required  value="{{ $ubicaciones[0]->nExtension }}" readonly>
                                    <span  id ="ErrorMensaje-medida_cantidad" class="help-block"></span>
                                </div>
                                <div class="col-sm-3">
                                    <label class="color-azul">Unidad de Medida</label>
                                    <select class="form-control text-center" name="medidas_id" id="medidas_id">
                                      @foreach ($medidas as $medida)
                                        @if($medida->id == $ubicaciones[0]->medidas_id )             
                                          <option value="{{ $medida->id }}" selected>{{ $medida->descripcion_medida }}</option>
                                        @endif
                                      @endforeach 
                                    </select>
                                </div>
                            </div>
                          </fieldset>
                        </div>

                        <div class="form-group">
                          <fieldset>
                            <legend  class="color-azul">Información de Contacto</legend>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="color-azul">Nombres y Apellidos</label>
                                    <input type="text" class="form-control text-center"  id="contacto_nombres_apellidos" name="contacto_nombres_apellidos"  required value="{{$ubicaciones[0]->contacto_nombres_apellidos}}" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label class="color-azul">Dni</label>
                                    <input type="text"  class="form-control text-center"  id="contacto_dni" name="contacto_dni"  required  value="{{$ubicaciones[0]->contacto_dni}}" readonly>
                                </div>
                                <div class="col-sm-3">
                                    <label class="color-azul">Correo Electrónico</label>
                                    <input type="text"  class="form-control text-center"  id="contacto_email" name="contacto_email"  readonly value="{{$ubicaciones[0]->contacto_email}}" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="color-azul">Dirección de Contacto</label>
                                    <input type="text" class="form-control text-center"  id="contacto_direccion" name="contacto_direccion"  readonly  value="{{$ubicaciones[0]->contacto_direccion}}">
                                </div>
                                <div class="col-sm-3">
                                    <label class="color-azul">Celular</label>
                                    <input type="text"  class="form-control text-center"  id="contacto_celular" name="contacto_celular"  readonly value="{{$ubicaciones[0]->contacto_celular}}">
                                </div>
                            </div>
                          </fieldset>
                        </div>

                        <div class="form-group">
                          <fieldset>
                            <legend  class="color-azul">Ubicación Física</legend>
                            <div class="form-group row">
                                          <div class="col-sm-12">
                                            <label class="color-azul">Dirección Física:</label>
                                            <input type="text" class="form-control text-center" 
                                            id="cDireccionNegocio" name="cDireccionNegocio"  readonly value="{{$ubicaciones[0]->cDireccionNegocio}}">
                                          </div>
                            </div>
                            <div class="form-group row">
                                          <div class="col-sm-4">
                                            <label class="color-azul">Departamento:</label>
                                            <select class="form-control text-center" name="departamento_id" id="departamento_id">
                                                @foreach($departamentos as $departamento)
                                                    <option  selected value="{{ $departamento->id }}">{{ $departamento->cNomZona}}</option>
                                                @endforeach
                                            </select>
                                            <span  id ="ErrorMensaje-departamento_id" class="help-block"></span>
                                          </div>
                                          <div class="col-sm-4">
                                            <label class="color-azul">Provincia:</label>
                                            <select class="form-control text-center" name="provincia_id" id="provincia_id">
                                              @foreach($provincias as $provincia)
                                                    <option  selected value="{{ $provincia->id }}">{{ $provincia->cNomZona}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                          <div class="col-sm-4">
                                            <label class="color-azul">Distrito:</label>
                                            <select class="form-control text-center" name="distrito_id" id="distrito_id" >
                                              @foreach($distritos as $distrito)
                                                    <option  selected value="{{ $distrito->id }}">{{ $distrito->cNomZona}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                        </div>
                            <label class="color-azul">Ubicación en el Mapa:</label>
                                        
                                        <div class="form-group">
                                          <div class="row">  
                                            <div class="col-xs-12 col-sm-6">
                                                <label class="color-azul">Latitud</label>
                                                <input type="text" name="nLatitudNegocio" id="nLatitudNegocio" class="form-control text-center" value="{{$ubicaciones[0]->nLatitudNegocio}}" required pattern="" title="" readonly>
                                              </div>
                                            <div class="col-xs-12 col-sm-6">
                                              <label class="color-azul">Longitud</label>
                                              <input type="text" name="nLongitudNegocio" id="nLongitudNegocio" class="form-control text-center" value="{{$ubicaciones[0]->nLongitudNegocio}}" required pattern="" title="" readonly>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                          </div>
                                         <div class="row">  
                                            <div class="col-xs-12">
                                            <center><div id='map_canvas' style="background:#f7f7f7;"></div></center>
                                            </div>
                                          </div>    
                                        </div>
                          </fieldset>
                        </div>
                    </div>
                @else
                    <div class="panel-body">
                      <ul class="list-group">
                          <li class="list-group-item active"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Ver Ubicación&nbsp;<span class="badge">0</span></li>
                          <li class="list-group-item">
                              <center>
                                  <img src= "/dist/img/cero.png" title="Cero Ubicaciones" class="img img-responsive">
                                  <p class="color-azul cuenta-usuario-row"><b>No se encontró ubicacion buscada</b></p>
                              </center>
                          </li>
                      </ul>

                  </div>
               @endif 
@endsection
@section('script-fin')
{{-- <script src="{{ asset('dist/js/inmobiliaria.min.js')}}"></script> --}}

<script>
$(document).ready(function() {
  var map = null;
  var infoWindow = null;
  initialize();
function initialize() {
    var myLatlng = new google.maps.LatLng($('#nLatitudNegocio').val(), $('#nLongitudNegocio').val());
    var myOptions = {
      zoom: 15,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
 
    map = new google.maps.Map($('#map_canvas').get(0), myOptions);
    

    infoWindow = new google.maps.InfoWindow({});
 
    var marker = new google.maps.Marker({
        position: myLatlng,
        draggable: false,
        map: map,
        title:'Ubicacion.'
    });
 
    // google.maps.event.addListener(marker, 'dragend', function(){ openInfoWindow(marker); });
    google.maps.event.addListener(marker, 'click', function(){ openInfoWindow(marker); });
}
});

</script>
@endsection