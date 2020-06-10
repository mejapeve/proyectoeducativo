@component('mail::message')
# Hola {{$family->name}} {{$family->last_name}}
<br>
Te escribimos para contarte que <strong>{{$student->name}}</strong> <strong>{{$student->last_name}}</strong>
acaba de realiza el test de pregunta cerrada del momento <strong><i>{{$moment->name}}</i></strong>, en la guía de aprendizaje: <strong><i>{{$sequence->name}}</i></strong>,
y su desempeño está en el {{$level}}
<br>
<strong><span style="width: 10px;
    height: 15px;
    oz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    background: {{$color_performance}};">&nbsp;&nbsp;&nbsp;&nbsp;</span> {{$performance_comment}}</strong>
<br>
A continuación, presentamos el reporte detallado de desempeño en las preguntas:
<hr>
@foreach($data as $questionAnswer)
<strong>Pregunta: </strong>{{$questionAnswer['title']}}
<br>
<strong>Repuesta: </strong>{{$questionAnswer['answer_student']}}
<br>
@if($questionAnswer['is_correct'])
<strong>Aprobado: </strong><span style="color:green;
        font-size: 23px;
        font-weight: bolder">✓</span>
@else
<strong>Aprobado: </strong><span style="color:red;
        font-size: 23px;
        font-weight: bolder;margin-bottom: 2px;margin-top: -16px;">x</span>
@endif
<br>
<strong>Concepto clave a tener en cuenta: </strong>{{$questionAnswer['struct_concept']}}
<hr>
@endforeach
<br>
Hasta pronto,
<br>
Coordinación pedagógica
<br>
<strong>Educonexiones</strong>

@endcomponent