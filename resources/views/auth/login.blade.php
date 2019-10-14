
<!------ Include the above in your HEAD tag ---------->


@extends('auth.layouts.app' )
@section('content')
<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h3 style="margin-top:5px;">Iniciar Sesión</h3>
        <div class="d-flex justify-content-end social_icon">
          <span><i class="fab fa-facebook-square"></i></span>
          <span><i class="fab fa-google-plus-square"></i></span>
          <span><i class="fab fa-twitter-square"></i></span>
        </div>
      </div>
      <div class="card-body">
       <form action="{{ route('login') }}" method="post">
        {{ csrf_field() }}
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
             <input id="email" type="text" class="form-control text-center" name="email" value="{{ old('email') }}"  autofocus placeholder="Usuario">
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
           
            
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
             <input id="password" type="password" class="form-control text-center" name="password" placeholder="Contraseña">
             @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
          </div>
          <div class="row align-items-center remember">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
            </label>
          </div>
          <div class="form-group">
            <input type="submit" value="Ingresar" class="btn float-right login_btn">
          </div>
        </form>
      </div>
      <div class="card-footer" style="display:none;">
        <div class="d-flex justify-content-center">
          <a href="{{ route('password.request') }}"> Olvidé mi contraseña</a>
        </div>
      </div>
    </div>
  </div>
</div>




@endsection
