<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

#Proveedores

Route::get('/proveedores',                          'App\Http\Controllers\ProveedoreController@index');
Route::get('/proveedores/all',                      'App\Http\Controllers\ProveedoreController@proveedoresAll');
Route::post('/proveedor',                           'App\Http\Controllers\ProveedoreController@store');
Route::get('/proveedor/{proveedore}',               'App\Http\Controllers\ProveedoreController@show');
Route::get('/proveedor/all/{proveedore}',           'App\Http\Controllers\ProveedoreController@proveedorAll');
Route::put('/proveedor/{proveedore}',               'App\Http\Controllers\ProveedoreController@update');
Route::delete('/proveedor/{proveedore}',            'App\Http\Controllers\ProveedoreController@destroy');

#Facturas

Route::get('/facturas',                             'App\Http\Controllers\FacturaController@index');
Route::post('/factura',                             'App\Http\Controllers\FacturaController@store');
Route::get('/factura/{factura}',                    'App\Http\Controllers\FacturaController@show');
Route::put('/factura/{factura}',                    'App\Http\Controllers\FacturaController@update');
Route::delete('/factura/{factura}',                 'App\Http\Controllers\FacturaController@destroy');

#Detalles

Route::get('/detalles',                             'App\Http\Controllers\DetalleFacturaController@index');
Route::post('/detalle',                             'App\Http\Controllers\DetalleFacturaController@store');
Route::get('/detalle/{detalle_Factura}',            'App\Http\Controllers\DetalleFacturaController@show');
Route::put('/detalle/{detalle_Factura}',            'App\Http\Controllers\DetalleFacturaController@update');
Route::delete('/detalle/{detalle_Factura}',         'App\Http\Controllers\DetalleFacturaController@destroy');