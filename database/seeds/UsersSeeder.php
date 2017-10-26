<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Byeong Ahn',
            'email' => 'quote@hkwindows.net',
            'password' => bcrypt('123456'),
            'activated' => 1,
            'remember_token' => str_random(10)
        ]);
        factory(App\User::class, 5)->create();
    }
}
