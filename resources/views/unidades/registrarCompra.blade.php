@extends('partials.panel')

@section('titulo', 'Registrar nueva unidad')

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

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('unidades.store') }}">
                        {!! csrf_field() !!}
                        <fieldset>
                            <legend>
                                Registro de unidad de compra
                            </legend>
                            <p>
                                Ingrese los datos para el registro
                            </p>
                            <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre de la unidad">
                                    <i class="fa fa-archive"></i></span>

                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            
                           <div class="form-group {{ $errors->has('nomenclatura') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    <input type="text" class="form-control" name="nomenclatura" value="{{ old('nomenclatura') }}" placeholder="Nomenclatura">
                                    <i class="fa fa-bold"></i></span>

                                    @if ($errors->has('nomenclatura'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nomenclatura') }}</strong>
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
