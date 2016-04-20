@extends('partials.panel')

@section('titulo', 'Registrar proveedor')

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

                    {!! Form::open(['route' =>  'proveedores.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                        {!! csrf_field() !!}
                        <fieldset>
                            <legend>
                                Registro de nuevo proveedor 
                            </legend>
                            <p>
                                Ingrese los datos
                            </p>

                            <div class="form-group {{ $errors->has('rif') ? ' has-error' : '' }}">
                                
                                <span class="input-icon">
        
                                    {!! Form::text('rif', old('rif'), ['class' => 'form-control', 'placeholder' => 'RIF ó C.I.' ,'required']) !!}
                                        
                                    <i class="fa fa-sitemap"></i>

                                </span>
                                        
                                @if ($errors->has('rif'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rif') }}</strong>
                                    </span>
                                @endif
                            </div>                                                            


                            <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    
                                    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre del proveedor' ,'required']) !!}
                                    
                                    <i class="fa fa-user"></i></span>

                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group form-actions {{ $errors->has('direccion') ? ' has-error' : '' }}">
                                
                                    <label>Dirección</label>
                                    
                                    {!! Form::textarea('direccion', old('direccion'), ['class' => 'form-control', 'placeholder' => 'Dirección del proveedor' ,'required',  'rows' => '6']) !!}

                                    @if ($errors->has('direccion'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('direccion') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group {{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    
                                    {!! Form::text('telefono', old('telefono'), ['class' => 'form-control', 'placeholder' => 'Teléfono' ,'required']) !!}
                                    
                                    <i class="fa fa-mobile"></i></span>

                                    @if ($errors->has('telefono'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('telefono') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    
                                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Correo electrónico' ,'required']) !!}
                                    
                                    <i class="fa fa-envelope"></i></span>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Registrar <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                            
                        </fieldset>

                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>
@endsection