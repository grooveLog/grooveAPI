<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisionTimescalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visionTimescales = factory(App\VisionTimescale::class, 10)
            ->create();
    }
}
