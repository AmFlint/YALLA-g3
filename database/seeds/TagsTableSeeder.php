<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Tag::create([
            'name' => 'santé',
            'slug' => 'sante',
            'locale' => 'fr'
        ]);

        \App\Tag::create([
            'name' => 'enfants',
            'slug' => 'enfants',
            'locale' => 'fr'
        ]);

        \App\Tag::create([
            'name' => 'school',
            'slug' => 'school',
            'locale' => 'en'
        ]);

        \App\Tag::create([
            'name' => 'children',
            'slug' => 'children',
            'locale' => 'en'
        ]);

        \App\Tag::create([
            'name' => 'syria',
            'slug' => 'syria',
            'locale' => 'en'
        ]);

        \App\Tag::create([
            'name' => 'help',
            'slug' => 'help',
            'locale' => 'ar'
        ]);

        \App\Tag::create([
            'name' => 'is on the way',
            'slug' => 'is-on-the-way',
            'locale' => 'ar'
        ]);
    }
}
