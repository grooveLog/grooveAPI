<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_terms')->insert([
            //
        ]);
    }
}
