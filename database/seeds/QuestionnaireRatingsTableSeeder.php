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
        DB::table('questionnaire_ratings')->insert([
            //
        ]);
    }
}
