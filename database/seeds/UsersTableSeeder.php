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
        $faker = Faker\Factory::create();

        $users[0] = [
            'id' => 'eI1AV0blghcWzngdT0DprCz2W1V2',
            'email'=> 'homer@groove.proto',
            'display_name' => 'Homer Simpson',
            'firstname' => 'Homer',
            'lastname' => 'Simpson',
            'gender' => 'M'
        ];

        $users[1] = [
            'id' => 'aUoNpmZO5jhM35p32M2R5BGiLjg1',
            'email'=> 'donald@groove.proto',
            'display_name' => 'Donald Trump',
            'firstname' => 'Donald',
            'lastname' => 'Trump',
            'gender' => 'M'
        ];

        $users[2] = [
            'id' => 'U8j6MBTXHwOtoANQ0SajMzx4AkH2',
            'email'=> 'vladimir@groove.proto',
            'display_name' => 'Vladimir Putin',
            'firstname' => 'Vladimir',
            'lastname' => 'Putin',
            'gender' => 'M'
        ];

        $users[3] = [
            'id' => 'ANDEaGQp6KVVrRaJeM9cI2KsCVV2',
            'email'=> 'victoria@groove.proto',
            'display_name' => 'Victoria Beckham',
            'firstname' => 'Victoria',
            'lastname' => 'Beckham',
            'gender' => 'F'
        ];

        $users[4] = [
            'id' => '44RLIDUo2Sg39CGzobCHf2rY3gX2',
            'email'=> 'kim@groove.proto',
            'display_name' => 'Kim Kardashian',
            'firstname' => 'Kim',
            'lastname' => 'Kardashian',
            'gender' => 'F'
        ];

        $users[5] = [
            'id' => 'kApDcStAQuPLXvFMLL8bmzPAFiD3',
            'email'=> 'charlie@groove.proto',
            'display_name' => 'Charlie Chaplin',
            'firstname' => 'Charlie',
            'lastname' => 'Chaplin',
            'gender' => 'M'
        ];

        for($i = 0; $i < 6; $i++) {
            App\User::create([
                'id' => $users[$i]['id'],
                'email' => $users[$i]['email'],
                'authentication_method' => $faker->randomElement(['FACEBOOK', 'TWITTER', 'EMAIL']),
                'display_name' => $users[$i]['display_name'],
                'firstname' => $users[$i]['firstname'],
                'lastname' => $users[$i]['lastname'],
                'birthday' => $faker->dateTimeBetween('-80 years', '-16 years'),
                'gender' => $users[$i]['gender'],
                'personal_summary' => $faker->realText(255),
                'image' => $faker->imageUrl(400, 400, "people"),
                'locale' => $faker->locale,
                'status' => $faker->randomElement(['ACTIVE', 'INACTIVE', 'SUSPENDED']),
            ]);
        };

        /*
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
