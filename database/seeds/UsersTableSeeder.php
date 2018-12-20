<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $users = factory(App\User::class, 10)
            ->create();
          /*  ->each(function ($user) {
                $user->visions()->save(factory(App\Vision::class)->make());
                $user->goals()->save(factory(App\Goal::class)->make());
                $user->grooves()->save(factory(App\Groove::class)->make());
            });
          */
        
    }
}
