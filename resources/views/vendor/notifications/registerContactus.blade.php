@component('mail::message')
# Hola, se ha realizado una solicitud por parte del correo {{$data['email']}}.
<br>
<strong>Asunto:</strong>
<br>
{{$data['affair']}}
<br>
<strong>Mensaje:</strong>
<br>
{{$data['message']}}
<br>
<strong>Nº radicado:</strong>
{{$data['contacus_id']}}
<br>
Gracias.
<br>
{{ config('app.name') }}
@endcomponent