@extends('layouts.template-print-alt')

@section('page_title', 'PRINT')

@section('content')

    <table style="width: 100%; font-size: 12px" border="1" cellspacing="0" cellpadding="5">
        
            <tr>
                <th style="text-align: left">FECHA: {{date('d/m/Y', strtotime($solicitud->fecha))}}</th>    
                <th colspan="4">SERVICIOS ADICIONALES</th> 
                <th style="text-align: left">NRO: {{$solicitud->id}}</th>      
                             
            </tr>
        
            <tr>
                <th colspan="6" bgcolor="yellow" style="text-align: left">DATOS DEL SOLICITANTE</th>                   
            </tr>
            
			<tr>
			
				<th style="text-align: left">NOMBRE/RAZON SOCIAL:</th>
				<td colspan="3">{{$solicitud->nombre}}</td>
                
				<th colspan="2" rowspan="10" valign="top">CROQUIS UBICACION</th>
			</tr>
			<tr>
                <th style="text-align: left">CI / NIT:</th>
				<td colspan="3">{{$solicitud->nit}}</td>
			</tr>
            <tr>
                <th style="text-align: left">DIRECCION:</th>
				<td colspan="3">{{$solicitud->direccion}}</td>
			</tr>
            <tr>
                <th style="text-align: left">REFERENCIA CERCANA:</th>
				<td colspan="3">{{$solicitud->referencia}}</td>
			</tr>
            <tr>
                <th style="text-align: left">CONTACTO:</th>
				<td colspan="3">{{$solicitud->contacto}}</td>
			</tr>
            <tr>
                <th style="text-align: left">TELEFONO:</th>
				<td colspan="3">{{$solicitud->tel}}</td>
			</tr>
            <tr>
                <th style="text-align: left">ADJUNTA REQUISITO:</th>
				<td colspan="3">{{$solicitud->requisito==1  ? 'SI':'NO'}}</td>
			</tr>
<!-- ___________________________ -->
            <tr>
                <th colspan="4" bgcolor="yellow" style="text-align: left">SERVICIO SOLICITADO</th>  			

            </tr>
            <tr>
                <th colspan="2">{{$solicitud->tipocontrato==0? 'EVENTUAL' : 'CONTRATO'}}</th>
                <th colspan="2">FIRMA DEL SOLICITANTE</th>
            </tr>
                    @php
                        $aux ="";
                        $data ="";
                        $i=0;
                    
                        foreach ($servicio as $item)
                        {
                            $data= $data.$aux.$item->servicio;
                            $aux=", ";
                        }
                    @endphp
            <tr style="height: 60px;">

                <td colspan="2" valign="top">
                     {{$data}}
                </td>
                <td colspan="2" rowspan="1" ></td>
            </tr>


<!-- inspeccion previa -->
            <tr>
                <th colspan="6" bgcolor="yellow" style="text-align: left">INSPECCION PREVIA</th>                   
            </tr>
            <tr>
                <th>FECHA</th>
                <td colspan="2">{{date('d/m/Y', strtotime($solicitud->fechainspeccion))}}</td>
                <th>HORA</th>
                <td colspan="2">{{date('H:i:s', strtotime($solicitud->fechainspeccion))}}</td>
            </tr>
            <tr>
                <th>INSPECTOR:</th>
                <td colspan="5">{{$solicitud->inspector}}</td>
            </tr>

<!-- TIPO DE RESIDUO -->
            <tr>        
                <th colspan="6" bgcolor="yellow" style="text-align: left">TIPO DE RESIDUO</th>                   
            </tr>
            <tr>
                <td colspan="6">{{$solicitud->residuo}}</td>
            </tr>

<!-- TIPO DE RESIDUO -->

            <tr>        
                <th colspan="6" bgcolor="yellow" style="text-align: left">ALMACENAMIENTO</th>                   
            </tr>
            <tr>
                <th style="text-align: left">LUGAR</th>
                <td style="text-align: left" colspan="5">{{$solicitud->lugar}}</td>
            </tr>
            <tr>
                <th style="text-align: left">ESTADO</th>
                <td style="text-align: left" colspan="5">{{$solicitud->estado}}</td>
            </tr>

<!-- OBSERVACIONES -->

            <tr>        
                <th colspan="6" bgcolor="yellow" style="text-align: left">OBSERVACIONES</th>                   
            </tr>
            <tr>
                <td colspan="4" rowspan="2" style="text-align: left" valign="top">{{$solicitud->observacion}}</td>

                <th colspan="2">FIRMA Y SELLO</th>            
            </tr>
            <tr style="height: 70px;">
                <th colspan="2" valign="bottom">{{$solicitud->usuarioinspeccion}}</th>            
            </tr>


<!-- COSTO -->

            <tr>        
                <th bgcolor="yellow" colspan="6">COSTO DETERMINADO</th>                   
            </tr>
            <tr>
                <th colspan="1">SERVICIO</th>            
                <th colspan="3">MONTO BS</th>            
                <th colspan="2">FIRMA Y SELLO</th>            
            </tr>
            <tr style="height: 70px;">
                <th colspan="1">{{$solicitud->tipocontrato==0? 'Eventual' : 'Contrato'}}</th>            
                <th colspan="3">{{$solicitud->contrato}} Bs.</th>            
                <th colspan="2" valign="bottom">{{$solicitud->usuariocosto}}</th>            
            </tr>


<!-- PROGRAMACION DE LA ATENCION -->

            <tr>        
                <th colspan="6" bgcolor="yellow" style="text-align: left">PROGRAMACION DE LA ATENCION</th>                   
            </tr>
            <tr>
                <th>FECHA</th>
                <td colspan="2">{{date('d/m/Y', strtotime($solicitud->fechaprogramacion))}}</td>
                <th>HORA</th>
                <td colspan="2">{{date('H:i:s', strtotime($solicitud->fechaprogramacion))}}</td>
            </tr>
            

            <!-- CONTRATO -->
            <tr bgcolor="yellow" style="height: 5px;">
                <th colspan="4">{{$solicitud->tipocontrato==0? 'EVENTUAL' : 'CONTRATO'}}</th>  
                <th colspan="2">FIRMA Y SELLO</th>            
            </tr>

            @if($solicitud->tipocontrato == 1)
                <tr>
                    <th colspan="1">FRECUENCIA SEMANAL</th>  
                    <td colspan="1" style="text-align: left">{{$solicitud->frecuencia}}</td>
                    <td colspan="2" style="text-align: left">{{$solicitud->obs}}</td>                
                    
                    <th colspan="2" rowspan="3" valign="bottom">{{$solicitud->usuarioprogramacion}}</th>
                </tr>
                <tr>
                    <th colspan="1">TURNO</th>  
                    <td colspan="3" style="text-align: left">{{$solicitud->turno}}</td>
                </tr>
                <tr>
                    <th colspan="1">METODO CONTROL</th>  
                    <td colspan="3" style="text-align: left">Libro Control</td>
                </tr>
            @else
                <tr style="height: 70px;">
                    <!-- <th colspan="1">FRECUENCIA SEMANAL</th>  
                    <td colspan="1" style="text-align: left">{{$solicitud->frecuencia}}</td> -->
                    <td colspan="4" style="text-align: left" valign="top">{{$solicitud->obs}}</td>                
                    
                    <th colspan="2" rowspan="1" valign="bottom">{{$solicitud->usuarioprogramacion}}</th>
                </tr>
            @endif
            


            



        <!-- <thead>
            <tr>
                <th colspan="3" style="text-align: left">INSPECCION PREVIA</th>                   
            </tr>
        </thead>
        <thead>
            <tr>
                <th colspan="3" style="text-align: left">TIPO RESIDUO</th>                   
            </tr>
        </thead>
        <tbody>
            
            <tr colspan="2">
                <td>NOMBRE/RAZON SOCIAL:</td>
            </tr> 
        </tbody>
        <thead>
            <tr>
                <th colspan="3" style="text-align: left">ALMACENAMIENTO</th>                   
            </tr>
        </thead>
        <tbody>
            
            <tr colspan="2">
                <th style="text-align: left">LUGAR</th>
                <td>ignacio Molina Guzman</td>
            </tr> 
            <tr>
                <th style="text-align: left">ESTADO</th>
                <td>ignacio Molina Guzman</td>
            </tr> 
        </tbody>
        <thead>
            <tr>
                <th colspan="3" style="text-align: left">OBSERVACIONES</th>                   
            </tr>
        </thead>
        <tbody>
            
            <tr colspan="2">
                <td>ignacio Molina Guzman</td>
            </tr> 
            <tr>
                <thead>
                    <tr>
                        <th style="text-align: left">OBSERVACIONES</th>                   
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ignacio Molina Guzman</td>
                    </tr> 
                </tbody>
            </tr> 
        </tbody>
        <thead>
            <tr>
                <th colspan="3" >COSTO DETERMINADO</th>                   
            </tr>
        </thead>
        <thead>
            <tr>
                <th colspan="3" style="text-align: left">PROGRAMACION DE LA ATENCION</th>                   
            </tr>
        </thead> -->
    </table>

@endsection