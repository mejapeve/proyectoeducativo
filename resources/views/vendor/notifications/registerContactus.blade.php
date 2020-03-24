@component('mail::message')
# Hola, se ha realizado una nuevo registro de contactenos por parte del correo {{$data['email']}}.
<br>
<strong>Asunto:</strong>
<br>
{{$data['affair']}}
<br>
<br>
<strong>Mensaje:</strong>
<br>
{{$data['message']}}
<br>
<strong>Nº radicado:</strong>
1
<br>
Gracias.
<br>
{{ config('app.name') }}
@endcomponent