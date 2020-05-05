@component('mail::message')
    # Hola {{$full_name}}
<br>
    Te notificamos una ampliciación en la fecha de expiración para el plan {{$plan}},con
<br>
    <strong>fecha de expriración {{$originalEndDate}}. Este plan ahora expira para el dia {{$end_date}}</strong>
<br>
    Gracias.
<br>
    {{ config('app.name') }}
@endcomponent