@component('mail::message')
# Hola {{$family->name}} {{$family->last_name}}
<br>
Te escribimos para contarte que <strong>{{$student->name}}</strong> <strong>{{$student->last_name}}</strong>
acaba de realiza el test de pregunta cerrada del momento <strong><i>{{$moment->name}}</i></strong>, en la guía de aprendizaje: <strong><i>{{$sequence->name}}</i></strong>,
y su desempeño está en el {{$level}}
<br>
{{$performance_comment}}
<br>
A continuación, presentamos el reporte detallado de desempeño en las preguntas:
<br>
@foreach($data as $questionAnswer)
<strong>Pregunta:</strong>{{$questionAnswer['title']}}
<br>
Repuesta:{{$questionAnswer['answer_student']}}
<br>
@if($questionAnswer['is_correct'])
Aprobado:si
@else
Aprobado:no
@endif
<br>
Concepto clave a tener en cuenta:{{$questionAnswer['answer_question']}}
<hr>
@endforeach
<br>
Hasta pronto,
<br>
Coordinación pedagógica
<br>
<strong>Educonexiones</strong>

@endcomponent