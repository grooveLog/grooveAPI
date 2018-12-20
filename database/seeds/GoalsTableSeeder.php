<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GoalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $goals = factory(App\Goal::class, 10)
            ->create();
    }
}
