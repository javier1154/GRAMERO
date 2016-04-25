@extends('partials.panel')

@section('titulo', 'Cargar compra de items')


@section('css')
<style type="text/css">
    .fila-base{ display: none; }
</style>
@endsection

@section('contenido')
    
    <div class="container-fluid container-fullw bg-white">
        <div class="row">
            <div class="col-sm-12">

                @include('flash::message')
                         
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-sm-12">
                
                    @if (count($iva) > 0)
                    
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('inventarios.store') }}">
                            {!! csrf_field() !!}
                            <fieldset>
                                <legend>
                                    Datos de la fáctura
                                </legend>
                                
                                

                                <div class="form-group {{ $errors->has('numero_factura') ? ' has-error' : '' }}">
                                    <span class="input-icon">
                                        <input type="text" class="form-control" name="numero_factura" value="{{ old('numero_factura') }}" placeholder="Número de Factura">
                                        <i class="fa fa-barcode"></i></span>

                                        @if ($errors->has('numero_factura'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('numero_factura') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                
                                <div class="form-group {{ $errors->has('id_proveedor') ? ' has-error' : '' }}">
                                    
                                    {!! Form::select('id_proveedor', $proveedores, old('id_proveedor'), ['class' => 'form-control', 'placeholder' => 'Proveedor', 'required']) !!}
                                        
                                     @if ($errors->has('id_proveedor'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('id_proveedor') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group {{ $errors->has('fecha') ? ' has-error' : '' }}">
                                    <span class="input-icon">
                                        <input type="text" class="form-control" name="fecha" value="{{ old('fecha') }}" placeholder="Fecha de la factura">
                                        <i class="fa fa-calendar"></i></span>

                                        @if ($errors->has('fecha'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fecha') }}</strong>
                                            </span>
                                        @endif
                                </div>

                                <div class="form-group {{ $errors->has('id_metodo_pago') ? ' has-error' : '' }}">
                                    
                                    {!! Form::select('id_metodo_pago', $metodos_pagos, old('id_metodo_pago'), ['class' => 'form-control', 'placeholder' => 'Método de pago', 'required']) !!}
                                        
                                     @if ($errors->has('id_metodo_pago'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('id_metodo_pago') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <input type="hidden" name="id_iva" value="{{ $iva->id }}">
                            
                            </fieldset>

                            <fieldset>
                                <legend>Items</legend>
                                

                                <table class="table table-bordered table-responsive table-striped" id="tabla">
                                    <thead>
                                        <tr>
                                            <th class="col-xs-4">Item</th>
                                            <th class="col-xs-2">Cantidad</th>
                                            <th class="col-xs-2">Costo</th>
                                            <th class="col-xs-3">Costo + Iva (12%)</th>
                                            <th class="col-xs-1">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="fila-base">
                                            <td>
                                                <select name="id_item[]" class="form-control id_item">
                                                    <option value="">-- Item --</option>
                                                    @foreach ($items as $item)
                                                        <option value="{{ $item->id }}" data-unidad="{{ $item->unidad_compra->nomenclatura }}">{{ $item->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="cantidad[]" class="form-control">
                                                    <span class="input-group-addon icantidad"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="costo[]" class="form-control costo">
                                                    <span class="input-group-addon">{{$conf->moneda}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="costo_iva[]" value="0" class="form-control costo_iva" readonly>
                                                    <span class="input-group-addon">{{$conf->moneda}}</span>
                                                </div>
                                            </td>
                                            <td class="eliminar" style="cursor: pointer;">
                                                <i class="fa fa-trash fa-lg"></i>                      
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <select name="id_item[]" class="form-control id_item" required>
                                                    <option value="">-- Item --</option>
                                                    @foreach ($items as $item)
                                                        <option value="{{ $item->id }}" data-unidad="{{ $item->unidad_compra->nomenclatura }}">{{ $item->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="cantidad[]" class="form-control" required>
                                                    <span class="input-group-addon icantidad"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="costo[]" class="form-control costo" required>
                                                    <span class="input-group-addon">{{$conf->moneda}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="costo_unitario[]" value="0" class="form-control costo_unitario" readonly>
                                                    <span class="input-group-addon">{{$conf->moneda}}</span>
                                                </div>
                                            </td>
                                            <td class="eliminar" style="cursor: pointer;">
                                                <i class="fa fa-trash fa-lg"></i>                      
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                <button id="agregar" class="btn btn-primary" style="font-weight: bold; font-size: 20px;" />
                                    +
                                </button>

                            </fieldset>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary pull-right">
                                        Registrar <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                                
                                
                        </form>

                    @else
                        <div class="alert alert-block alert-warning fade in margin-bottom-0    ">
                            <h4 class="alert-heading margin-bottom-10"><i class="ti-info"></i> Error!</h4>
                            <p class="margin-bottom-10">
                            No se puede realizar el registro de compras de ingredientes debido a que no existe un IVA configurado en el sistema para la fecha actual.
                            </p>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    
    <script type="text/javascript">
        

        $(document).ready(function(){

            
            /*
            $('#id_item').change(function(){
                //alert("hola");

                //var rowc = $(this).parents('tr');
                var unidad = $(this).find(':selected').attr('data-unidad');
                $('#icantidad').text(unidad);
                        
                
            });

            
                        
            $('.costo').keyup(function(){
                //alert("hola");

                //var rowc = $(this).parents('tr');
                var costo = $(this).val();

                var costoi = $('.costo_iva');

                if(costo.length > 0){
                    var costo_iva = costo * 12 / 100;
                    var total = (parseFloat(costo) + parseFloat(costo_iva)).toFixed(2);

                    costoi.val(total);
                }else{
                    costoi.val('0');
                }
                

               ///////////////////////////////////////////////////// 
                 var $d = $(this).parent("td");     

                   var col = $d.parent().children().index($d);

                   var row = $d.parent().parent().children().index($d.parent());

                   alert(col + ' ' + row);
                ////////////////////////////////////////////////////
                
                
            });

            */
            
            

            //$('select').change(function(){
              //  alert("hola");

                //var row = $(this).parents('tr');
                //var unidad = $(this).find(':selected').attr('data-unidad');
                //$('#tabla tbody tr .icantidad').text(unidad);

                //row.find("td").eq(1).find('.icantidad').text(unidad);
                //row.find('.icantidad').text(unidad);
                //row.find("td:eq(1) .icantidad").text(unidad);
            //});



            // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#agregar").on('click', function(e){

                e.preventDefault();
                
                $("#tabla tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla tbody");

                //$('#tabla tbody tr:last').after('<tr><td><input type="text" name="id_item[]"></td><td><input type="text" name="cantidad[]"></td><td><input type="text" name="costo[]"></td><td><input type="text" name="id_iva[]"></td><td class="eliminar" style="cursor: pointer;"><i class="fa fa-trash fa-lg"></i></td></tr>');
            });
         
            // Evento que selecciona la fila y la elimina 
            $(document).on("click",".eliminar",function(){

                if(confirm('¿Seguro que desea eliminar esta fila?')){
                    var parent = $(this).parents().get(0);
                    $(parent).remove();
                }
                
            });

            
        });
     
    </script>
@endsection