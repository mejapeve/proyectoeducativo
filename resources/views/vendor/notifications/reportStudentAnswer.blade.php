@component('mail::message')
# Hola {{$family->name}} {{$family->last_name}}
<br>
El estudainte <strong>{{$student->name}}</strong> <strong>{{$student->last_name}}</strong>
ha contestado las preguntas de la secuecnia: <strong>{{$sequence->name}}</strong> del momento: <strong>{{$moment->name}}</strong> .
<br>
Estas son las preguntas, respuestas del estudiante y respuestas correctas:
<br>
@foreach($data as $questionAnswer)
Pregunta:{{$questionAnswer['tittle']}}
<br>
Repuesta estudiante:{{$questionAnswer['answer_student']}}
<br>
Repuesta correcta:{{$questionAnswer['answer_question']}}
<br>
@if($questionAnswer['is_correct'])
La respuesta del estudiante es correcta:si
@else
La respuesta del estudiante es correcta:no
@endif
<br>
<hr>
@endforeach
<br>
<br>
Gracias.
<br>
{{ config('app.name') }}
@endcomponent