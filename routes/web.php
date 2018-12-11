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

$router->group(['prefix' => 'v1'], function () use ($router) {

    //users
    $router->get('users',  ['uses' => 'UserController@getAllUsers']);
    $router->get('users/{id}', ['uses' => 'UserController@getOneUser']);
    $router->post('users', ['uses' => 'UserController@create']);
    $router->delete('users/{id}', ['uses' => 'UserController@delete']);
    $router->put('users/{id}', ['uses' => 'UserController@update']);

    //meditations
    $router->get('meditations',  ['uses' => 'MeditationController@getAllMeditations']);
    $router->get('meditations/{id}', ['uses' => 'MeditationController@getOneMeditation']);
    $router->post('meditations', ['uses' => 'MeditationController@create']);
    $router->delete('meditations/{id}', ['uses' => 'MeditationController@delete']);
    $router->put('meditations/{id}', ['uses' => 'MeditationController@update']);

    //meditation attributions
    $router->get('meditation_attributions',  ['uses' => 'MeditationAttributionController@getAllMeditationAttributions']);
    $router->get('meditation_attributions/{id}', ['uses' => 'MeditationAttributionController@getOneMeditationAttribution']);
    $router->post('meditation_attributions', ['uses' => 'MeditationAttributionController@create']);
    $router->delete('meditation_attributions/{id}', ['uses' => 'MeditationAttributionController@delete']);
    $router->put('meditation_attributions/{id}', ['uses' => 'MeditationAttributionController@update']);

});
