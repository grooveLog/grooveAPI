<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visions = factory(App\Vision::class, 10)
            ->create();
    }
}
