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
        //'uid' => $faker->md5,
        'authentication_method' => $faker->randomElement(['FACEBOOK', 'TWITTER', 'EMAIL']),
        'display_name' => $faker->userName,
        'firstname' =>$faker->firstName,
        'lastname' => $faker->lastName,
        'birthday' => $faker->dateTimeBetween('-80 years', '-16 years'),
        'gender' => $faker->randomElement(['M', 'F', 'O']),
        'personal_summary' => $faker->realText(255),
        'image' => $faker->imageUrl(400, 400, "people"),
        'locale' => $faker->locale,
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
        'meditation_attribution_id' => random_int(1,10),
        'text' => $faker->realText(255),
        'impressions' => random_int(0, 200),
        'likes' => random_int(0, 12),
    ];
});

$factory->define(App\MeditationAttribution::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'image' => $faker->imageUrl(400, 400, "people"),
    ];
});

$factory->define(App\Questionnaire::class, function (Faker\Generator $faker) {
    $userIds = [
        'eI1AV0blghcWzngdT0DprCz2W1V2',
        'aUoNpmZO5jhM35p32M2R5BGiLjg1',
        'U8j6MBTXHwOtoANQ0SajMzx4AkH2',
        'ANDEaGQp6KVVrRaJeM9cI2KsCVV2',
        '44RLIDUo2Sg39CGzobCHf2rY3gX2',
        'kApDcStAQuPLXvFMLL8bmzPAFiD3'
    ];

    return [
        'user_id' => $faker-> randomElement($userIds),
        'type' => $faker->randomElement(['FORMAT1', 'FORMAT2', 'FORMAT3']),
        'title' => $faker->realText(32),
        'description' => $faker->realText(500),
        'instructions' => $faker->realText(500),
        'image' => $faker->imageUrl(640, 480, "abstract"),
    ];
});

$factory->define(App\QuestionnaireRating::class, function (Faker\Generator $faker) {
    $userIds = [
        'eI1AV0blghcWzngdT0DprCz2W1V2',
        'aUoNpmZO5jhM35p32M2R5BGiLjg1',
        'U8j6MBTXHwOtoANQ0SajMzx4AkH2',
        'ANDEaGQp6KVVrRaJeM9cI2KsCVV2',
        '44RLIDUo2Sg39CGzobCHf2rY3gX2',
        'kApDcStAQuPLXvFMLL8bmzPAFiD3'
    ];

    return [
        'user_id' => $faker->randomElement($userIds),
        'questionnaire_id' => random_int(1, 10),
        'questions_id' => random_int(1, 10),  //this won't work - sort it out, can't be random
        'rating' => random_int(1, 5),
        'comment' => $faker->realText(100)
    ];
});

$factory->define(App\Question::class, function (Faker\Generator $faker) {
    $userIds = [
        'eI1AV0blghcWzngdT0DprCz2W1V2',
        'aUoNpmZO5jhM35p32M2R5BGiLjg1',
        'U8j6MBTXHwOtoANQ0SajMzx4AkH2',
        'ANDEaGQp6KVVrRaJeM9cI2KsCVV2',
        '44RLIDUo2Sg39CGzobCHf2rY3gX2',
        'kApDcStAQuPLXvFMLL8bmzPAFiD3'
    ];

    return [
        'questionnaire_id' => random_int(1, 10),
        'user_id' => $faker->randomElement($userIds),
        'version' => 1,
        'questions' => "{}", //Need some JSON
        'status' => $faker->randomElement(['ACTIVE', 'INACTIVE']),
    ];
});

$factory->define(App\Answer::class, function (Faker\Generator $faker) {
    return [
        //
    ];
});


$factory->define(App\VisionTimescale::class, function (Faker\Generator $faker) {
    return [
        'text' => $faker->realText(16),
        'numeric' => random_int(1, 50),
    ];
});

$factory->define(App\UniversalVision::class, function (Faker\Generator $faker) {
    $userIds = [
        'eI1AV0blghcWzngdT0DprCz2W1V2',
        'aUoNpmZO5jhM35p32M2R5BGiLjg1',
        'U8j6MBTXHwOtoANQ0SajMzx4AkH2',
        'ANDEaGQp6KVVrRaJeM9cI2KsCVV2',
        '44RLIDUo2Sg39CGzobCHf2rY3gX2',
        'kApDcStAQuPLXvFMLL8bmzPAFiD3'
    ];

    return [
        'user_id' => $faker->randomElement($userIds),
        'name' => $faker->realText(16),
        'privacy' => $faker->randomElement(['PUBLIC', 'PRIVATE']),
        'endorsed' => $faker->boolean(),
        'status' => $faker->randomElement(['ACTIVE', 'INACTIVE']),
        'total_assignments' => 0,
        'average_passion_rating' => 0,
        ];
});

$factory->define(App\Vision::class, function (Faker\Generator $faker) {
    $userIds = [
        'eI1AV0blghcWzngdT0DprCz2W1V2',
        'aUoNpmZO5jhM35p32M2R5BGiLjg1',
        'U8j6MBTXHwOtoANQ0SajMzx4AkH2',
        'ANDEaGQp6KVVrRaJeM9cI2KsCVV2',
        '44RLIDUo2Sg39CGzobCHf2rY3gX2',
        'kApDcStAQuPLXvFMLL8bmzPAFiD3'
    ];

    return [
        'personal_description' => $faker->realText(255),
        'probability' => $faker->randomElement([5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,86,90,95,100]),
        'passion' =>$faker->randomElement([5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,86,90,95,100]),
        'status' => $faker->randomElement(['ACTIVE', 'INACTIVE']),
        'completed_at' => $faker->dateTime(),
        'user_id' => $faker->randomElement($userIds),
        'universal_vision_id' => random_int(1, 10),
        'vision_timescales'  => $faker->randomElement(['THIS_YEAR', 'NEXT_FEW_YEARS', '5_TO_10_YEARS', 'OVER_10_YEARS', 'OLD_AGE', 'BEYOND_LIFETIME']),
    ];
});


$factory->define(App\UniversalGoal::class, function (Faker\Generator $faker) {
    $userIds = [
        'eI1AV0blghcWzngdT0DprCz2W1V2',
        'aUoNpmZO5jhM35p32M2R5BGiLjg1',
        'U8j6MBTXHwOtoANQ0SajMzx4AkH2',
        'ANDEaGQp6KVVrRaJeM9cI2KsCVV2',
        '44RLIDUo2Sg39CGzobCHf2rY3gX2',
        'kApDcStAQuPLXvFMLL8bmzPAFiD3'
    ];

    return [
        'user_id' => $faker->randomElement($userIds),
        'name' => $faker->realText(32),
        'privacy' => $faker->randomElement(['PUBLIC', 'PRIVATE']),
        'endorsed' => $faker->boolean(),
        'status' => $faker->randomElement(['ACTIVE', 'INACTIVE']),
        'total_assignments' => 0,
        'average_reward_rating' => 0,
    ];
});

$factory->define(App\Goal::class, function (Faker\Generator $faker) {
    $userIds = [
        'eI1AV0blghcWzngdT0DprCz2W1V2',
        'aUoNpmZO5jhM35p32M2R5BGiLjg1',
        'U8j6MBTXHwOtoANQ0SajMzx4AkH2',
        'ANDEaGQp6KVVrRaJeM9cI2KsCVV2',
        '44RLIDUo2Sg39CGzobCHf2rY3gX2',
        'kApDcStAQuPLXvFMLL8bmzPAFiD3'
    ];

    return [
        'user_id' => $faker->randomElement($userIds),
        'universal_goal_id' => random_int(1, 10),
        'personal_description' => $faker->realText(32),
        'progress' => $faker->randomElement([5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,86,90,95,100]),
        'reward' => $faker->randomElement([5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,86,90,95,100]),
        'goal_date_from' => $faker->dateTimeBetween('-1 years', 'now'),
        'goal_date_to' => $faker->dateTimeBetween('now', '+1 years'),
        'status' => $faker->randomElement(['ACTIVE', 'INACTIVE', 'COMPLETED', 'FAILED', 'POSTPONED']),
        'completed_at' => null,
    ];
});

$factory->define(App\UniversalGroove::class, function (Faker\Generator $faker) {
    $userIds = [
        'eI1AV0blghcWzngdT0DprCz2W1V2',
        'aUoNpmZO5jhM35p32M2R5BGiLjg1',
        'U8j6MBTXHwOtoANQ0SajMzx4AkH2',
        'ANDEaGQp6KVVrRaJeM9cI2KsCVV2',
        '44RLIDUo2Sg39CGzobCHf2rY3gX2',
        'kApDcStAQuPLXvFMLL8bmzPAFiD3'
    ];

    return [
        'user_id' => $faker->randomElement($userIds),
        'name' => $faker->realText(32),
        'privacy' => $faker->randomElement(['PUBLIC', 'PRIVATE']),
        'endorsed' => $faker->boolean(),
        'status' => $faker->randomElement(['ACTIVE', 'INACTIVE']),
        'total_assignments' => 0,
        'average_commitment_rating' => 0,
    ];
});

$factory->define(App\Groove::class, function (Faker\Generator $faker) {
    $userIds = [
        'eI1AV0blghcWzngdT0DprCz2W1V2',
        'aUoNpmZO5jhM35p32M2R5BGiLjg1',
        'U8j6MBTXHwOtoANQ0SajMzx4AkH2',
        'ANDEaGQp6KVVrRaJeM9cI2KsCVV2',
        '44RLIDUo2Sg39CGzobCHf2rY3gX2',
        'kApDcStAQuPLXvFMLL8bmzPAFiD3'
    ];

    return [
        'user_id' => $faker->randomElement($userIds),
        'universal_groove_id' => random_int(1, 10),
        'personal_description' => $faker->realText(32),
        'commitment' => $faker->randomElement([5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,86,90,95,100]),
        'volume_amount' => $faker->randomElement([1,1,1,1,1, 2, 2, 3, 5,10,15,20, 25, 30]),
        'volume_measurement' => $faker->randomElement(['REPS', 'SESSIONS', 'MINS']),
        'frequency_prefix' => $faker->randomElement(['AT_LEAST', 'UP_TO', '', '', '']),
        'frequency_number' => random_int(1, 5),
        'frequency_period' => $faker->randomElement(['PER_WEEK', 'PER_MONTH', 'PER_DAY', 'PER_YEAR', 'PER_FORTNIGHT']),
        'status' => $faker->randomElement(['ACTIVE', 'INACTIVE', 'PAUSED']),
    ];
});

$factory->define(App\Log::class, function (Faker\Generator $faker) {
    $userIds = [
        'eI1AV0blghcWzngdT0DprCz2W1V2',
        'aUoNpmZO5jhM35p32M2R5BGiLjg1',
        'U8j6MBTXHwOtoANQ0SajMzx4AkH2',
        'ANDEaGQp6KVVrRaJeM9cI2KsCVV2',
        '44RLIDUo2Sg39CGzobCHf2rY3gX2',
        'kApDcStAQuPLXvFMLL8bmzPAFiD3'
    ];

    $typeOptions = ['GROOVE', 'TASK', 'JOURNAL'];
    $type = $typeOptions[array_rand($typeOptions)];
    if ($type === 'GROOVE'){
        $grooveId = random_int(1, 10);
    } else {
        $grooveId = null;
    }
    if ($type === 'TASK'){
        $taskId = random_int(1, 10);
    } else {
        $taskId = null;
    }
    if ($type === 'JOURNAL'){
        $journalQuestionId = random_int(1, 10);
    } else {
        $journalQuestionId = null;
    }


    return [
        'user_id' => $faker->randomElement($userIds),
        'type' => $type,
        'groove_id' => $grooveId,
        'task_id' => $taskId,
        'journal_question_id' => $journalQuestionId,
        'performed_at' => $faker->dateTimeBetween('-1 years', 'now'),
        'success_type' => $faker->randomElement(['DONE', 'FAIL']),
        'comment' => $faker->realText(255),
    ];
});

$factory->define(App\Task::class, function (Faker\Generator $faker) {
    $userIds = [
        'eI1AV0blghcWzngdT0DprCz2W1V2',
        'aUoNpmZO5jhM35p32M2R5BGiLjg1',
        'U8j6MBTXHwOtoANQ0SajMzx4AkH2',
        'ANDEaGQp6KVVrRaJeM9cI2KsCVV2',
        '44RLIDUo2Sg39CGzobCHf2rY3gX2',
        'kApDcStAQuPLXvFMLL8bmzPAFiD3'
    ];

    return [
        'user_id' => $faker->randomElement($userIds),
        'description' => $faker->realText(120),
        'status' => $faker->randomElement(['PENDING', 'DONE']),
        'time_remaining' => random_int(1, 90),
    ];
});

$factory->define(App\JournalQuestion::class, function (Faker\Generator $faker) {
    $userIds = [
        'eI1AV0blghcWzngdT0DprCz2W1V2',
        'aUoNpmZO5jhM35p32M2R5BGiLjg1',
        'U8j6MBTXHwOtoANQ0SajMzx4AkH2',
        'ANDEaGQp6KVVrRaJeM9cI2KsCVV2',
        '44RLIDUo2Sg39CGzobCHf2rY3gX2',
        'kApDcStAQuPLXvFMLL8bmzPAFiD3'
    ];

    return [
        'user_id' => $faker->randomElement($userIds),
        'question' => $faker->realText(120),
        'type' => $faker->randomElement([ 'MORNING', 'EVENING', '']),
        'privacy' => $faker->randomElement(['PUBLIC', 'PRIVATE']),
        'endorsed' => $faker->boolean(),
        'explanation' => $faker->realText(200),
        'status' => $faker->randomElement(['ACTIVE', 'INACTIVE']),
        'number_of_appearances' => 0,
        'number_of_answers' => 0
    ];
});


$factory->define(App\Favourites::class, function (Faker\Generator $faker) {

    return [
        'user_id' => 'eI1AV0blghcWzngdT0DprCz2W1V2',
        'type' => 'JOURNAL',
        'entity_id' => random_int(1, 10),
    ];
});


$factory->define(App\DailyJournalQuestions::class, function (Faker\Generator $faker) {

    $userIds = [
        'eI1AV0blghcWzngdT0DprCz2W1V2',
        'aUoNpmZO5jhM35p32M2R5BGiLjg1',
        'U8j6MBTXHwOtoANQ0SajMzx4AkH2',
        'ANDEaGQp6KVVrRaJeM9cI2KsCVV2',
        '44RLIDUo2Sg39CGzobCHf2rY3gX2',
        'kApDcStAQuPLXvFMLL8bmzPAFiD3'
    ];

    return [
        'set_by' => $faker->randomElement($userIds),
        'question_id' => random_int(1, 10)
    ];
});
