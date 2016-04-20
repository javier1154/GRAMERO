@extends('partials.panel')

@section('titulo', 'Editar información de la empresa')

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

                    {!! Form::open(['route' =>  ['configuraciones.update', $configuracion->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

                        {!! csrf_field() !!}
                        <fieldset>
                            <legend>
                                Editar información de la empresa
                            </legend>
                        
                            <div class="form-group {{ $errors->has('empresa') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    
                                    {!! Form::text('empresa', $configuracion->empresa, ['class' => 'form-control', 'placeholder' => 'Nombre de la empresa' ,'required']) !!}
                                    
                                    <i class="fa fa-building"></i></span>

                                    @if ($errors->has('empresa'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('empresa') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group form-actions {{ $errors->has('direccion') ? ' has-error' : '' }}">
                                
                                    <label>Dirección</label>
                                    
                                    {!! Form::textarea('direccion', $configuracion->direccion, ['class' => 'form-control', 'placeholder' => 'Dirección de la empresa' ,'required',  'rows' => '6']) !!}

                                    @if ($errors->has('direccion'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('direccion') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group {{ $errors->has('rif') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    
                                    {!! Form::text('rif', $configuracion->rif, ['class' => 'form-control', 'placeholder' => 'RIF' ,'required']) !!}
                                    
                                    <i class="fa fa-list"></i></span>

                                    @if ($errors->has('rif'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rif') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group {{ $errors->has('moneda') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    
                                    {!! Form::text('moneda', $configuracion->moneda, ['class' => 'form-control', 'placeholder' => 'Moneda' ,'required']) !!}
                                    
                                    <i class="fa fa-money"></i></span>

                                    @if ($errors->has('moneda'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('moneda') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary pull-right">
                                    Editar <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                            
                        </fieldset>
                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>
@endsection
