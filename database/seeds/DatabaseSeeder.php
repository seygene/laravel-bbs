<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //App\User::truncate();
        $this->call(UsersSeeder::class);

        //App\Article::truncate();
        $this->call(ArticlesSeeder::class);

    }
}
