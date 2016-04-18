@extends('layouts.app')

@section('content')
<div class="row">
    <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        
        <!--<div class="logo margin-top-30">
            <img src="assets/images/logo.png" alt="Clip-Two"/>
        </div>
        -->
        <div style="text-align: center; font-size: 26px; font-weight: bold;">
            GRAMERO    
        </div>

        <!-- start: LOGIN BOX -->
        <div class="box-login">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}
                <fieldset>
                    <legend>
                        Ingreso al sistema
                    </legend>
                    <p>
                        Ingrese su correo y contraseña
                    </p>
                    <div class="form-group">
                        <span class="input-icon">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico">
                            <i class="fa fa-user"></i></span>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-group form-actions">
                        <span class="input-icon">
                            <input type="password" class="form-control" name="password" placeholder="Contraseña">

                            <i class="fa fa-lock"></i>
                            <a class="forgot" href="#">
                                olvidó su contraseña?
                            </a> </span>

                             @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>
                    <div class="form-actions">
                        <div class="checkbox clip-check check-primary">
                            <input type="checkbox" id="remember" value="1">
                            <label for="remember">
                                Recordarme
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">
                            Ingresar <i class="fa fa-arrow-circle-right"></i>
                        </button>
                    </div>
                    
                    <div class="new-account">
                       
                        <a href="{{ url('/register') }}">
                            Crear usuario
                        </a>
                    </div>
                    
                </fieldset>
            </form>
            <!-- start: COPYRIGHT -->
            <!--
            <div class="copyright">
                &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> ClipTheme</span>. <span>All rights reserved</span>
            </div>-->
            <!-- end: COPYRIGHT -->
        </div>
        <!-- end: LOGIN BOX -->
    </div>
</div>
@endsection
