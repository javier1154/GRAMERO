@extends('partials.panel')

@section('titulo', 'Inventario')

@section('contenido')

    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-sm-12">

                <button type="button" class="btn btn-primary btn-scroll btn-scroll-top ti-arrow-left margin-bottom-10" data-toggle="modal" data-target=".modal-right" style="float: right;">
                    <span>Opciones</span>
                </button>

                @include('flash::message')

                @if (count($inventarios) > 0)
                    
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
                            

                        </tbody>
                    </table>
                @else

                    <div class="alert alert-block alert-info fade in margin-bottom-0    ">
                        <h4 class="alert-heading margin-bottom-10"><i class="ti-info"></i> Información!</h4>
                        <p class="margin-bottom-10">
                        No existen items items disponibles en el inventario.
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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Right Aside -->
   
            </div>
        </div>
    </div>
@endsection