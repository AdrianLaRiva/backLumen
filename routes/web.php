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


$router->group(['middleware'=>[], 'prefix'=>'api/v1'], function() use ($router){

	$router->get('/cotizaciones', 'CotizacionController@index');
	$router->get('/cotizaciones/create', 'CotizacionController@create');
	$router->get('/cotizaciones/{id}', 'CotizacionController@show');
	$router->post('/cotizaciones/{id}', 'CotizacionController@store');
	$router->put('/cotizaciones/{id}', 'CotizacionController@update');
	$router->delete('/cotizaciones/{id}', 'CotizacionController@delete');

	$router->get('/getComunas/{id}',  'CotizacionController@getComunas');

});
