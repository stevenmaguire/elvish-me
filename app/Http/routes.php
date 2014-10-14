<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

$router->get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

$router->get('define/{keyword?}', ['as' => 'define', 'uses' => 'HomeController@showDefine']);
$router->post('define', ['as' => 'define.do', 'uses' => 'HomeController@doDefine']);

$router->get('{type}/{count?}', ['as' => 'content', 'uses' => 'HomeController@showContent']);
$router->post('content', ['as' => 'content.do', 'uses' => 'HomeController@doContent']);
