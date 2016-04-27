@extends('partials.panel')

@section('titulo', 'Detalles de compra')

@section('contenido')

    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-sm-12">

                <h3>Compra</h3>

                <strong>ID: </strong>{{ $compra->id }} <br>
                <strong>N° Factura: </strong>{{ $compra->numero_factura }}<br>
                <strong>Proveedor: </strong>{{ $compra->proveedor->nombre." | RIF/CI: ".$compra->proveedor->rif }} <br>
                <strong>Método pago: </strong>{{ $compra->metodo_pago->nombre }} <br>
                <strong>Monto: </strong>{{ $compra->inventarios->sum('costo')." ".$conf->moneda }} <br>
                <strong>Monto + IVA ({{$compra->iva->iva."%"}}): </strong><span>{{ $compra->inventarios->sum('costo') + ($compra->inventarios->sum('costo') * ($compra->iva->iva/100))." ".$conf->moneda }}</span> <br>
                <strong>Fecha de compra: </strong>{{ $compra->fecha }} <br>
                <strong>Encargado de registro: </strong>{{ $compra->usuario->name }} <br>
                <strong>Fecha de registro: </strong>{{ $compra->created_at }} <br><br><br>

                <!-- include('flash::message') -->
                @if (count($compra->inventarios) > 0)

                    <h3>Items</h3>
                    
                    <table class="table table-bordered table-hover table-full-width table-responsive" id="sample_1">
                        <thead>
                            <tr>
                                <th rowspan="2">ID</th>
                                <th colspan="3">COMPRA</th>
                                <th colspan="3">VENTA</th>
                                <th rowspan="2">Opciones</th>
                            </tr>
                            <tr>
                                
                                <th>Cantidad</th>
                                <th>Costo</th>
                                <th>+ IVA</th>
                                <th>Cantidad Disponible</th>
                                <th>Costo Unitario</th>
                                <th>+ IVA</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($compra->inventarios->sortByDesc('id') as $inventario)
                                <tr>
                                    <td>{{$inventario->id}}</td>
                                    <td>{{$inventario->cantidad." ".$inventario->item->unidad_compra->nomenclatura}}</td>
                                    <td>{{$inventario->costo." ".$conf->moneda}}</td>
                                    <td>{{ $inventario->costo + ($inventario->costo * ($compra->iva->iva/100))." ".$conf->moneda }}</td>
                                    <td>{{$inventario->cantidad_venta." ".$inventario->item->unidad_compra->unidad_venta->nomenclatura}}</td>
                                    <td>{{$inventario->costo_unitario." ".$conf->moneda}}</td>
                                    <td>{{ $inventario->costo_unitario + ($inventario->costo_unitario * ($compra->iva->iva/100))." ".$conf->moneda }}</td>
                                    <td>* * *</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Totales</th>
                                <th>{{$compra->inventarios->sum('costo')." ".$conf->moneda}}</th>
                                <th colspan="5">{{ $compra->inventarios->sum('costo') + ($compra->inventarios->sum('costo') * ($compra->iva->iva/100))." ".$conf->moneda }}</th>
                            </tr>
                        </tfoot>
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