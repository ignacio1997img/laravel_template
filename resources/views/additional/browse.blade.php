@extends('voyager::master')

@section('page_title', 'Viendo Ingresos')

@if(auth()->user()->hasPermission('browse_servicio'))
    @section('page_header')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title">
                        <i class="voyager-file-text"></i> Servicios Adicionales
                    </h1>
                
                        <a href="{{route('additional_services.create')}}" class="btn btn-success btn-add-new">
                            <i class="voyager-plus"></i> <span>Crear</span>
                        </a>
                    
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    @stop

    @section('content')
            <div class="page-content browse container-fluid">
                @include('voyager::alerts')
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-bordered">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table dataTable table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nro&deg;</th>
                                                <th>Ci / Nit</th>
                                                <th>Nombre / Razon Social</th>
                                                <th>Contacto</th>
                                                <th>Telefono</th>
                                                <th>Tipo</th>
                                                <th>Fecha</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $cont = 1;
                                            @endphp
                                            @forelse ($data as $item)
                                                <tr>
                                                    <td style="width:5%">{{ $cont }}</td>
                                                    <td style="width:5%">{{ $item->nit }}</td>                               
                                                    <td style="width:5%">{{ $item->nombre }}</td>                               
                                                    <td style="width:5%">{{ $item->contacto }}</td>                               
                                                    <td style="width:5%">{{ $item->tel }}</td>                               
                                                    <td style="width:5%">{{ $item->tipocontrato == 0 ? 'Eventual' : 'Contrato' }}</td>                               
                                                    <td style="width:15%">{{date('d/m/Y', strtotime($item->fecha))}}</td>   
                                                    <td>
                                                        @if ($item->status == 4)
                                                            <label class="label label-success">Completa</label>
                                                        @else
                                                            <label class="label label-danger">pendiente</label>
                                                        @endif
                                                    </td>
                                                                                                      
                                                    <td style="width:10%">
                                                    @if(auth()->user()->hasPermission('add_inspeccion'))
                                                        @if($item->status == 1)    
                                                            <a href="{{route('view.inspeccion', $item->id)}}"  title="Ver" class="btn btn-sm btn-info view">
                                                                <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Inspeccion</span>
                                                            </a>
                                                        @endif  
                                                    @endif 
                                                    @if(auth()->user()->hasPermission('add_costo_determinado'))
                                                        @if($item->status == 2)   
                                                            <a href="{{route('view.costo', $item->id)}}"  title="Ver" class="btn btn-sm btn-info view">
                                                                <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Costo Determinado</span>
                                                            </a>                                                         
                                                        @endif 
                                                    @endif 
                                                    @if(auth()->user()->hasPermission('add_programacion_atencion'))                                                     
                                                        @if($item->status == 3)   
                                                            <a href="{{route('view.programacion', $item->id)}}"  title="Ver" class="btn btn-sm btn-info view">
                                                                <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Programacion</span>
                                                            </a>                                                         
                                                        @endif   
                                                    @endif  
                                                    @if(auth()->user()->hasPermission('print'))                                                     

                                                        <a href="{{route('view.success', $item->id)}}"  title="Ver" class="btn btn-sm btn-info view">
                                                                <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Ver</span>
                                                        </a>  
                                                    </td>    
                                                    @endif  

                                                </tr>
                                                @php
                                                    $cont++;
                                                @endphp
                                            @empty
                                                <tr>
                                                    <td colspan="13"><h4 class="text-center">No hay resultados</h4></td>
                                                </tr>
                                            @endforelse
                                                                                  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
        
    @stop


    @section('css')

    @stop

    @section('javascript')
            <script>
                $(document).ready(function(){
                    $('.dataTable').DataTable({
                        language: {
                            sProcessing: "Procesando...",
                            sLengthMenu: "Mostrar _MENU_ registros",
                            sZeroRecords: "No se encontraron resultados",
                            sEmptyTable: "Ningún dato disponible en esta tabla",
                            sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                            sSearch: "Buscar:",
                            sInfoThousands: ",",
                            sLoadingRecords: "Cargando...",
                            oPaginate: {
                                sFirst: "Primero",
                                sLast: "Último",
                                sNext: "Siguiente",
                                sPrevious: "Anterior"
                            },
                            oAria: {
                                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            },
                            buttons: {
                                copy: "Copiar",
                                colvis: "Visibilidad"
                            }
                        },
                        order: [[ 0, 'desc' ]],
                    })
                });



            </script>
    @stop

@else
    @section('content')
        <h1>No tienes permiso</h1>
    @stop
@endif