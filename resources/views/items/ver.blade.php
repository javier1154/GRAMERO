@extends('partials.panel')

@section('titulo', 'Detalles de Item')

@section('contenido')

    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-sm-12">

                <h3>Item</h3>
                
                <strong>ID: </strong>{{ $item->id }} <br>
                <strong>Nombre: </strong>{{ $item->nombre }}<br>
                <strong>Categoría: </strong>{{ $item->categoria->nombre }} <br>
                <strong>Unidad de Compra: </strong>{{ $item->unidad_compra->nombre." (".$item->unidad_compra->nomenclatura.")" }} <br>
                <strong>Unidad de Venta: </strong>{{ $item->unidad_compra->unidad_venta->nombre." (".$item->unidad_compra->unidad_venta->nomenclatura.")" }} <br>
                <strong>Alerta: </strong>{{ $item->alertar." ".$item->unidad_compra->nomenclatura }} <br>
                <strong>Status: </strong><span>{{ $item->status }}</span> <br>
                <strong>Fecha de registro: </strong>{{ $item->created_at }} <br><br><br>

                <!-- include('flash::message') -->
                @if (count($item->inventarios) > 0)

                    <h3>Inventario</h3>
                    
                    <table class="table table-bordered table-hover table-full-width table-responsive" id="sample_1">
                        <thead>
                            <tr>
                                <th rowspan="2">ID</th>
                                <th colspan="2">COMPRA</th>
                                <th colspan="2">VENTA</th>
                                <th rowspan="2">N° Factura</th>
                                <th rowspan="2">Opciones</th>
                            </tr>
                            <tr>
                                
                                <th>Cantidad</th>
                                <th>Costo</th>
                                <th>Cantidad Disponible</th>
                                <th>Costo Unitario</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->inventarios->sortByDesc('id') as $inventario)
                                <tr>
                                    <td>{{$inventario->id}}</td>
                                    <td>{{$inventario->cantidad." ".$inventario->item->unidad_compra->nomenclatura}}</td>
                                    <td>{{$inventario->costo}}</td>
                                    <td>{{$inventario->cantidad_venta." ".$inventario->item->unidad_compra->unidad_venta->nomenclatura}}</td>
                                    <td>{{$inventario->costo_unitario}}</td>
                                    <td>{{$inventario->factura_compra->numero_factura}}</td>
                                    <td>* * *</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                @else
                
                    <div class="alert alert-block alert-info fade in margin-bottom-0    ">
                        <h4 class="alert-heading margin-bottom-10"><i class="ti-info"></i> Información!</h4>
                        <p class="margin-bottom-10">
                        Este item nunca ha sido registrado en el inventario.
                        </p>
                    </div>

                @endif

   
            </div>
        </div>
    </div>
@endsection