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

    //user terms
    $router->get('user_terms',  ['uses' => 'UserTermController@getAllUserTerms']);
    $router->get('user_terms/{id}', ['uses' => 'UserTermController@getOneUserTerm']);
    $router->post('user_terms', ['uses' => 'UserTermController@create']);
    $router->delete('user_terms/{id}', ['uses' => 'UserTermController@delete']);
    $router->put('user_terms/{id}', ['uses' => 'UserTermController@update']);

    //questionnaires
    $router->get('questionnaires',  ['uses' => 'QuestionnaireController@getAllQuestionnaires']);
    $router->get('questionnaires/{id}', ['uses' => 'QuestionnaireController@getOneQuestionnaire']);
    $router->post('questionnaires', ['uses' => 'QuestionnaireController@create']);
    $router->delete('questionnaires/{id}', ['uses' => 'QuestionnaireController@delete']);
    $router->put('questionnaires/{id}', ['uses' => 'QuestionnaireController@update']);

    //questions
    $router->get('questions',  ['uses' => 'QuestionnaireController@getAllQuestions']);
    $router->get('questions/{id}', ['uses' => 'QuestionnaireController@getOneQuestion']);
    $router->post('questions', ['uses' => 'QuestionnaireController@create']);
    $router->delete('questions/{id}', ['uses' => 'QuestionnaireController@delete']);
    $router->put('questions/{id}', ['uses' => 'QuestionnaireController@update']);

    //answers
    $router->get('answers',  ['uses' => 'QuestionnaireController@getAllAnswers']);
    $router->get('answers/{id}', ['uses' => 'QuestionnaireController@getOneAnswer']);
    $router->post('answers', ['uses' => 'QuestionnaireController@create']);
    $router->delete('answers/{id}', ['uses' => 'QuestionnaireController@delete']);
    $router->put('answers/{id}', ['uses' => 'QuestionnaireController@update']);

});
