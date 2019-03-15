<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JournalQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $journalQuestions = factory(App\JournalQuestion::class, 200)
            ->create();
    }
}