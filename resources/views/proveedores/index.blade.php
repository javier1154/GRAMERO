@extends('partials.panel')

@section('titulo', 'Proveedores')

@section('contenido')

    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-sm-12">
                
                <a href="{{ route('proveedores.create') }}" type="submit" class="btn btn-primary margin-bottom-10">
                    <i class="fa fa-btn fa-sign-in"></i> Registrar
                </a>

                @include('flash::message')
                
                @if(count($proveedores) > 0)

                    <table class="table table-bordered table-hover table-full-width table-responsive" id="sample_1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>RIF/CI</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Enc. Reg.</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proveedores as $proveedor)
                                <tr>
                                    <td>{{$proveedor->id}}</td>
                                    <td>{{$proveedor->rif}}</td>
                                    <td>{{$proveedor->nombre}}</td>
                                    <td>{{$proveedor->direccion}}</td>
                                    <td>{{$proveedor->telefono}}</td>
                                    <td>{{$proveedor->email}}</td>
                                    <td>
                                        @if ($proveedor->status == "Habilitado")
                                            <span class="label label-default">{{$proveedor->status}}</span>
                                        @else
                                            <span class="label label-danger">{{$proveedor->status}}</span>
                                        @endif
                                    </td>
                                    <td>{{$proveedor->usuario->name}}</td>
                                    <td>
                                        @if( $proveedor->status == "Habilitado" )
                                            <a href="{{ route('proveedores.status', $proveedor->id) }}" onclick="return confirm('Seguro que desea Deshabilitar al proveedor {{$proveedor->nombre}}?')">
                                                <i class="fa fa-thumbs-down fa-lg"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('proveedores.status', $proveedor->id) }}" onclick="return confirm('Seguro que desea Habilitar al proveedor {{$proveedor->nombre}}?')">
                                                <i class="fa fa-thumbs-up fa-lg"></i>
                                            </a>
                                        @endif

                                        <a href="{{ route('proveedores.edit', $proveedor->id) }}">
                                            <i class="fa fa-pencil fa-lg"></i>
                                        </a>

                                        <a href="{{ route('proveedores.destroy', $proveedor->id) }}" onclick="return confirm('Seguro que desea Eliminar al proveedor {{$proveedor->nombre}}?')">
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
                        No existen proveedores registrados en el sistema.
                        </p>
                    </div>

                @endif

            </div>
        </div>
    </div>
@endsection