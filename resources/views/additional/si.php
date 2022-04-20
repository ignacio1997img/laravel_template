
@extends('layouts.template-print-alt')

<!-- @section('page_title', 'Reportes') -->

@section('content')
<!-- 
    <table width="100%">
        <tr>
            <td><img src="{{ asset('images/report.png') }}" alt="GADBENI" width="120px"></td>
            <td style="text-align: right">
                <h3 style="margin-bottom: 0px; margin-top: 5px">
                    REPORTE DE CAJAS <br>
                   
                    <small style="font-size: 11px; font-weight: 100">Impreso por: {{ Auth::user()->name }} <br> {{ date('d/M/Y H:i:s') }}</small>
                </h3>
            </td>
        </tr>
        <tr>
            <tr></tr>
        </tr>
    </table> -->
    <br><br>
    <table style="width: 100%; font-size: 12px" border="1" cellspacing="0" cellpadding="5">
        
            <tr>
                <th colspan="4" style="text-align: left"></th>      
                <th style="text-align: left">FECHA</th>      
                <th style="text-align: left">..</th>                
            </tr>
        
            <tr>
                <th colspan="6" style="text-align: left">DATOS DEL SOLICITANTE</th>                   
            </tr>
            </tr>
			<tr>
			
				<th style="text-align: left">NOMBRE / RAZON SOCIAL:</th>
				<td colspan="4">{{$solicitud->nombre}}</td>
                
				<td  rowspan="11" >Celda Combinada</td>
			</tr>
			<tr>
                <th style="text-align: left">CI / NIT:</th>
				<td colspan="4">{{$solicitud->nit}}</td>
			</tr>
            <tr>
                <th style="text-align: left">DIRECCION:</th>
				<td colspan="4">{{$solicitud->direccion}}</td>
			</tr>
            <tr>
                <th style="text-align: left">REFERENCIA CERCANA:</th>
				<td colspan="4">{{$solicitud->referencia}}</td>
			</tr>
            <tr>
                <th style="text-align: left">CONTACTO:</th>
				<td colspan="4">{{$solicitud->contacto}}</td>
			</tr>
            <tr>
                <th style="text-align: left">TELEFONO:</th>
				<td colspan="4">{{$solicitud->tel}}</td>
			</tr>
            <tr>
                <th style="text-align: left">ADJUNTA REQUISITO:</th>
				<td colspan="4">{{$solicitud->requisito==1  ? 'SI':'NO'}}</td>
			</tr>
<!-- ___________________________ -->
            <tr>
                <th colspan="5" style="text-align: left">SERVICIO SOLICITADO</th>  			

            </tr>
            <tr>
                <th style="text-align: left;">EVENTUAL</th>
				<td >{{$solicitud->contacto}}</td>
				<th style="text-align: left; ">CONTRATO</th>
				<td >{{$solicitud->contacto}}</td>
                <th >FIRMA DEL SOLICITANTE</th>
            </tr>



            <tr>
                <th colspan="3">LIMPIEZA</th>
				<td>{{$solicitud->contacto}}</td>
                <td colspan="1" rowspan="2" >FIRMA DEL SOLICITANTE</td>


            </tr>
            <tr>
                <th colspan="3" >TRANSAPORTE</th>
				<td>{{$solicitud->contacto}}</td>

            </tr>







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