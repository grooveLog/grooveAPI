<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JournalFavouritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $journalFavourites = factory(App\JournalFavourites::class, 1)
            ->create();
    }
}