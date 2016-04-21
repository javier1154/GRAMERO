@extends('partials.panel')

@section('titulo', 'Registrar nuevo método de pago')

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

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('metodosPagos.store') }}">
                        {!! csrf_field() !!}
                        <fieldset>
                            <legend>
                                Registro de método de pago
                            </legend>
                            <p>
                                Ingrese los datos para el registro
                            </p>
                            <div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre del método de pago">
                                    <i class="fa fa-server"></i></span>

                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            
                            <div class="form-group form-actions {{ $errors->has('tipo') ? ' has-error' : '' }}">

                                {!! Form::select('tipo', ['Clientes' => 'Clientes', 'Proveedores' => 'Proveedores'], old('tipo'), ['placeholder' => 'Dirigido para...', 'class' => 'form-control', 'required']) !!}

                                @if ($errors->has('tipo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipo') }}</strong>
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
