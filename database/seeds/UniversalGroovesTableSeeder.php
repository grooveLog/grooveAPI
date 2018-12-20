<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UniversalGroovesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $universalGrooves = factory(App\UniversalGroove::class, 10)
            ->create();
    }
}
