<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeditationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meditations')->insert([
            //
        ]);
    }
}
