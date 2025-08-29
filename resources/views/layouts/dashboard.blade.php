<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard – La Patria')</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <!-- Sidebar izquierdo -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <img src="{{ asset('img/logo.png') }}" alt="La Patria">
        </div>

        <!-- Perfil usuario -->
        <div class="sidebar-profile">
            <div class="profile-avatar">
                <img src="{{ asset('img/avatar.png') }}" alt="Avatar">
            </div>
            <div class="profile-info">
                <span class="profile-name">{{ Auth::user()->Nombre }} {{ Auth::user()->Apellido }}</span>
                <span class="profile-role">{{ Auth::user()->cargo->NombreCargo }}</span>
            </div>
        </div>

        <!-- Navegación -->
        <nav class="sidebar-nav">
            <ul>
                @yield('sidebar') {{-- Aquí irá el contenido del sidebar según el cargo --}}
            </ul>
        </nav>
    </aside>

    <!-- Contenedor principal -->
    <main class="main-content">
        <!-- Navbar superior -->
        <header class="topnav">
            <div class="topnav-left">
                <h1>@yield('header', 'Dashboard')</h1>
            </div>
            <div class="topnav-right">
                <button class="btn-primario"><i class="fas fa-user"></i> Perfil</button>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-secundario"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</button>
                </form>
            </div>
        </header>

        <!-- Contenido principal -->
        <section class="dashboard-body">
            @yield('content') {{-- Aquí va el contenido dinámico del dashboard --}}
        </section>
    </main>

</body>
</html>
