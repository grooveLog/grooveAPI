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
        $userTerms = factory(App\UserTerm::class, 10)
            ->create();
    }
}
