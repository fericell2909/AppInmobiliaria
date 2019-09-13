@extends('layouts.app')
@section('htmlheader_title')
    Registrar Ficha
@endsection
@section('script-inicio')
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC-ueG56d4pm8xrNLlPssupxlCCuwWIOo&libraries=adsense&language=es"></script>
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

                {!! Form::open(['route' => 'ubicacion/registrar', 'class' => 'form','method' => 'POST','id'=> 'RegistroUbicacionForm','files' => true]) !!}
                <div class="panel-heading">
                    <h2 class="text-center titulo-ubicacion" style="font-weight:bold;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Registrar Ficha &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></h2>
                </div>
                    <div class="panel-body">
                         <div class="form-group row">
                                          <div class="col-sm-4">
                                            <label class="color-azul">Departamento:</label>
                                            <select class="form-control text-center" name="departamento_id" id="departamento_id">
                                                @foreach($departamentos as $departamento)
                                                    <option value="{{ $departamento->id }}">{{ $departamento->cNomZona}}</option>
                                                @endforeach
                                            </select>
                                            <span  id ="ErrorMensaje-departamento_id" class="help-block"></span>
                                          </div>
                                          <div class="col-sm-4">
                                            <label class="color-azul">Provincia:</label>
                                            <select class="form-control text-center" name="provincia_id" id="provincia_id" style="display:none;">
                                            </select>
                                            <span  id ="ErrorMensaje-provincia_id" class="help-block"></span>
                                          </div>
                                          <div class="col-sm-4">
                                            <label class="color-azul">Distrito:</label>
                                            <select class="form-control text-center" name="distrito_id" id="distrito_id" style="display:none;">
                                            </select>
                                            <span  id ="ErrorMensaje-distrito_id" class="help-block"></span>
                                          </div>
                                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8">
                              <label class="color-azul">Titulo de Ficha:</label>
                              <input type="text" class="form-control text-center" id="titulo_ubicacion" name="titulo_ubicacion"  required maxlength="100" placeholder="Titulo de Ficha">
                              <span  id ="ErrorMensaje-titulo_ubicacion" class="help-block"></span>
                            </div>
                            <div class="col-sm-4">
                                    <label class="color-azul">Nivel</label>
                                    <select class="form-control text-center" name="clasificacion_id" id="clasificacion_id">
                                        @foreach($clasificaciones as $clasificacion)
                                            <option class="text-center" value="{{$clasificacion->id}}">{{$clasificacion->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    <span  id ="ErrorMensaje-clasificacion_id" class="help-block"></span>
                                  </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8">
                             <label class="color-azul">Breve Descripción</label>
                              <textarea  placeholder="Escribir una Breve Descripción" class="form-control" name="descripcion_id" id="descripcion_id" rows="8"></textarea>
                              <span  id ="ErrorMensaje-descripcion_id" class="help-block"></span>
                            </div>
                            <div class="col-sm-4">  
                                <div class="form-group row">
                                  <div class="col-sm-12">
                                    <label class="color-azul">Caracteristicas</label>
                                    <select class="form-control text-center" name="tipos_id" id="tipos_id">
                                        @foreach($tipos as $tipo)
                                            <option class="text-center" value="{{$tipo->id}}">{{$tipo->descripcion}}</option>
                                        @endforeach
                                    </select>
                                    <span  id ="ErrorMensaje-tipos_id" class="help-block"></span>
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="color-azul">Modalidad</label>
                                        <select class="form-control text-center" name="cuarto_id" id="cuarto_id">
                                        @foreach($cuartos as $cuarto)
                                            <option value="{{$cuarto->id}}">{{$cuarto->descripcion}}</option>
                                        @endforeach
                                        </select>
                                        <span  id ="ErrorMensaje-cuarto_id" class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="color-azul">Turno</label>
                                        <select class="form-control text-center" name="banio_id" id="banio_id">
                                        @foreach($banios as $banio)
                                            <option value="{{$banio->id}}">{{$banio->nombre_descripcion_banios}}</option>
                                        @endforeach
                                        </select>
                                        <span  id ="ErrorMensaje-banio_id" class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
 
                        

                        <div class="form-group">
                          <fieldset>
                            <legend  class="color-azul">Información de Contacto</legend>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="color-azul">Nombres y Apellidos</label>
                                    <input type="text" class="form-control text-center"  id="contacto_nombres_apellidos" name="contacto_nombres_apellidos"  required  placeholder="Nombres y Apellidos">
                                    <span  id ="ErrorMensaje-contacto_nombres_apellidos" class="help-block"></span>
                                </div>
                                <div class="col-sm-3">
                                    <label class="color-azul">Dni</label>
                                    <input type="text"  class="form-control text-center"  id="contacto_dni" name="contacto_dni"  required  placeholder="Dni : 445770924" maxlength="8">
                                    <span  id ="ErrorMensaje-contacto_dni" class="help-block"></span>
                                </div>
                                <div class="col-sm-3">
                                    <label class="color-azul">Correo Electrónico</label>
                                    <input type="text"  class="form-control text-center"  id="contacto_email" name="contacto_email"  required placeholder="ejemplo@ejemplo.com">
                                    <span  id ="ErrorMensaje-contacto_email" class="help-block"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="color-azul">Dirección de Contacto</label>
                                    <input type="text" class="form-control text-center"  id="contacto_direccion" name="contacto_direccion"  required  placeholder="Dirección de Contacto">
                                    <span  id ="ErrorMensaje-contacto_direccion" class="help-block"></span>
                                </div>
                                <div class="col-sm-3">
                                    <label class="color-azul">Celular</label>
                                    <input type="text"  class="form-control text-center"  id="contacto_celular" name="contacto_celular"  required  placeholder="Celular : 955555555" maxlength="9">
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
                                            id="cDireccionNegocio" name="cDireccionNegocio"  required placeholder="Dirección Física">
                                            <span  id ="ErrorMensaje-cDireccionNegocio" class="help-block"></span>
                                          </div>
                            </div>
                            
                                        
                          </fieldset>
                        </div>

                        <div class="form-group">
                            <input type="text" style="display:none;" class="form-control" name="user_id"  value="{{Auth::user()->id}}">
                            
                            <button type="submit" id = "btnRegistrarUbicacion" class="btnRegistrarUbicacion btn btn-principal btn-primary" >
                            <i class="fa fa-map-marker"></i> &nbsp;Registrar Ficha       
                            </button>
                        </div>

                    </div>
              {!! Form::close() !!}
     
@endsection
@section('script-fin')
<script src="{{ asset('dist/js/inmobiliaria.js')}}"></script>
@endsection