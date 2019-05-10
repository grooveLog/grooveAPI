<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            MeditationAttributionsTableSeeder::class,
            MeditationsTableSeeder::class,
            UserTermsTableSeeder::class,
            VisionTimescalesTableSeeder::class,
            UniversalVisionsTableSeeder::class,
            VisionsTableSeeder::class,
            UniversalGoalsTableSeeder::class,
            GoalsTableSeeder::class,
            UniversalGroovesTableSeeder::class,
            GroovesTableSeeder::class,
            QuestionnairesTableSeeder::class,
            QuestionsTableSeeder::class,
            QuestionnaireRatingsTableSeeder::class,
            TasksTableSeeder::class,
            JournalQuestionsTableSeeder::class,
            LogsTableSeeder::class,
            DailyJournalQuestionsTableSeeder::class,
        ]);

    }
}
