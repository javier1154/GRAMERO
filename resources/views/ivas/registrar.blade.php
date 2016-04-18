@extends('partials.panel')

@section('css')
    
    <link href="{!! asset('plugins/plantilla/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css'); !!}" rel="stylesheet" media="screen">
    <link href="{!! asset('plugins/plantilla/vendor/select2/select2.min.css'); !!}" rel="stylesheet" media="screen">
    <link href="{!! asset('plugins/plantilla/vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css'); !!}" rel="stylesheet" media="screen">
    <link href="{!! asset('plugins/plantilla/vendor/bootstrap-timepicker/bootstrap-timepicker.min.css'); !!}" rel="stylesheet" media="screen">

@endsection

@section('titulo', 'Registrar IVA')

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

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('ivas.store') }}">
                        {!! csrf_field() !!}
                        <fieldset>
                            <legend>
                                Registro nuevo IVA
                            </legend>
                            <p>
                                Ingrese los datos
                            </p>
                            <div class="form-group {{ $errors->has('iva') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-icon">
                                        <input type="number" class="form-control" name="iva" value="{{ old('iva') }}" placeholder="IVA">
                                        
                                        <i class="fa fa-building"></i></span>
                                        <span class="input-group-addon">%</span>
                                </div>

                                    @if ($errors->has('iva'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('iva') }}</strong>
                                        </span>
                                    @endif
                            </div>                                                            


                            <div class="form-group {{ $errors->has('desde') ? ' has-error' : '' }}">
                                <span class="input-icon">
                                    <input type="text" class="form-control datepicker" name="desde" value="{{ old('desde') }}" placeholder="Válido Desde...">
                                    
                                    <i class="fa fa-calendar"></i></span>

                                    @if ($errors->has('desde'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('desde') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="alert alert-block alert-info fade in margin-bottom-15">
                                <h4 class="alert-heading margin-bottom-10"><i class="ti-info"></i> Información!</h4>
                                <p>
                                La fecha tope para la validez de este IVA será asignado automáticamente por el sistema una vez que se realice un proximo registro.
                                </p>
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

@section('script')

    <script src="{!! asset('plugins/plantilla/vendor/maskedinput/jquery.maskedinput.min.js'); !!}" src=""></script>
    <script src="{!! asset('plugins/plantilla/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js'); !!}" src=""></script>
    <script src="{!! asset('plugins/plantilla/vendor/autosize/autosize.min.js'); !!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/selectFx/classie.js'); !!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/selectFx/selectFx.js'); !!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/select2/select2.min.js'); !!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js'); !!}"></script>
    <script src="{!! asset('plugins/plantilla/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js'); !!}"></script>

@endsection