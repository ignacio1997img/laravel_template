{{-- <link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script> --}}

<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.8.0/sweetalert2.min.js"></script>
@extends('voyager::master')

@section('page_title', 'Registrar Servicios')
@if(1==1)

<style>
    input:focus {
  background: rgb(197, 252, 215);
}
</style>


    @section('page_header')
        
        <div class="container-fluid">
            <div class="row">
                <h1 class="page-title">
                    <i class="voyager-receipt"></i> Añadir Servicios Adicionales
                </h1>
            </div>
        </div>
    @stop

    @section('content')    
        <div id="app">
            <div class="page-content browse container-fluid" >
                @include('voyager::alerts')
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-bordered">
                            <div class="panel-body">                            
                                <div class="table-responsive">
                                    <main class="main">       
                                    {!! Form::open(['route' => 'store.inspeccion', 'class' => 'was-validated'])!!}
                                        <div class="card-body">
                                            <h5>Datos del Solicitante</h5>
                                            <div class="row">
                                                <!-- === -->
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="form-line">                                                    
                                                            <input type="number" disabled value="{{$solicitud->nit}}" class="form-control">
                                                        </div>
                                                        <small>Ci / Nit.</small>
                                                    </div>
                                                </div>    
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <div class="form-line">                                                    
                                                            <input type="text" disabled value="{{$solicitud->nombre}}" class="form-control">
                                                        </div>
                                                        <small>Nombre / Razon Social.</small>
                                                    </div>
                                                </div>                                        
                                            
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" disabled value="{{date('d/m/Y', strtotime($solicitud->fecha))}}" class="form-control">
                                                        </div>
                                                        <small>Fecha.</small>
                                                    </div>
                                                </div>                                             
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <textarea rows="2" disabled class="form-control">{{$solicitud->direccion}}</textarea>
                                                        </div>
                                                        <small>Dirección.</small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <textarea rows="2" disabled class="form-control">{{$solicitud->referencia}}</textarea>
                                                        </div>
                                                        <small>Referencia Cercana.</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- === -->
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="form-line">                                                    
                                                            <input type="text" disabled value="{{$solicitud->contacto}}" class="form-control">
                                                        </div>
                                                        <small>Contacto.</small>
                                                    </div>
                                                </div>    
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="form-line">                                                    
                                                            <input type="text" disabled value="{{$solicitud->tel}}" class="form-control">
                                                        </div>
                                                        <small>Telefono.</small>
                                                    </div>
                                                </div>     
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                        <input type="text" disabled value="{{$solicitud->tipocontrato==0? 'Eventual' : 'Contrato'}}" class="form-control">
                                                        </div>
                                                        <small>Tipo.</small>
                                                    </div>
                                                </div> 
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <select multiple="multiple" class="form-control select2" disabled>
                                                            
                                                                @foreach ($servicio as $item)
                                                                    
                                                                    <option {{$item->servicio == 'Limpieza' ? 'selected' : ''}}>Limpieza</option>
                                                                    <option {{$item->servicio == 'Transporte' ? 'selected' : ''}}>Transporte</option>
                                                                    <option {{$item->servicio == 'Disposicion Final' ? 'selected' : ''}}>Disposicion Final</option>
                                                      
                                                                @endforeach                                                            
                                                            </select>
                                                        </div>
                                                        <small>Servicios.</small>
                                                    </div>
                                                </div>                                            
                                            </div>
                                           
                                            <h5>Requisitos Adjuntado:</h5>                                             
                                            <table id="detalles" style="width:100%" class="table table-bordered table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <!-- <th>Opciones</th> -->
                                                        <th>Tipo</th>
                                                        <th>Referencia</th>
                                                        <th>Firma</th>                    
                                                    </tr>
                                                </thead>     
                                                <tbody>
                                                    @php
                                                        $cont = 1;
                                                    @endphp
                                                    @forelse ($requisito as $item)
                                                        <tr>
                                                            <!-- <td style="width:5%">{{ $cont }}</td> -->
                                                            <td style="width:5%">{{ $item->tipo }}</td>                               
                                                            <td style="width:5%">{{ $item->referencia }}</td>                               
                                                            <td style="width:5%">{{ $item->firma }}</td>                               
                                                                                    
                                                        </tr>
                                                        @php
                                                            $cont++;
                                                        @endphp
                                                    @empty
                                                        <tr>
                                                            <td colspan="13"><h4 class="text-center">Sin Requisito</h4></td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>                                           
                                            </table>      
                                            
                                            

                                            <h5>Inspección Previa</h5>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" name="inspector" class="form-control" required>
                                                        </div>
                                                        <small>Inspector.</small>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="row">
                                                <!-- === -->
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <select name="tiporesiduo[]" multiple="multiple" class="form-control select2" required>
                                                                <option value="">Seleccione una opcion</option>
                                                                @foreach($residuo as $item)
                                                                    <option value="{{$item->nombre}}">{{$item->nombre}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <small>Tipos de Residuo.</small>
                                                    </div>
                                                </div>  

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <select name="lugar[]" multiple="multiple" class="form-control select2" required>
                                                                <option value="">Seleccione una opcion</option>
                                                                @foreach($lugar as $item)
                                                                    <option value="{{$item->nombre}}">{{$item->nombre}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <small>Lugar.</small>
                                                    </div>
                                                </div>                                                                                        
                                            
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <select name="estado[]" multiple="multiple" class="form-control select2" required>
                                                                <option value="">Seleccione una opcion</option>
                                                                @foreach($estado as $item)
                                                                    <option value="{{$item->nombre}}">{{$item->nombre}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <small>Estado.</small>
                                                    </div>
                                                </div>   
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="datetime-local" name="fechainspeccion" class="form-control" required>
                                                        </div>
                                                        <small>Fecha.</small>
                                                    </div>
                                                </div> 


                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <textarea rows="2" name="observacion" class="form-control"></textarea>
                                                        </div>
                                                        <small>Observacion.</small>
                                                    </div>
                                                </div>                                        
                                            </div>
                                            
                                            <input type="hidden" name="id" value="{{$solicitud->id}}">
                                        </div>   
                                        <div class="card-footer">
                                            <button id="btn_guardar" type="submit"  class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                                        </div>   
                                    {!! Form::close() !!}                   
                                    </main>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>          
    @stop


    @section('css')
    <script src="{{ asset('js/app.js') }}" defer></script>      
    @stop

    @section('javascript')
    
        <script>

            $(function()
            {                   

                $('#bt_add').click(function() {
                    agregar();
                });


                // $('#donante').select2();
            })

            // var cont=0;
            var total=0;
            subtotal=[];

            function agregar()
            {
                tipo =$("#tipo").val();
                referencia=$("#referencia").val();
                firma=$("#firma").val();

                var i=1;
                


                if (tipo != '' && referencia != '' && firma != '') {

               
                        var fila='<tr class="selected" id="fila'+i+'">'
                            fila+='<td><button type="button" class="btn btn-danger" onclick="eliminar('+i+')";><i class="voyager-trash"></i></button></td>'
                            fila+='<td><input type="hidden" name="tipo[]" value="'+tipo+'">'+tipo+'</td>'                       
                            fila+='<td><input type="hidden" name="ref[]" value="'+referencia+'">'+referencia+'</td>'                        
                            fila+='<td><input type="hidden" name="firma[]" value="'+firma+'">'+firma+'</td>'
                        fila+='</tr>';

                       
                        
                            // limpiar();
                            $('#detalles').append(fila);
                       
                      
                }
                else
                {
                    swal({
                            title: "Error",
                            text: "Rellene los Campos de las Seccion de Articulo",
                            type: "error",
                            showCancelButton: false,
                            });
                        div = document.getElementById('flotante');
                        div.style.display = '';
                        return;
                }

            }        
            function limpiar()
            {
                $("#precio").val("");
                $("#cantidad").val("");
                $("#caducidad").val("");
                // $("#presentacion").val("");
            }

            //eliminar filas en la tabla
            function eliminar(index)
            {
                // total=total-subtotal[index];
                // $("#total").html("Bs/." + total);
                $("#fila" + index).remove();
                $("#total").html("Bs. "+calcular_total().toFixed(2));
                // evaluar();
                // $('#btn_guardar').attr('disabled', true);
            }

        </script> 
    @stop



    @else
    @section('content')
        <h1>No tienes permiso</h1>
    @stop
@endif