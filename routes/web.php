<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TipoTransaccionItemTransaccionController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\AvisoController;
use App\Http\Controllers\VentaAvisoController;
use App\Http\Controllers\TestVentaController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

// Ruta raíz → redirige al login/registro
Route::get('/', function () {
    return redirect()->route('auth.form');
});

// Formulario único (login o registro)
Route::get('/auth', [AuthController::class, 'form'])->name('auth.form'); // Mostrar formulario
Route::post('/auth/login', [AuthController::class, 'login'])->name('login'); // Iniciar sesión
Route::post('/auth/register', [AuthController::class, 'register'])->name('register'); // Registrar usuario

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| DASHBOARD PROTEGIDO (según tipo de usuario)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('auth.form');
    }

    $cargo = $user->cargo->NombreCargo;

    switch ($cargo) {
        case 'Administrador':
            return view('dashboard.admin');
        case 'Vendedor':
            return view('dashboard.vendedor');
        case 'Producción':
            return view('dashboard.produccion');
        case 'Cliente':
            return view('dashboard.cliente');
        default:
            return "No hay vista disponible para este cargo";
    }
})->name('dashboard');


/*
|--------------------------------------------------------------------------
| RUTAS ADMINISTRADOR
|--------------------------------------------------------------------------
*/

// Gestión de personal (CRUD)
Route::resource('personals', PersonalController::class);

// Listado de clientes (CRUD)
Route::get('/dashboard/admin/gestionar_clientes', [PersonalController::class, 'clientes'])
     ->name('gestionar_clientes');

// Gestión personal (vista principal)
Route::get('/dashboard/admin/gestion-personal', [PersonalController::class, 'index'])
     ->name('gestionar_personal');


/*
|--------------------------------------------------------------------------
| RUTAS VENDEDOR
|--------------------------------------------------------------------------
*/

// Vista aviso económico
Route::get('/dashboard/vendedor/aviso-economico', [TestVentaController::class, 'create'])
    ->name('aviso_economico');
Route::post('/dashboard/vendedor/aviso-economico', [TestVentaController::class, 'store'])
    ->name('aviso_economico.store');


// Autocompletado clientes
Route::get('/clientes/autocomplete', [ClienteController::class, 'autocomplete'])->name('clientes.autocomplete');

// Obtener clasificaciones, subcategorías y tipos dinámicamente
Route::get('/clasificaciones', [AvisoController::class, 'getClasificaciones']);
Route::get('/subcategorias/{id}', [AvisoController::class, 'getSubcategorias']);
Route::get('/tipos/{id}', [AvisoController::class, 'getTipos']);

// Registrar venta de avisos
Route::post('/venta-avisos', [VentaAvisoController::class, 'store'])->name('venta-avisos.store');

// Otras vistas del vendedor
Route::get('/dashboard/vendedor/aviso-general', function () {
    return view('dashboard.vendedor.aviso_general');
})->name('aviso_general');

Route::get('/dashboard/vendedor/listado-avisos', function () {
    return view('dashboard.vendedor.listado_avisos');
})->name('listado_avisos');

Route::get('/dashboard/vendedor/marcado-avisos', function () {
    return view('dashboard.vendedor.marcado-avisos');
})->name('marcado_avisos');

Route::get('/dashboard/vendedor/reporte-participacion', function () {
    return view('dashboard.vendedor.reporte-participacion');
})->name('reporte_participacion');


/*
|--------------------------------------------------------------------------
| RUTAS PERFIL
|--------------------------------------------------------------------------
*/

// Editar perfil (pendiente implementación)
Route::get('/profile/edit', function() {
    return "Aquí irá la edición de perfil";
})->name('profile.edit');
