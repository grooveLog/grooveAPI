<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroovesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Grooves = factory(App\Groove::class, 10)
            ->create();
    }
}
