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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix'=>'api/v1'], function() use ($router){
	$router->post('/users/login', 'UserController@getUser');
});

$router->group(['middleware'=>['auth'], 'prefix'=>'api/v1'], function() use ($router){
    $router->post('/users/logout', 'UserController@logOut');
	
	$router->get('/cotizaciones', 'CotizacionController@index');
	$router->get('/cotizaciones/create', 'CotizacionController@create');
	$router->get('/cotizaciones/{id}', 'CotizacionController@show');
	$router->post('/cotizaciones/store/store', 'CotizacionController@store');
	$router->delete('/cotizaciones/{id}', 'CotizacionController@delete');
	$router->get('/getComunas/{id}',  'CotizacionController@getComunas');


});
