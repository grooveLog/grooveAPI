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
    $router->get('questions',  ['uses' => 'QuestionController@getAllQuestions']);
    $router->get('questions/{id}', ['uses' => 'QuestionController@getOneQuestion']);
    $router->post('questions', ['uses' => 'QuestionController@create']);
    $router->delete('questions/{id}', ['uses' => 'QuestionController@delete']);
    $router->put('questions/{id}', ['uses' => 'QuestionController@update']);

    //questionnaire ratings
    $router->get('questionnaire_ratings',  ['uses' => 'QuestionnaireRatingController@getAllQuestionnaireRatings']);
    $router->get('questionnaire_ratings/{id}', ['uses' => 'QuestionnaireRatingController@getOneQuestionnaireRating']);
    $router->post('questionnaire_ratings', ['uses' => 'QuestionnaireRatingController@create']);
    $router->delete('questionnaire_ratings/{id}', ['uses' => 'QuestionnaireRatingController@delete']);
    $router->put('questionnaire_ratings/{id}', ['uses' => 'QuestionnaireRatingController@update']);

    //answers
    $router->get('answers',  ['uses' => 'AnswerController@getAllAnswers']);
    $router->get('answers/{id}', ['uses' => 'AnswerController@getOneAnswer']);
    $router->post('answers', ['uses' => 'AnswerController@create']);
    $router->delete('answers/{id}', ['uses' => 'AnswerController@delete']);
    $router->put('answers/{id}', ['uses' => 'AnswerController@update']);

    //universal visions
    $router->get('universal_visions',  ['uses' => 'UniversalVisionController@getAllUniversalVisions']);
    $router->get('universal_visions/{id}', ['uses' => 'UniversalVisionController@getOneUniversalVision']);
    $router->post('universal_visions', ['uses' => 'UniversalVisionController@create']);
    $router->delete('universal_visions/{id}', ['uses' => 'UniversalVisionController@delete']);
    $router->put('universal_visions/{id}', ['uses' => 'UniversalVisionController@update']);

    //visions
    $router->get('visions',  ['uses' => 'VisionController@getAllVisions']);
    $router->get('visions/{id}', ['uses' => 'VisionController@getOneVision']);
    $router->post('visions', ['uses' => 'VisionController@create']);
    $router->delete('visions/{id}', ['uses' => 'VisionController@delete']);
    $router->put('visions/{id}', ['uses' => 'VisionController@update']);

    //vision timescales
    $router->get('vision_timescales',  ['uses' => 'VisionTimescaleController@getAllVisionTimescales']);
    $router->get('vision_timescales/{id}', ['uses' => 'VisionTimescaleController@getOneVisionTimescale']);
    $router->post('vision_timescales', ['uses' => 'VisionTimescaleController@create']);
    $router->delete('vision_timescales/{id}', ['uses' => 'VisionTimescaleController@delete']);
    $router->put('vision_timescales/{id}', ['uses' => 'VisionTimescaleController@update']);

    //universal goals
    $router->get('universal_goals',  ['uses' => 'UniversalGoalController@getAllUniversalGoals']);
    $router->get('universal_goals/{id}', ['uses' => 'UniversalGoalController@getOneUniversalGoal']);
    $router->post('universal_goals', ['uses' => 'UniversalGoalController@create']);
    $router->delete('universal_goals/{id}', ['uses' => 'UniversalGoalController@delete']);
    $router->put('universal_goals/{id}', ['uses' => 'UniversalGoalController@update']);

    //goals
    $router->get('goals',  ['uses' => 'GoalController@getAllGoals']);
    $router->get('goals/{id}', ['uses' => 'GoalController@getOneGoal']);
    $router->post('goals', ['uses' => 'GoalController@create']);
    $router->delete('goals/{id}', ['uses' => 'GoalController@delete']);
    $router->put('goals/{id}', ['uses' => 'GoalController@update']);

});
