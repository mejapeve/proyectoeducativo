@component('mail::message')
    # Hola {{$full_name}}
<br>
    Se ha realizado una ampliciación en la fecha de expiración para el plan {{$plan}}.
<br>
    <strong>fecha de expriración {{$originalEndDate}}, se cambio ha {{$end_date}}</strong>
<br>
    Gracias.
<br>
    {{ config('app.name') }}
@endcomponent