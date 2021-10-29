<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });
//test
$router->post('/register','UserController@register');
$router->post('/login','UserController@login');
$router->get('/admin','AdminController@index');
$router->post('/admin','AdminController@create');
$router->put('/admin/{id}','AdminController@update');
$router->delete('/admin/{id}','AdminController@delete');

$router->get('/employee','AdminController@show');
$router->post('/employeecreate','AdminController@emcreate');
$router->put('/employeeup','AdminController@emupdate');
$router->delete('/employeedel','AdminController@emdelete');

$router->get('/list','ListviewController@index');
$router->get('/listcom/{id}','ListviewController@searchcom');
$router->get('/listdep/{id}','ListviewController@searchdep');
$router->get('/listemp/{id}','ListviewController@searchemp');
$router->get('/liststaffid/{id}','ListviewController@searchsid');


