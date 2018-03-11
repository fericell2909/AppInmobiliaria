@extends('layouts.app')
@section('htmlheader_title')
    Editar Ubicación
@endsection
@section('script-inicio')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcgRnXLInbYYPxnduPpUY42YFWe8rpig4&libraries=adsense&language=es"></script>
@endsection
@section('content')
                
                <div class="panel-heading">
                    <h2 class="text-center titulo-ubicacion" style="font-weight:bold;"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; Editar Ubicación &nbsp;<i class="fa fa-eye" aria-hidden="true"></i></h2>
                </div>
                <input type="text" style="display:none;" id="editar" value="Editar">
                
                
                @if(count($ubicaciones) > 0)
                {!! Form::open(['route' => 'ubicacion/editarguardar', 'class' => 'form','method' => 'POST','id'=> 'EditarUbicacionForm','files' => true]) !!}  
                <input type="text" style="display:none;" id="codigo_id" name="codigo_id" value="{{$ubicaciones[0]->id}}">  
                    <div class="panel-body">
                        


                        <div class="form-group row">
                            <div class="col-sm-8">
                              <label class="color-azul">Titulo de Ubicación:</label>
                              <input type="text" class="form-control text-center" id="titulo_ubicacion" name="titulo_ubicacion"  required maxlength="100" readonly placeholder="Titulo de Ubicación" value="{{$ubicaciones[0]->titulo_ubicacion}}" >
                            </div>
                            <div class="col-sm-4">
                                    <label class="color-azul">Clasificación</label>
                                    <select class="form-control text-center" name="clasificacion_id" id="clasificacion_id" >
                                        @foreach($clasificaciones as $clasificacion)
                                          @if($clasificacion->id == $ubicaciones[0]->clasificaciones_id)
                                            <option class="text-center" selected value="{{$clasificacion->id}}">{{$clasificacion->nombre_clasificacion}}</option>
                                          @else
                                              <option class="text-center" value="{{$clasificacion->id}}">{{$clasificacion->nombre_clasificacion}}</option>
                                          @endif
                                        @endforeach
                                    </select>
                                     <span  id ="ErrorMensaje-clasificacion_id" class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8">
                              <label class="color-azul">Breve Descripción</label>
                              <textarea  placeholder="Escribir una Breve Descripción" class="form-control" name="descripcion_id" id="descripcion_id" rows="16">{{$ubicaciones[0]->descripcion_ubicacion}}</textarea>
                              <span  id ="ErrorMensaje-descripcion_id" class="help-block"></span>
                            </div>
                            <div class="col-sm-4"> 
                                <div class="form-group row">
                                  <div class="col-sm-12">
                                    <label class="color-azul">Estado</label>
                                    <select class="form-control text-center" name="estados_id" id="estados_id">
                                        @foreach($estados as $estado)                                         
                                          @if($estado->id == $ubicaciones[0]->estados_id)
                                            <option class="text-center" selected value="{{$estado->id}}">{{$estado->nombre_estado}}</option>
                                            @else
                                              <option class="text-center" value="{{$estado->id}}">{{$estado->nombre_estado}}</option>
                                          @endif
                                        @endforeach
                                    </select>

                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-sm-12">
                                    <label class="color-azul">Tipo de Residencia</label>
                                    <select class="form-control text-center" name="tipos_id" id="tipos_id">
                                        @foreach($tipos as $tipo)                                         
                                          @if($tipo->id == $ubicaciones[0]->tipos_id)
                                            <option class="text-center" selected value="{{$tipo->id}}">{{$tipo->nombre_tipo}}</option>
                                            @else
                                              <option class="text-center" value="{{$tipo->id}}">{{$tipo->nombre_tipo}}</option>
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
                                            @else
                                              <option value="{{$estilo->id}}">{{$estilo->nombre_detalle_tipo}}</option>
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
                                            @else
                                              <option value="{{$cuarto->id}}">{{$cuarto->nombre_descripcion_cuartos}}</option>
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
                                              <option selected value="{{$banio->id}}">{{$banio->nombre_descripcion_banios}}</option>
                                              @else
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
                                    <input type="number" class="form-control text-center"  id="precio_ubicacion" name="precio_ubicacion"  value="{{$ubicaciones[0]->nPrecio}}" >
                                    <span  id ="ErrorMensaje-precio_ubicacion" class="help-block"></span>
                                </div>
                                <div class="col-sm-3">
                                    <label class="color-azul">Moneda</label>
                                    <select class="form-control text-center" name="moneda_id" id="moneda_id">
                                        @foreach($monedas as $moneda)
                                          @if($moneda->id ==  $ubicaciones[0]->monedas_id)
                                            <option selected value="{{$moneda->id}}">{{$moneda->nombre_moneda}}</option>
                                            @else
                                              <option value="{{$moneda->id}}">{{$moneda->nombre_moneda}}</option>
                                          @endif
                                        @endforeach
                                    </select>
                                    <span  id ="ErrorMensaje-moneda_id" class="help-block"></span>
                                </div>
                                <div class="col-sm-3">
                                    <label class="color-azul">Medida</label>
                                    <input type="number"  class="form-control text-center"  id="medida_cantidad" name="medida_cantidad"  required  value="{{ $ubicaciones[0]->nExtension }}">
                                    <span  id ="ErrorMensaje-medida_cantidad" class="help-block"></span>
                                </div>
                                <div class="col-sm-3">
                                    <label class="color-azul">Unidad de Medida</label>
                                    <select class="form-control text-center" name="medidas_id" id="medidas_id">
                                      @foreach ($medidas as $medida)
                                        @if($medida->id == $ubicaciones[0]->medidas_id )             
                                          <option value="{{ $medida->id }}" selected>{{ $medida->descripcion_medida }}</option>
                                          @else
                                            <option value="{{ $medida->id }}" >{{ $medida->descripcion_medida }}</option>
                                        @endif
                                      @endforeach 
                                    </select>
                                     <span  id ="ErrorMensaje-medidas_id" class="help-block"></span>
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
                                    <input type="text" class="form-control text-center"  id="contacto_nombres_apellidos" name="contacto_nombres_apellidos"  required value="{{$ubicaciones[0]->contacto_nombres_apellidos}}" >
                                    <span  id ="ErrorMensaje-contacto_nombres_apellidos" class="help-block"></span>
                                </div>
                                <div class="col-sm-3">
                                    <label class="color-azul">Dni</label>
                                    <input type="text"  class="form-control text-center"  id="contacto_dni" name="contacto_dni"  required  value="{{$ubicaciones[0]->contacto_dni}}">
                                    <span  id ="ErrorMensaje-contacto_dni" class="help-block"></span>
                                </div>
                                <div class="col-sm-3">
                                    <label class="color-azul">Correo Electrónico</label>
                                    <input type="text"  class="form-control text-center"  id="contacto_email" name="contacto_email"  value="{{$ubicaciones[0]->contacto_email}}" >
                                    <span  id ="ErrorMensaje-contacto_email" class="help-block"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="color-azul">Dirección de Contacto</label>
                                    <input type="text" class="form-control text-center"  id="contacto_direccion" name="contacto_direccion"  value="{{$ubicaciones[0]->contacto_direccion}}">
                                    <span  id ="ErrorMensaje-contacto_direccion" class="help-block"></span>
                                </div>
                                <div class="col-sm-3">
                                    <label class="color-azul">Celular</label>
                                    <input type="text"  class="form-control text-center"  id="contacto_celular" name="contacto_celular" value="{{$ubicaciones[0]->contacto_celular}}" maxlength="9">
                                     <span  id ="ErrorMensaje-contacto_celular" class="help-block"></span>
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
                                            id="cDireccionNegocio" name="cDireccionNegocio"  value="{{$ubicaciones[0]->cDireccionNegocio}}">
                                            <span  id ="ErrorMensaje-cDireccionNegocio" class="help-block"></span>
                                          </div>
                            </div>
                            <div class="form-group row">
                                          <div class="col-sm-4">
                                            <label class="color-azul">Departamento:</label>
                                            <select class="form-control text-center" name="departamento_id" id="departamento_id">
                                                @foreach($departamentos as $departamento)
                                                    @if($departamento->id == $ubicaciones[0]->departamento_id )
                                                      <option selected  value="{{ $departamento->id }}">{{ $departamento->cNomZona}}</option>
                                                    @else
                                                      <option  value="{{ $departamento->id }}">{{ $departamento->cNomZona}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <span  id ="ErrorMensaje-departamento_id" class="help-block"></span>
                                          </div>
                                          <div class="col-sm-4">
                                            <label class="color-azul">Provincia:</label>
                                            <select class="form-control text-center" name="provincia_id" id="provincia_id">
                                            @foreach($provincias as $provincia)
                                                    @if($provincia->id == $ubicaciones[0]->provincia_id )
                                                      <option selected  value="{{ $provincia->id }}">{{ $provincia->cNomZona}}</option>
                                                    @else
                                                      <option  value="{{ $provincia->id }}">{{ $provincia->cNomZona}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <span  id ="ErrorMensaje-provincia_id" class="help-block"></span>
                                          </div>
                                          <div class="col-sm-4">
                                            <label class="color-azul">Distrito:</label>
                                            <select class="form-control text-center" name="distrito_id" id="distrito_id" >
                                              @foreach($distritos as $distrito)
                                                    @if($distrito->id == $ubicaciones[0]->distrito_id )
                                                      <option selected  value="{{ $distrito->id }}">{{ $distrito->cNomZona}}</option>
                                                    @else
                                                      <option  value="{{ $distrito->id }}">{{ $distrito->cNomZona}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <span  id ="ErrorMensaje-distrito_id" class="help-block"></span>
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

                        <div class="form-group">
                              <input type="text" style="display:none;" class="form-control" name="user_id"  value="{{Auth::user()->id}}">
                              
                              <button type="submit" id = "btnEditarGuardarUbicacion" class="btnEditarUbicacion btn btn-principal btn-primary" >
                              <i class="fa fa-map-marker"></i> &nbsp;Editar Ubicación       
                              </button>
                      </div>  
                    </div>
                    
                  {!! Form::close() !!}
                @else
                    <div class="panel-body">
                      <ul class="list-group">
                          <li class="list-group-item active"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Editar Ubicación&nbsp;<span class="badge">0</span></li>
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
<script src="{{ asset('dist/js/inmobiliaria.js')}}"></script>
@endsection