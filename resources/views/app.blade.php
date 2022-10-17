<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

        <title>Impotractor S.A.</title>
        <link rel="icon" href="/images/impotractor/impotractor-only-logo.png">
        <link rel="stylesheet" href="/images/impotractor/impotractor-only-logo.png">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @routes
        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
