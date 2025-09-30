<div class="mobile-auth-container">
    <!-- Logo -->
    <div class="mobile-logo">
        <img src="{{ asset('img/logo.png') }}" alt="Logo La Patria">
        <p>Ingresa tus datos para registrarte y empezar a comprar avisos en tu periódico de confianza.</p>
    </div>

    <!-- Login -->
    <div class="mobile-form mobile-login active">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2>Inicio de sesión</h2>
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

            <a href="#" class="toggle-form" id="show-register">¿No tienes cuenta?</a>
        </form>
    </div>

    <!-- Registro -->
    <div class="mobile-form mobile-register">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h2>Registrarse</h2>
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

            <a href="#" class="toggle-form" id="show-login">¿Ya tienes cuenta?</a>
        </form>
    </div>
</div>
