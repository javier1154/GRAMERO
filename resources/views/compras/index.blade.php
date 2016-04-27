@extends('partials.panel')

@section('titulo', 'Compras')

@section('contenido')

    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-sm-12">

                <a href="{{ route('inventarios.create') }}" type="submit" class="btn btn-primary margin-bottom-10">
                    <i class="fa fa-btn fa-sign-in"></i> Registrar
                </a>

                @include('flash::message')

                @if (count($compras) > 0)
                    
                    <table class="table table-bordered table-hover table-full-width table-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>N° Factura</th>
                                <th>Proveedor</th>
                                <th>Items</th>
                                <th>Método pago</th>
                                <th>Monto</th>
                                <th>Monto + IVA</th>
                                <th>Fecha</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($compras as $compra)
                                <tr>
                                    <td>{{$compra->id}}</td>
                                    <td>{{$compra->numero_factura}}</td>
                                    <td>{{$compra->proveedor->nombre}}</td>
                                    <td>{{count($compra->inventarios)}}</td>
                                    <td>{{$compra->metodo_pago->nombre}}</td>
                                    <td>{{$compra->inventarios->sum('costo')." ".$conf->moneda}}</td>
                                    <td>{{$compra->inventarios->sum('costo') + ($compra->inventarios->sum('costo') * ($compra->iva->iva/100))." ".$conf->moneda}}</td>
                                    <td>{{$compra->fecha}}</td>
                                    <td>
                                        <a href="{{ route('compras.show', $compra->id) }}" target="_blank">
                                            <i class="fa fa-cog fa-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                @else

                    <div class="alert alert-block alert-info fade in margin-bottom-0    ">
                        <h4 class="alert-heading margin-bottom-10"><i class="ti-info"></i> Información!</h4>
                        <p class="margin-bottom-10">
                        No existen compras registradas en el sistema.
                        </p>
                    </div>

                @endif
   
            </div>
        </div>
    </div>
@endsection