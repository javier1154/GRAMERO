@extends('partials.panel')

@section('titulo', 'Registrar información de la empresa')

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

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('configuraciones.store') }}">
                        {!! csrf_field() !!}
                        <fieldset>
                            <legend>
                                Registro de información de la empresa
                            </legend>
                            <p>
                                Ingrese los datos de la empresa
                            </p>
                            <div class="form-group {{ $errors->has('empresa') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    <input type="text" class="form-control" name="empresa" value="{{ old('empresa') }}" placeholder="Nombre de la empresa">
                                    
                                    <i class="fa fa-building"></i></span>

                                    @if ($errors->has('empresa'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('empresa') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group form-actions {{ $errors->has('direccion') ? ' has-error' : '' }}">
                                
                                    <label>Dirección</label>
                                    <textarea name="direccion" class="form-control" cols="30" rows="6">{{ old('direccion') }}</textarea>

                                    

                                     @if ($errors->has('direccion'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('direccion') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group {{ $errors->has('rif') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    <input type="text" class="form-control" name="rif" value="{{ old('rif') }}" placeholder="RIF">
                                    
                                    <i class="fa fa-list"></i></span>

                                    @if ($errors->has('rif'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rif') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group {{ $errors->has('moneda') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    <input type="text" class="form-control" name="moneda" value="{{ old('moneda') }}" placeholder="Moneda">
                                    
                                    <i class="fa fa-money"></i></span>

                                    @if ($errors->has('moneda'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('moneda') }}</strong>
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
