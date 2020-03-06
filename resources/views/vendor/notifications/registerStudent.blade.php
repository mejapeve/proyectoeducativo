@component('mail::message')
    # Hola {{$family->name}} {{$family->last_name}}
<br>
    Se ha realizado el registro de un estudiante nuevo.
<br>
    Estas son las credenciales del estudiante:
<br>
<br>
<strong>Usuario:{{$student->user_name}}</strong>
<br>
<strong>Contraseña:{{$student->user_name}}</strong>
<br>
<br>
Gracias.
<br>
{{ config('app.name') }}
@endcomponent