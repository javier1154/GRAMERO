@extends('partials.panel')

@section('titulo', 'Configuraciones')

@section('contenido')

    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-sm-6">
                
                <div class="panel panel-primary" style="border: 1px solid #007AFF;">
                    <div class="panel-heading">
                        <h4 class="panel-title">Información de la Empresa</h4>
                         @if (count($configuracion) > 0)
                             <div class="panel-tools">
                                <a href="{{ route('configuraciones.edit', $configuracion->id) }}" onclick="return confirm('¿Desea editar la informacion de la empresa?')">
                                    <i class="fa fa-pencil fa-lg"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="panel-body bg-white text-dark">

                        @if (count($configuracion) > 0)
                            <span class="text-bold">Nombre:</span> {{ $configuracion->empresa }} <br>
                            <span class="text-bold">Dirección:</span> {{ $configuracion->direccion }} <br>
                            <span class="text-bold">RIF:</span> {{ $configuracion->rif }} <br>
                            <span class="text-bold">Moneda:</span> {{ $configuracion->moneda }}
                        @else
                            <div class="alert alert-block alert-info fade in margin-bottom-0    ">
                                <h4 class="alert-heading margin-bottom-10"><i class="ti-info"></i> Información!</h4>
                                <p class="margin-bottom-10">
                                    No se ha registrado la información de la empresa.
                                </p>
                                <p>
                                    <a href="{{ route('configuraciones.create') }}" class="btn btn-info">
                                        Registrar
                                    </a>
                                </p>
                            </div>
                        @endif
                        
                    </div>
                </div>

            </div>

            <div class="col-sm-6">
                
                @if (count($ivas) > 0)
                     <div class="panel panel-primary"  style="border: 1px solid #007AFF;">
                        <div class="panel-heading">
                        <h4 class="panel-title text-bold">IVA: 12 %</h4>
                        </div>
                        <div class="panel-body bg-white text-dark">
                            <table class="table table-bordered table-hover table-full-width table-responsive">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>IVA</th>
                                        <th>Desde</th>
                                        <th>Hasta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ivas as $iva)
                                    <tr>
                                        <td>{{$iva->id}}</td>
                                        <td>{{$iva->iva}}</td>
                                        <td>{{$iva->desde}}</td>
                                        <td>{{$iva->hasta or "----------"}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="alert alert-block alert-info fade in margin-bottom-0">
                        <h4 class="alert-heading margin-bottom-10"><i class="ti-info"></i> Información!</h4>
                        <p class="margin-bottom-10">
                            No se ha registrado información de IVA.
                        </p>
                        <p>
                            <a href="{{ route('ivas.create') }}" class="btn btn-info">
                                Registrar
                            </a>
                        </p>
                    </div>
                @endif

               
            </div>


        </div>
    </div>
@endsection