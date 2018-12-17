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

        factory(App\User::class, 50)->create();

        /*
        DB::table('users')->insert([
            'auth_id' => str_random(32),
            'email' => str_random(10).'@gmail.com',
            'username' => str_random(10),
            'firstname' => str_random(10),
            'lastname' => str_random(10),
            'personal_summary' => str_random(10),
            'locale' => str_random(10),
            'status' => str_random(10),
        ]);
        */
    }
}
