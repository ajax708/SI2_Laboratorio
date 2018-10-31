<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/listado_usuarios', 'UsuariosController@listado_usuarios');
    Route::post('crear_usuario', 'UsuariosController@crear_usuario');
    Route::post('editar_usuario', 'UsuariosController@editar_usuario');
    Route::post('buscar_usuario', 'UsuariosController@buscar_usuario');
    Route::post('borrar_usuario', 'UsuariosController@borrar_usuario');
    Route::post('editar_acceso', 'UsuariosController@editar_acceso');
  

    Route::post('crear_rol', 'UsuariosController@crear_rol');
    Route::post('crear_permiso', 'UsuariosController@crear_permiso');
    Route::post('asignar_permiso', 'UsuariosController@asignar_permiso');
    Route::get('quitar_permiso/{idrol}/{idper}', 'UsuariosController@quitar_permiso');
    
    
    Route::get('form_nuevo_usuario', 'UsuariosController@form_nuevo_usuario');
    Route::get('form_nuevo_rol', 'UsuariosController@form_nuevo_rol');
    Route::get('form_nuevo_permiso', 'UsuariosController@form_nuevo_permiso');
    Route::get('form_editar_usuario/{id}', 'UsuariosController@form_editar_usuario');
    Route::get('confirmacion_borrado_usuario/{idusuario}', 'UsuariosController@confirmacion_borrado_usuario');
    Route::get('asignar_rol/{idusu}/{idrol}', 'UsuariosController@asignar_rol');
    Route::get('quitar_rol/{idusu}/{idrol}', 'UsuariosController@quitar_rol');
    Route::get('form_borrado_usuario/{idusu}', 'UsuariosController@form_borrado_usuario');
    Route::get('borrar_rol/{idrol}', 'UsuariosController@borrar_rol');

    //ANALISIS
    Route::post('crear_analisis', 'UsuariosController@crear_usuario');
    Route::get('/listado_analisis', 'AnalisisController@listado_analisis');
    Route::get('form_nuevo_analisis', 'AnalisisController@form_nuevo_analisis');
    Route::post('editar_usuario', 'AnalisisController@editar_analisis');

    Route::get('form_nueva_area', 'AreaController@form_nueva_area');
    Route::get('form_nueva_clinica', 'LaboratorioClinicoController@form_nueva_clinica');

    Route::resources([
    'Analisis' => 'AnalisisController'
    ]);

    //PARAMETROS ANALISIS
    Route::get('parametroanalisis/{analisis}', 'ParametroAnalisisController@index')->name('parametroanalisis.index');

    Route::resource('parametroanalisis', 'ParametroAnalisisController')->except([
    'index'
    ]);
    //cualitativo
    //cuantitativo
    Route::get('cuantitativoanalisis/{parametro}', 'ValorCuantitativoAnalisisController@index')->name('cuantitativoanalisis.index');

    Route::resource('cuantitativoanalisis', 'ValorCuantitativoAnalisisController')->except([
    'index'
    ]);
    //medida
});
