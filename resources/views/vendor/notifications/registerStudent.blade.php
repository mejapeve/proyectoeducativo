@component('mail::message')
    # Hola {{$family->name}} {{$family->last_name}}

Se ha realizado el registro de un estudiante nuevo.
<br>
Estas son las credenciales del estudiante:
<br>
Usuario:{{$student->user_name}}
<br>
Contraseña:{{$student->user_name}}



    Gracias,<br>
    {{ config('app.name') }}
@endcomponent