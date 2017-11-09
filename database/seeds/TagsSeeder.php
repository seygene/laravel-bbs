<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = config('project.tags');

        foreach ($tags as $slug => $name) {
            App\Tag::create([
                'name'=>$name,
                'slug'=>str_slug($slug)
            ]);
        }
        //$this->command->info('Seeded: tags table mine');

    }
}
