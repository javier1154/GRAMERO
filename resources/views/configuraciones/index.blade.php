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
                        <h4 class="panel-title text-bold">IVA: {{$iva_actual->iva}} %</h4>
                        @if (count($ivas) > 0)
                             <div class="panel-tools">
                                <a href="{{ route('ivas.create') }}" onclick="return confirm('¿Desea registrar un nuevo IVA?')">
                                    <i class="fa fa-plus fa-lg"></i>
                                </a>
                            </div>
                        @endif
                        </div>
                        <div class="panel-body bg-white text-dark">
                            <table class="table table-bordered table-hover table-full-width table-responsive" style="margin: 0px;">
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
                                        <td>{{$iva->iva}} %</td>
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


        
        <div class="row">
            <br><br>
            <center>
                <a href="{{ route('metodosPagos.create') }}" type="submit" class="btn btn-primary margin-bottom-10">
                    <i class="fa fa-btn fa-sign-in"></i> Registrar método de pago
                </a>
            </center>

            <div class="col-sm-6">
                
                @if (count($metodos->where('tipo','Clientes')) > 0)
                     <div class="panel panel-primary"  style="border: 1px solid #007AFF;">
                        <div class="panel-heading">
                            <h4 class="panel-title">Métodos de pagos para clientes</h4>
                        </div>
                        <div class="panel-body bg-white text-dark">
                            <table class="table table-bordered table-hover table-full-width table-responsive" style="margin: 0px;">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Status</th>
                                        <th>Opción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($metodos->where('tipo','Clientes') as $metodo)
                                        <tr>
                                            <td>{{$metodo->nombre}}</td>
                                            <td>
                                                @if ($metodo->status == "Habilitado")
                                                    <span class="label label-default">{{$metodo->status}}</span>
                                                @else
                                                    <span class="label label-danger">{{$metodo->status}}</span>
                                                @endif
                                            </td>
                                            <td>

                                                @if( $metodo->status == "Habilitado" )
                                                    <a href="{{ route('metodosPagos.status', $metodo->id) }}" onclick="return confirm('Seguro que desea Deshabilitar el método {{$metodo->nombre}}?')">
                                                        <i class="fa fa-thumbs-down fa-lg"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('metodosPagos.status', $metodo->id) }}" onclick="return confirm('Seguro que desea Habilitar el método {{$metodo->nombre}}?')">
                                                        <i class="fa fa-thumbs-up fa-lg"></i>
                                                    </a>
                                                @endif

                                                <a href="{{ route('metodosPagos.destroy', $metodo->id) }}" onclick="return confirm('Seguro que desea Eliminar el método {{$metodo->nombre}}?')">
                                                    <i class="fa fa-trash fa-lg"></i>
                                                </a>
                                            </td>
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
                            No se han registrado métodos de pagos para proveedores.
                        </p>
                    </div>
                @endif

            </div>

            <div class="col-sm-6">
                
                @if (count($metodos->where('tipo','Proveedores')) > 0)
                     <div class="panel panel-primary"  style="border: 1px solid #007AFF;">
                        <div class="panel-heading">
                            <h4 class="panel-title">Métodos de pagos para proveedores</h4>
                        </div>
                        <div class="panel-body bg-white text-dark">
                            <table class="table table-bordered table-hover table-full-width table-responsive" style="margin: 0px;">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Status</th>
                                        <th>Opción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($metodos->where('tipo','Proveedores') as $metodo)
                                        <tr>
                                            <td>{{$metodo->nombre}}</td>
                                            <td>
                                                @if ($metodo->status == "Habilitado")
                                                    <span class="label label-default">{{$metodo->status}}</span>
                                                @else
                                                    <span class="label label-danger">{{$metodo->status}}</span>
                                                @endif
                                            </td>
                                            <td>

                                                @if( $metodo->status == "Habilitado" )
                                                    <a href="{{ route('metodosPagos.status', $metodo->id) }}" onclick="return confirm('Seguro que desea Deshabilitar el método {{$metodo->nombre}}?')">
                                                        <i class="fa fa-thumbs-down fa-lg"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('metodosPagos.status', $metodo->id) }}" onclick="return confirm('Seguro que desea Habilitar el método {{$metodo->nombre}}?')">
                                                        <i class="fa fa-thumbs-up fa-lg"></i>
                                                    </a>
                                                @endif

                                                <a href="{{ route('metodosPagos.destroy', $metodo->id) }}" onclick="return confirm('Seguro que desea Eliminar el método {{$metodo->nombre}}?')">
                                                    <i class="fa fa-trash fa-lg"></i>
                                                </a>
                                            </td>
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
                            No se han registrado métodos de pagos para proveedores.
                        </p>
                    </div>
                @endif

               
            </div>


        </div>


    </div>
@endsection