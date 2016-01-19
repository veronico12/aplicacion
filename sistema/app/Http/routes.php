<?php

/*Route::get('/', function () {

    return view('welcome');
});
*/

Route::get('/', function () {

    return view('inicio');
});


//Route::get('manuales', 'ManualesControlador@edit2');

Route::resource('manuales','ManualesControlador');
Route::get('eliminar','ManualesControlador@eliminar');

Route::resource('log','LogController');
Route::get('logout','LogController@logout');

Route::get('inicio',   'InicioControlador@getTecnicos');

Route::get('inicio',   'InicioControlador@getInicio');

Route::get('archivos', 'ArchivosControlador@index');
Route::get('videos',   'VideosControlador@index');

/*Route::get('menu/{ruta}',function ($ruta){
	switch ($ruta) {
		case 'inicio':
			return view('inicio');
			break;
		
		default:
			return view('404');
			break;
	}
});
*/

/*por metodo post*/
Route::resource('usuario','UsuarioController');
Route::get('administrador', 'AdministradorControlador@getAdministrador');
//Route::post('administrador', 'AdministradorControlador@postAdministrador');
