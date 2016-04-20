@extends('partials.panel')

@section('titulo', 'Categorías')

@section('contenido')

    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-sm-12">

                <div class="row">
                    <a href="{{ route('categorias.create') }}" type="submit" class="btn btn-primary margin-bottom-20 margin-left-30">
                        <i class="fa fa-btn fa-sign-in"></i> Registrar
                    </a>
                </div>

                @include('flash::message')
                
                <div class="col-sm-6">
                
                    <div class="panel panel-primary" style="border: 1px solid #007AFF;">
                        <div class="panel-heading">
                            <h4 class="panel-title">Items</h4>
                        </div>
                        <div class="panel-body bg-white text-dark">

                            @if (count($cat_items) > 0)
    
                                <table class="table table-bordered table-hover table-full-width table-responsive" style="margin: 0px;">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Status</th>
                                            <th>Opción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cat_items as $categoria)
                                            <tr>
                                                <td>{{$categoria->nombre}}</td>
                                                <td>
                                                    @if ($categoria->status == "Habilitado")
                                                        <span class="label label-default">{{$categoria->status}}</span>
                                                    @else
                                                        <span class="label label-danger">{{$categoria->status}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('categorias.destroy', $categoria->id) }}" onclick="return confirm('Seguro que desea Eliminar la categoría {{$categoria->nombre}}?')">
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
                            <h4 class="panel-title">Productos</h4>
                        </div>
                        <div class="panel-body bg-white text-dark">

                            @if (count($cat_productos) > 0)
                                
                                <table class="table table-bordered table-hover table-full-width table-responsive" style="margin: 0px;">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Status</th>
                                            <th>Opción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cat_productos as $categoria)
                                            <tr>
                                                <td>{{$categoria->nombre}}</td>
                                                <td>
                                                    @if ($categoria->status == "Habilitado")
                                                        <span class="label label-default">{{$categoria->status}}</span>
                                                    @else
                                                        <span class="label label-danger">{{$categoria->status}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('categorias.destroy', $categoria->id) }}" onclick="return confirm('Seguro que desea Eliminar la categoría {{$categoria->nombre}}?')">
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
                                        No se ha registrado categorías para productos.
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