<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Patria - Auth</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <script src="https://kit.fontawesome.com/66c63b4ed2.js" crossorigin="anonymous"></script>
</head>
<body>
    {{-- Vista escritorio --}}
    <div class="desktop-view">
        @include('auth.desktop')
    </div>

    {{-- Vista móvil --}}
    <div class="mobile-view">
        @include('auth.mobile')
    </div>

    {{-- JS --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
