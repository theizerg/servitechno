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
   Route::get('modulo/borrar/{modulo_id}', 'ModulosController@borrar');
   Route::resource('roles',   'RolesController');
   Route::DELETE('/notificaciones/borrar/{notificacion_id}', 'HomeController@borrarNotificacion')->name('borrarNotificacion');

   
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE REPARACIONES ##############################
#############################################################################################

  Route::resource('/reparaciones', 'ReparacionesController');
#
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE LISTA DE PRECIOS ##########################
#############################################################################################
#############################################################################################

Route::resource('/precios', 'ListaDePrecioController');
#
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE LISTA DE VENTAS $##########################
#############################################################################################
#############################################################################################

Route::resource('/venta', 'VentasController');
#
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE LISTA DE PRODUCTOS ########################
#############################################################################################
#############################################################################################


Route::post('/productos/familiaProductos/nueva', 'ProductosController@nuevaFamiliaProducto');
Route::get('/productos', 'ProductosController@index');
Route::get('/productos/movimientos', 'ProductosController@movimientos');
Route::get('/productos/buscar', 'ProductosController@buscar');    
Route::get('/productos/nuevo', 'ProductosController@nuevo');
Route::post('/productos/nuevo', 'ProductosController@guardar');
Route::post('/productos/editar', 'ProductosController@editar');
Route::post('/productos/borrar', 'ProductosController@borrar');
Route::get('/productos/detalle/{codigo}', 'ProductosController@detalle');
Route::post('/productos/{codigo}/configuracion', 'ProductosController@configuracion');
Route::post('/productos/{codigo}/ModificarStock', 'ProductosController@movimientoModificarStock');
Route::get('/productos/{codigo}/NotifStockMin', 'ProductosController@NotifStockMin');
Route::get('/ganancias','GananciaContoller@ganancias');
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE CLIENTES #################################
#############################################################################################

Route::get('/clientes', 'ClientesController@index');
Route::get('/clientes/nuevo', 'ClientesController@nuevo');
Route::post('/clientes/guardar', 'ClientesController@guardar');
Route::get('/clientes/buscar', 'ClientesController@buscar');
Route::get('/clientes/detalle/{clienteId}', 'ClientesController@detalle');

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE PROVEEDORES ###############################
#############################################################################################
  
  Route::get('/proveedores', 'ProveedoresController@index');
  Route::get('/proveedores/nuevo', 'ProveedoresController@nuevo');
  Route::post('/proveedores/guardar', 'ProveedoresController@guardar');
  Route::get('/proveedores/detalle/{proveedor_id}', 'ProveedoresController@detalle');
  Route::get('/indicadores/masVendidos/{mes}', 'IndicadoresController@masVendidos');
  Route::get('/proveedores/buscar', 'ProveedoresController@buscar');

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE MARCAS ####################################
#############################################################################################
  
Route::resource('/marcas', 'MarcasController');

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE MODELOS ###################################
#############################################################################################

Route::resource('/modelos', 'ModelosController');

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE TIPO DE REPARACIONES ######################
#############################################################################################


Route::resource('tiporeparaciones', 'TipoReparacionesController');


#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE TIPO DE EQUIPOS ###########################
#############################################################################################


Route::resource('tipoequipos', 'TipoEquiposController');


#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#
#
#
#
#############################################################################################
################################# MOD REGISTRO DE PROVEEDORES ###############################
#############################################################################################
  
  Route::get('/ordenservicios', 'OrdenServicioController@index');
  Route::get('/clientes/{cliente_id}', 'OrdenServicioController@clientes');
  Route::get('/equipos/{marca_id}', 'OrdenServicioController@marca');
  Route::get('/marcas/{marca_id}/modelos', 'OrdenServicioController@modelos');
  Route::post('/ordenservicios/guardar', 'OrdenServicioController@guardar');
  Route::get('/ordenservicios/reparar', 'OrdenServicioController@reparar');
  Route::get('/ordenservicios/reparados', 'OrdenServicioController@reparados');
  Route::get('/ordenservicios/noreparados', 'OrdenServicioController@noreparados');
  Route::get('/ordenservicios/reincidencias', 'OrdenServicioController@reincidencia');
  Route::get('/ordenservicios/revisado', 'OrdenServicioController@revisado');
  Route::get('/ordenservicios/entregados', 'OrdenServicioController@entregado');
  Route::get('/ordenservicios/historial/{orden_id}', 'OrdenServicioController@historial');
  Route::put('/ordenservicios/guardar/{orden_id}', 'OrdenServicioController@editar');
  Route::get('/ordenservicios/nuevo', 'OrdenServicioController@nuevo');
#
#
#
#

});
