<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionnairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questionnaires = factory(App\Questionnaire::class, 10)
            ->create();
    }
}
