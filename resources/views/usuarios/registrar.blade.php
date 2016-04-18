@extends('partials.panel')

@section('titulo', 'Registrar nuevo usuario')

@section('contenido')
    
    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-sm-12">

                <!-- include('flash::message') -->
                         
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-sm-8 col-sm-offset-2">

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('usuarios.store') }}">
                        {!! csrf_field() !!}
                        <fieldset>
                            <legend>
                                Registro de usuario
                            </legend>
                            <p>
                                Ingrese sus datos para el registro
                            </p>
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre Completo">
                                    <i class="fa fa-user"></i></span>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group form-actions {{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico">

                                    <i class="fa fa-envelope"></i> </span>

                                     @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>

                           <div class="form-group form-actions {{ $errors->has('tipo') ? ' has-error' : '' }}">
                                

                                    <select name="tipo" required style="width: 100%">
                                        <option value="">Tipo de usuario</option>
                                        <option value="Administrador Maestro">Administrador Maestro</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Cajero">Cajero</option>
                                    </select>

                                     @if ($errors->has('tipo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tipo') }}</strong>
                                        </span>
                                    @endif
                           </div>


                            <div class="form-group form-actions {{ $errors->has('password') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    <input type="password" class="form-control" name="password" placeholder="Contraseña">

                                    <i class="fa fa-lock"></i></span>

                                     @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>


                            <div class="form-group form-actions {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Repetir Contraseña">

                                    <i class="fa fa-lock"></i></span>

                                     @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Registrar <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                            
                        </fieldset>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
