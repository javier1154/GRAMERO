@extends('partials.panel')

@section('titulo', 'Unidades')

@section('contenido')

    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-sm-12">

                @include('flash::message')
                
                <div class="col-sm-6">
                
                    <div class="panel panel-primary" style="border: 1px solid #007AFF;">
                        <div class="panel-heading">
                            <h4 class="panel-title">Compras</h4>
                            <div class="panel-tools">
                                <a href="{{ route('unidades.create') }}" onclick="return confirm('¿Desea registrar una nueva unidad de compra?')">
                                    <i class="fa fa-plus fa-lg"></i>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body bg-white text-dark">

                            @if (count($unidades_compras) > 0)
    
                                <table class="table table-bordered table-hover table-full-width table-responsive" style="margin: 0px;">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Nomenclatura</th>
                                            <th>Opción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($unidades_compras as $unidad)
                                            <tr>
                                                <td>{{$unidad->nombre}}</td>
                                                <td>{{$unidad->nomenclatura}}</td>
                                                <td>
                                                    <a href="{{ route('unidades.destroy', $unidad->id) }}" onclick="return confirm('Seguro que desea Eliminar la unidad de compra {{$unidad->nombre}}?')">
                                                        <i class="fa fa-trash fa-lg"></i>
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
                                        No se ha registrado categorías para items.
                                    </p>
                                </div>
                            @endif
                            
                        </div>
                    </div>

                </div>


                <div class="col-sm-6">
                
                    <div class="panel panel-primary" style="border: 1px solid #007AFF;">
                        <div class="panel-heading">
                            <h4 class="panel-title">Ventas</h4>
                            @if (count($unidades_compras) > 0)
                                <div class="panel-tools">
                                    <a href="{{ route('unidadesVentas.create') }}" onclick="return confirm('¿Desea registrar una nueva unidad de venta?')">
                                        <i class="fa fa-plus fa-lg"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="panel-body bg-white text-dark">

                            @if (count($unidades_ventas) > 0)
                                
                                <table class="table table-bordered table-hover table-full-width table-responsive" style="margin: 0px;">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Nomenclatura</th>
                                            <th>Unidad Compra</th>
                                            <th>Equivalencia</th>
                                            <th>Opción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($unidades_ventas as $unidad)
                                            <tr>
                                                <td>{{$unidad->nombre}}</td>
                                                <td>{{$unidad->nomenclatura}}</td>
                                                <td>{{$unidad->id_unidad_compra}}</td>
                                                <td>{{$unidad->equivalencia or "-----------"}}</td>
                                                <td>
                                                    <a href="{{ route('unidadesVentas.destroy', $unidad->id) }}" onclick="return confirm('Seguro que desea Eliminar la unidad de venta {{$unidad->nombre}}?')">
                                                        <i class="fa fa-trash fa-lg"></i>
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
                                        No se han registrado unidades de ventas. Para registrar unidades de ventas es necesario que existan unidades de compras dsponibles en el sistema.
                                    </p>
                                </div>
                            @endif
                            
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection