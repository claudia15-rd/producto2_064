<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PanelUsuarioController;
use App\Http\Controllers\PanelAdminController;
use App\Http\Controllers\PanelAdminPerfilController;
use App\Http\Controllers\PanelUsuarioPerfilController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [LoginController::class, 'getLanding']);

Route::group(['middleware' => 'LoginGuard'], function () {
    // Tus rutas aquí
    Route::get('/login', [LoginController::class, 'getLogin']);
    Route::post('/login', [LoginController::class, 'postLogin']);

    Route::get('/registro', [LoginController::class, 'getRegistro']);
    Route::post('/registro', [LoginController::class, 'postRegistro']);
    
});

Route::group(['middleware' => 'AuthGuard'], function () {
    // Tus rutas aquí
    Route::get('/logout', [LoginController::class, 'getLogout']);
    Route::get('/panelusuario/dia', [PanelUsuarioController::class, 'getByDia']);
    Route::get('/panelusuario/semana', [PanelUsuarioController::class, 'getBySemana']);
    Route::get('/panelusuario/mes', [PanelUsuarioController::class, 'getByMes']);
    
    Route::post('/panelusuario/dia', [PanelUsuarioController::class, 'postDia']);
    Route::post('/panelusuario/semana', [PanelUsuarioController::class, 'postSemana']);
    Route::post('/panelusuario/mes', [PanelUsuarioController::class, 'postMes']);

    Route::get('/paneladmin/actos', [PanelAdminController::class, 'getActos']);
    Route::get('/paneladmin/acto/crear', [PanelAdminController::class, 'getCrearActo']);
    Route::post('/paneladmin/acto/crear', [PanelAdminController::class, 'postCrearActo']);

    Route::get('/paneladmin/acto/editar', [PanelAdminController::class, 'getEditarActo']);
    Route::post('/paneladmin/acto/editar', [PanelAdminController::class, 'postEditarActo']);

    Route::post('/paneladmin/acto/eliminar', [PanelAdminController::class, 'postEliminarActo']);

    Route::get('/paneladmin/tipoacto/crear', [PanelAdminController::class, 'getCrearTipoActo']);
    Route::post('/paneladmin/tipoacto/crear', [PanelAdminController::class, 'postCrearTipoActo']);

    Route::get('/paneladmin/perfil', [PanelAdminPerfilController::class, 'getPerfil']);
    Route::post('/paneladmin/perfil', [PanelAdminPerfilController::class, 'postPerfil']);

    Route::get('/panelusuario/perfil', [PanelUsuarioPerfilController::class, 'getPerfil']);
    Route::post('/panelusuario/perfil', [PanelUsuarioPerfilController::class, 'postPerfil']);
//Ini apalac ponentes
    Route::post('paneladmin/ponente/crear', [PanelAdminController::class, 'postAgregarPonente']);
    Route::get('paneladmin/ponente/crear', [PanelAdminController::class, 'postAgregarPonente2']);
 
    Route::post('paneladmin/ponente/borrar', [PanelAdminController::class, 'postBorrarPonente']);
    Route::get('paneladmin/ponente/borrar', [PanelAdminController::class, 'postBorrarPonente2']);
//Fin apalac ponentes
});


