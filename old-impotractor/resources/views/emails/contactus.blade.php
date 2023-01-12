@component('mail::message')

La persona: {{ $lastName }}, {{ $firstName }}

Responder a: {{ $e_mail }}

Se puso en contacto con nosotros dejando el siguiente mensaje:<br>
{{ $msg }}

{{ config('app.name') }}
@endcomponent
