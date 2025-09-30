<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La Patria - Avisos</title>

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

  <script src="https://kit.fontawesome.com/66c63b4ed2.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <!-- Registro -->
    <div class="form-container sign-up-container">
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <h1>Registrarse</h1>
        <hr>
        
        <div class="group-input">
          <i class="fa fa-user"></i>
          <input type="text" name="Nombre" placeholder="Nombre" value="{{ old('Nombre') }}" required>
        </div>
        <div class="group-input">
          <i class="fa fa-user"></i>
          <input type="text" name="Apellido" placeholder="Apellido" value="{{ old('Apellido') }}" required>
        </div>
        <div class="group-input">
          <i class="fa fa-envelope"></i>
          <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required>
        </div>
        <div class="group-input">
          <i class="fa fa-lock"></i>
          <input type="password" name="password" placeholder="Contraseña" required>
        </div>
        <div class="group-input">
          <i class="fa fa-lock"></i>
          <input type="password" name="password_confirmation" placeholder="Repita la contraseña" required>
        </div>
        <button type="submit">Registrarse</button>

        @if ($errors->any())
          <div class="errors">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
      </form>
    </div>

    <!-- Inicio de sesión -->
    <div class="form-container sign-in-container">
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1>Inicio de sesión</h1>
        <hr>
        <div class="group-input">
          <i class="fa fa-envelope"></i>
          <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required>
        </div>
        <div class="group-input">
          <i class="fa fa-lock"></i>
          <input type="password" name="password" placeholder="Contraseña" required>
        </div>
        <button type="submit">Iniciar sesión</button>

        @if ($errors->any())
          <div class="errors">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
      </form>
    </div>

    <!-- Panel lateral -->
    <div class="side-element-container">
      <div class="side-element">
        <div class="side-element-panel side-element-left">
          <div class="side-logo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo La Patria">
          </div>
          <h1>¡Hola!</h1>
          <p>Ingresa tus datos para registrarte y empezar a comprar avisos en tu periódico de confianza.</p>
          <button class="ghost" id="signIn">¿Ya tienes cuenta?</button>
        </div>

        <div class="side-element-panel side-element-right">
          <div class="side-logo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo La Patria">
          </div>
          <h1>¡Bienvenido!</h1>
          <p>Nos alegra tenerte de vuelta. Inicia sesión y accede al mundo de La Patria.</p>
          <button class="ghost" id="signUp">¿Sin cuenta?</button>
        </div>
      </div>
    </div>

  </div>

  <footer>
    <p>© 2025 La Patria - Oruro, Bolivia</p>
  </footer>

  {{-- JS --}}
  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
