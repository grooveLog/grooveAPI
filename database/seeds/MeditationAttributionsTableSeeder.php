<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeditationAttributionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meditationAttributions = factory(App\MeditationAttribution::class, 10)
            ->create();
    }
}
