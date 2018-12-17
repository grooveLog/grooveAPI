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
        DB::table('meditation_attributions')->insert([
            //
        ]);
    }
}
