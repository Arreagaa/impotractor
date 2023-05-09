@component('mail::message')
<h1>Correo de Cotización</h1>
@component('mail::panel')
    Mensaje de {{$name}}
@endcomponent

<br>
<p>{{$body}}</p>

<br>
<p>Contactar al Cliente por Número Teléfono {{$phone}} o por Correo Electrónico {{$email}}.
</p>

@component('mail::button', [ 'url' => 'https://impotractor.com/' ])
    Impotractor S.A.
@endcomponent
<hr>
<p>¡Más que repuestos, todo un servicio!</p>
@endcomponent
