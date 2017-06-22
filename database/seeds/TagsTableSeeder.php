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
            'locale' => 'fr_FR'
        ]);

        \App\Tag::create([
            'name' => 'enfants',
            'slug' => 'enfants',
            'locale' => 'fr_FR'
        ]);
    }
}
