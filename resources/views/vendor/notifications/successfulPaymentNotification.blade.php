@component('mail::message')
<td style="text-align:center;width:526.54px;height:29px">
    <span style="font-family:helvetica,arial,sans-serif;font-size:18pt;color:#105ea8;font-weight:bold">
        ¡Hola, {{$afiliadoEmpresa->name}} {{$afiliadoEmpresa->last_name}}
    </span>
</td>
Gracias por utilizar los servicios de la plataforma EDUCONEXIONES, los siguientes
son los datos de tu transacción:

Usuario: {{$afiliadoEmpresa->user_name}}
Estado de la transacción: Aprobada
Id transacción: {{$request->collection_id}}
Id de preferencia: {{$request->preference_id}}
Descripción: 
Valor de la transacción:{{$price_callback}}
Fecha de la transacción:{{$transaction_date}}
