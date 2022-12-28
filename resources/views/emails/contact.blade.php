@component('mail::message')
<h1>Correo de Cotización</h1>
<h2>Mensaje de {{$name}}</h2>

<br>
<p>{{$body}}</p>

<br>
<p>Contactar al Cliente por Número Teléfono {{$phone}} o por Correo Electrónico {{$email}}.
</p>

<br>
<p>¡Más que repuestos, todo un servicio!</p>
@endcomponent
