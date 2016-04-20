@extends('partials.panel')

@section('titulo', 'Editar usuario')

@section('contenido')
    
    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-sm-12">

                @include('flash::message')
                         
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

                    {!! Form::open(['route' =>  ['usuarios.update', $usuario->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

                        {!! csrf_field() !!}
                        <fieldset>
                            <legend>
                                Editar usuario {{ $usuario->name }}
                            </legend>
                            <p>
                                Actualice los datos que desea
                            </p>

                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <span class="input-icon">

                                    {!! Form::text('name', $usuario->name, ['class' => 'form-control', 'placeholder' => 'Nombre Completo' ,'required']) !!}

                                    <i class="fa fa-user"></i></span>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group form-actions {{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-icon">
                            
                                    {!! Form::text('email', $usuario->email, ['class' => 'form-control', 'placeholder' => 'Correo Electrónico' ,'readonly']) !!}

                                    <i class="fa fa-envelope"></i> </span>

                                     @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>

                           <div class="form-group form-actions {{ $errors->has('tipo') ? ' has-error' : '' }}">

                                {!! Form::select('tipo', ['Administrador Maestro' => 'Administrador Maestro', 'Administrador' => 'Administrador', 'Cajero' => 'Cajero'], $usuario->tipo, ['placeholder' => 'Tipo de usuario', 'class' => 'form-control', 'required']) !!}

                                @if ($errors->has('tipo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif

                           </div>
                            
                        </fieldset>


                        <fieldset>
                            <legend>
                                Cambiar clave de acceso al sistema
                            </legend>
                            
                            <div class="form-group form-actions {{ $errors->has('password') ? ' has-error' : '' }}">
                                <span class="input-icon">

                                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}

                                    <i class="fa fa-lock"></i></span>

                                     @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>


                            <div class="form-group form-actions {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <span class="input-icon">

                                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Repetir Contraseña']) !!}

                                    <i class="fa fa-lock"></i></span>

                                     @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            
                        </fieldset>
                        
                       <div class="form-actions">
                            <button type="submit" class="btn btn-primary pull-right">
                                Editar <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>

                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>
@endsection
