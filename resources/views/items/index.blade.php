@extends('partials.panel')

@section('titulo', 'Items')

@section('contenido')

    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-sm-12">

                <a href="{{ route('items.create') }}" type="submit" class="btn btn-primary margin-bottom-10">
                    <i class="fa fa-btn fa-sign-in"></i> Registrar
                </a>

                <button type="button" class="btn btn-primary btn-scroll btn-scroll-top ti-arrow-left margin-bottom-10" data-toggle="modal" data-target=".modal-right" style="float: right;">
                    <span>Opciones</span>
                </button>

                @include('flash::message')

                @if (count($items) > 0)
                    
                    <table class="table table-bordered table-hover table-full-width table-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Item</th>
                                <th>Categoría</th>
                                <th>U. Compra</th>
                                <th>Alerta</th>
                                <th>Status</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->id_categoria }}</td>
                                    <td>{{ $item->id_unidad_compra }}</td>
                                    <td>{{ $item->alertar }}</td>
                                    <td>
                                        @if ($item->status == "Habilitado")
                                            <span class="label label-default">{{$item->status}}</span>
                                        @else
                                            <span class="label label-danger">{{$item->status}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        
                                        @if( $item->status == "Habilitado" )
                                            <a href="{{ route('items.status', $item->id) }}" onclick="return confirm('Seguro que desea Deshabilitar al item {{$item->name}}?')">
                                                <i class="fa fa-thumbs-down fa-lg"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('items.status', $item->id) }}" onclick="return confirm('Seguro que desea Habilitar al item {{$item->name}}?')">
                                                <i class="fa fa-thumbs-up fa-lg"></i>
                                            </a>
                                        @endif

                                        <a href="{{ route('items.edit', $item->id) }}">
                                            <i class="fa fa-pencil fa-lg"></i>
                                        </a>

                                        <a href="{{ route('items.destroy', $item->id) }}" onclick="return confirm('Seguro que desea Eliminar el item {{$item->name}}?')">
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
                        No existen items registrados en el sistema.
                        </p>
                    </div>

                @endif

                <!-- Right Aside -->
                <div class="modal fade modal-aside horizontal right modal-right"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Opciones</h4>
                            </div>
                            <div class="modal-body">
                                <a href="#">Cargar compra de ingredientes</a><br>

                                <a href="#">Declarar pérdida de inventario</a><br>

                                <a href="{{ route('categorias.index') }}" target="_blank">Configurar categorías</a><br>

                                <a href="{!! route('unidades.index') !!}" target="_blank">Unidades de medidas</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Right Aside -->

   
            </div>
        </div>
    </div>
@endsection