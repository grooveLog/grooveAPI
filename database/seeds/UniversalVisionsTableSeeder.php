<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversalVisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $universalVisions = factory(App\UniversalVision::class, 10)
            ->create();
    }
}
