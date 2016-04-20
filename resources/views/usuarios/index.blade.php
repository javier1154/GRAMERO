@extends('partials.panel')

@section('titulo', 'Usuarios')

@section('contenido')

    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-sm-12">
                
                <a href="{{ route('usuarios.create') }}" type="submit" class="btn btn-primary margin-bottom-10">
                    <i class="fa fa-btn fa-sign-in"></i> Registrar
                </a>

                <button type="button" class="btn btn-primary btn-scroll btn-scroll-top ti-arrow-left margin-bottom-10" data-toggle="modal" data-target=".modal-right">
                    <span>Opciones</span>
                </button>

                @include('flash::message')

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
                                    @if( $usuario->status == "Habilitado" )
                                        <a href="{{ route('usuarios.status', $usuario->id) }}" onclick="return confirm('Seguro que desea Deshabilitar al usuario {{$usuario->name}}?')">
                                            <i class="fa fa-thumbs-down fa-lg"></i>
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
                                Modal Content
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary">
                                    Save changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Right Aside -->

   
            </div>
        </div>
    </div>
@endsection