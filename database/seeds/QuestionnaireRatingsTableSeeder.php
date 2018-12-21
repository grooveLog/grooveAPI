<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionnaireRatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questionnaireRatings = factory(App\QuestionnaireRating::class, 10)
            ->create();
    }
}
