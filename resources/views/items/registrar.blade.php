@extends('partials.panel')

@section('titulo', 'Registrar nuevo item')

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

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('items.store') }}">
                        {!! csrf_field() !!}
                        <fieldset>
                            <legend>
                                Registro de item
                            </legend>
                            <p>
                                Ingrese los datos para el registro
                            </p>
                            <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre del item">
                                    <i class="fa fa-archive"></i></span>

                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group {{ $errors->has('id_categoria') ? ' has-error' : '' }}">
                                
                                {!! Form::select('id_categoria', $categorias, old('id_categoria'), ['class' => 'form-control', 'placeholder' => 'Categoría', 'required']) !!}

                                @if ($errors->has('id_categoria'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_categoria') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('id_unidad_compra') ? ' has-error' : '' }}">
                                
                                {!! Form::select('id_unidad_compra', $unidades, old('id_unidad_compra'), ['class' => 'form-control', 'placeholder' => 'Unidad de compra', 'required']) !!}

                                @if ($errors->has('id_unidad_compra'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_unidad_compra') }}</strong>
                                    </span>
                                @endif
                            </div>


                            
                            <div class="form-group {{ $errors->has('alertar') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    <input type="number" class="form-control" name="alertar" value="{{ old('alertar') }}" placeholder="Cantidad a la que se enviará alerta">
                                    <i class="fa fa-bell"></i></span>

                                    @if ($errors->has('alertar'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('alertar') }}</strong>
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
