<?php

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();

        $users->each(function ($user) {
            $temp_array = [1,2,3,4,5];
            $iter_limit = array_random($temp_array);
            print($iter_limit);
            for($ii=0; $ii<$iter_limit; $ii++) {
                $user->articles()->save(
                    factory(App\Article::class)->make()
                );
            }
        });
    }
}
