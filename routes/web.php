<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'user'], function () use ($router) {
    $router->get('all', ['uses' => 'UsuariosController@index']);

	$router->get('/usuario/{Correo_Electronico}', ['uses' => 'UsuariosController@get_user']);

	$router->post('/crear_usuario', ['uses' => 'UsuariosController@insert_user']);

	$router->put('/actualizar_usuario/{Correo_Electronico}', ['uses' =>'UsuariosController@update_user']);

	$router->put('/actualizar_contrasena/{Correo_Electronico}', ['uses' =>'UsuariosController@update_password_user']);

	$router->get('/activar_cuenta', ['uses' => 'UsuariosController@send_mail']);
});