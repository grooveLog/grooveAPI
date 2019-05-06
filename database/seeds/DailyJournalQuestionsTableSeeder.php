<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailyJournalQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach(range(0,30) as $index)
        {
            factory(App\DailyJournalQuestions::class, 1)->create([
                'day' => date('Y-m-d', strtotime("+" . $index . " day")),
            ]);
        }

    }
}