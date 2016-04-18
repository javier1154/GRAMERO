@extends('partials.panel')

@section('titulo', 'Usuarios')

@section('contenido')

    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-sm-12">
                
                <a href="{{ route('usuarios.create') }}" type="submit" class="btn btn-primary margin-bottom-5">
                    <i class="fa fa-btn fa-sign-in"></i> Registrar
                </a>

                <table class="table table-bordered table-hover table-full-width table-responsive" id="sample_1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->id}}</td>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>
                                    @if ($usuario->tipo == "Cajero")
                                        <span class="label label-info">{{$usuario->tipo}}</span>
                                    @elseif ($usuario->tipo == "Administrador")
                                        <span class="label label-success">{{$usuario->tipo}}</span>
                                    @elseif ($usuario->tipo == "Administrador Maestro")
                                        <span class="label label-default">{{$usuario->tipo}}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($usuario->status == "Habilitado")
                                        <span class="label label-default">{{$usuario->status}}</span>
                                    @else
                                        <span class="label label-danger">{{$usuario->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    @if( $usuario->status == "Activo" )
                                        <a href="{{ route('usuarios.status', $usuario->id) }}" onclick="return confirm('Seguro que desea Deshabilitar al usuario {{$usuario->name}}?')">
                                            <i class="fa fa-thumbs-down fa-lg"></i>D
                                        </a>
                                    @else
                                        <a href="{{ route('usuarios.status', $usuario->id) }}" onclick="return confirm('Seguro que desea Habilitar al usuario {{$usuario->name}}?')">
                                            <i class="fa fa-thumbs-up fa-lg"></i>
                                        </a>
                                    @endif

                                    <a href="{{ route('usuarios.edit', $usuario->id) }}">
                                        <i class="fa fa-pencil fa-lg"></i>
                                    </a>

                                    <a href="{{ route('usuarios.destroy', $usuario->id) }}" onclick="return confirm('Seguro que desea Eliminar al usaurio {{$usuario->name}}?')">
                                        <i class="fa fa-trash fa-lg"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
   
            </div>
        </div>
    </div>
@endsection