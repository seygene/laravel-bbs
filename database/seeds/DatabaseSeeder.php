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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        App\Tag::truncate();
        $this->call(TagsSeeder::class);

        App\User::truncate();
        $this->call(UsersSeeder::class);

        App\Article::truncate();
        $this->call(ArticlesSeeder::class);

        DB::table('article_tag')->truncate();
        $this->call(ArticleTagSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
