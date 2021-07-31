<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware(['auth',])->group(function () {

#############################################################################################
##################  Administación del sistema   #############################################
#############################################################################################
   Route::get('/', 'HomeController@index')->name('home');
   Route::resource('organismos', 'OrganismosController');
   Route::resource('logins', 'LoginController');
   Route::resource('/permission', 'PermissionController');
   Route::resource('usuarios',   'UserController');
   Route::get('logs', 'HomeController@logs')->name('logs');
   Route::resource('roles',   'RolesController');
   Route::DELETE('/notificaciones/borrar/{notificacion_id}', 'HomeController@borrarNotificacion')->name('borrarNotificacion');


});
