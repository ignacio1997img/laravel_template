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
                                    {!! Form::open(['route' => 'additional_services.store', 'class' => 'was-validated'])!!}
                                        <div class="card-body">
                                            <h5>Datos del Solicitante</h5>
                                            <div class="row">
                                                <!-- === -->
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="form-line">                                                    
                                                            <input type="number" name="nit" min="0" class="form-control" title="Ci/Nit">
                                                        </div>
                                                        <small>Ci / Nit.</small>
                                                    </div>
                                                </div>    
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <div class="form-line">                                                    
                                                            <input type="text" name="nombre" class="form-control" title="Nombre / Razon Social.">
                                                        </div>
                                                        <small>Nombre / Razon Social.</small>
                                                    </div>
                                                </div>                                        
                                            
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="date"  class="form-control" name="fecha" required>
                                                        </div>
                                                        <small>Fecha.</small>
                                                    </div>
                                                </div>                                             
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <textarea name="direccion" rows="2" class="form-control"></textarea>
                                                        </div>
                                                        <small>Dirección.</small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <textarea name="referencia" rows="2" class="form-control"></textarea>
                                                        </div>
                                                        <small>Referencia Cercana.</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- === -->
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <div class="form-line">                                                    
                                                            <input type="text" name="contacto" class="form-control" title="Contacto">
                                                        </div>
                                                        <small>Contacto.</small>
                                                    </div>
                                                </div>    
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="form-line">                                                    
                                                            <input type="text" name="telefono" class="form-control" title="Telefono.">
                                                        </div>
                                                        <small>Telefono.</small>
                                                    </div>
                                                </div>     
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <select name="tipocontrato" class="form-control select2" required>
                                                                <option value="">Seleccione una opcion</option>
                                                                <option value="0">Eventual</option>
                                                                <option value="1">Contrato</option>                                                                
                                                            </select>
                                                        </div>
                                                        <small>Tipo.</small>
                                                    </div>
                                                </div> 
                                                <div class="col-sm-2">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <select name="tiposervicio[]" multiple="multiple" class="form-control select2" required>
                                                                <option value="">Seleccione una opcion</option>
                                                                <option value="Limpieza">Limpieza</option>
                                                                <option value="Transporte">Transporte</option>                                                                
                                                                <option value="Disposicion Final">Disposicion Final</option>                                                                
                                                            </select>
                                                        </div>
                                                        <small>Servicios.</small>
                                                    </div>
                                                </div>                                            
                                            </div>
                                           
                                            <h5>Requisitos *(Opcional):</h5>     
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="tipo" class="form-control" title="Tipo">
                                                        </div>
                                                        <small>Tipo.</small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="referencia" class="form-control" title="Referencia">
                                                        </div>
                                                        <small>Referencia.</small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="firma" class="form-control" title="Firma">
                                                        </div>
                                                        <small>Firma.</small>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <button type="button" id="bt_add" class="btn btn-success"><i class="voyager-basket"></i> Agregar Artículo</button>
                                                </div>
                                            </div>
                                        
                                            <table id="detalles" class="table table-bordered table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Opciones</th>
                                                        <th>Tipo</th>
                                                        <th>Referencia</th>
                                                        <th>Firma</th>                    
                                                    </tr>
                                                </thead>                                                
                                            </table>                                           
                                            
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

                       
                        
                            limpiar();
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
                $("#firma").val("");
                $("#referencia").val("");
                $("#tipo").val("");
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