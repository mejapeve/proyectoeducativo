@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
<br>
<p>
    Estás recibiendo este mensaje porque acabas de registrarte en Conexiones,
    experiencias científicas para comprender el mundo natural.
    Nuestra propuesta educativa y plataforma on line, han sido especialmente diseñadas para que las niñas,
    los niños y jóvenes, integren diferentes saberes en su proceso de aprendizaje,
    con la intención de promover el desarrollo de pensamiento científico.
</p>
<br>
<p>
    En coherencia con esto, todos los recursos didácticos que hacen parte de Conexiones,
    están orientados a establecer relaciones entre saberes:
</p>
<br>
<br>
<p>
    Te damos la bienvenida a Conexiones,
    nuestro equipo pedagógico y técnico está disponible para facilitar la apropiación de los contenidos
    y el uso de la plataforma. De acuerdo con los datos suministrados, en este momento tienes acceso la prueba gratuita,
    esta opción ofrece 15 días para aprovecharla al máximo los recursos didácticos que estamos compartiendo:
    acceso a la situación generadora y contenidos del Momento 1 de la ruta propuesta en la guía de aprendizaje:
    Energía súper poderosa
</p>
<br>
<p>
    Es importante tener presente que los estudiantes que registre desde su perfil(opción inscripciones),
    podrán acceder a preguntas para explorar saberes previos,
    prácticas experimentales, explicaciones científicas contextualizadas y recursos en la web sugeridos para ampliar sus comprensiones.
    Durante todo el proceso de exploración de los contenidos,
    encontrará preguntas abiertas que tienen la intención de estimular habilidades científicas y que no tienen respuesta única, pero al finalizar cada sesión,
    habrá un test de preguntas cerradas que permite identificar cómo avanza en el proceso de aprendizaje, las fortalezas y aspectos susceptibles de mejora.
</p>
<br>
<p>
Si quieres conocer más sobre nuestro enfoque pedagógico, puedes ingresar a:
<br>
Para tener más detalles sobre la estructura de las guías de aprendizaje, puedes ver
<br>
Si tienes preguntas o sugerencias, puedes contactarnos por este medio
</p>
<hr>
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif
{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach
@foreach($data as $user)
<h2>{!!'Usuario:' .$user->user_name !!}</h2>
<h2>{!!'Contraseña:' .$user->user_name !!}</h2>
@foreach($user->affiliated_company as $company_rol)
{{'Empresa: '.$company_rol->company->name.' rol: '.$company_rol->rol->description}}
<br>
@endforeach
@endforeach
{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Regards'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser: [:actionURL](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl,
    ]
)
@endslot
@endisset
@endcomponent
