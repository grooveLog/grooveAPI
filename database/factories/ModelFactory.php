<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [
        'email' => $faker->email,
        'username' => $faker->userName,
        'firstname' =>$faker->firstName,
        'lastname' => $faker->lastName,
        'birthday' => $faker->dateTimeBetween('-80 years', '-16 years'),
        'gender' => $faker->randomElement(['M', 'F', 'O']),
        'personal_summary' => $faker->realText(255),
        'image' => $faker->imageUrl(),
        'status' => $faker->randomElement(['ACTIVE', 'INACTIVE', 'SUSPENDED']),
    ];
});


$factory->define(App\UserTerm::class, function (Faker\Generator $faker) {
    return [
        'type' => $faker->randomElement(['TERMS AND CONDITIONS', 'APPROPRIATE USE', 'SOME OTHER TERM']),
        'text' => $faker->realText(2000),
    ];
});

$factory->define(App\Meditation::class, function (Faker\Generator $faker) {
    return [
        'meditation_attribution_id' => random_int(0,9),
        'text' => $faker->realText(255),
        'impressions' => random_int(0, 200),
        'likes' => random_int(0, 12),
    ];
});

$factory->define(App\MeditationAttribution::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'image' => $faker->imageUrl(),
    ];
});

$factory->define(App\Questionnaire::class, function (Faker\Generator $faker) {
    return [
        'user_id' => random_int(0, 9),
        'type' => $faker->randomElement(['FORMAT1', 'FORMAT2', 'FORMAT3']),
        'title' => $faker->realText(32),
        'description' => $faker->realText(500),
        'instructions' => $faker->realText(500),
        'image' => $faker->imageUrl(),
    ];
});

$factory->define(App\QuestionnaireRating::class, function (Faker\Generator $faker) {
    return [
        //
    ];
});

$factory->define(App\Question::class, function (Faker\Generator $faker) {
    return [
        //
    ];
});

$factory->define(App\Answer::class, function (Faker\Generator $faker) {
    return [
        //
    ];
});


$factory->define(App\UniversalVision::class, function (Faker\Generator $faker) {
    return [
        //
        ];
});

$factory->define(App\Vision::class, function (Faker\Generator $faker) {
    return [
        'personal_description' => $faker->realText(255),
        'probability' => $faker->randomElement([5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,86,90,95,100]),
        'passion' =>$faker->firstName,
        'status' => $faker->randomElement(['ACTIVE', 'INACTIVE']),
        'completed_at' => $faker->dateTime(),
        'user_id' => random_int(0, 9),
        'universal_vision_id' => random_int(0, 9),
        'vision_timescales_id'  => random_int(0, 9),
    ];
});

$factory->define(App\VisionTimescale::class, function (Faker\Generator $faker) {
    return [
        //
    ];
});

$factory->define(App\UniversalGoal::class, function (Faker\Generator $faker) {
    return [
        //
    ];
});

$factory->define(App\Goal::class, function (Faker\Generator $faker) {
    return [
        //
    ];
});

$factory->define(App\UniversalGroove::class, function (Faker\Generator $faker) {
    return [
        //
    ];
});

$factory->define(App\Groove::class, function (Faker\Generator $faker) {
    return [
        //
    ];
});