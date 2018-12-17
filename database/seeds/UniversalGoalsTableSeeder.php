<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversalGoalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universal_goals')->insert([
            //
        ]);
    }
}
