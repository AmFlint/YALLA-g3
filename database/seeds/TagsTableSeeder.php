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
            'locale' => 'fr',
            'color' => 'red'
        ]);

        \App\Tag::create([
            'name' => 'enfants',
            'slug' => 'enfants',
            'locale' => 'fr',
            'color' => 'pink'
        ]);

        \App\Tag::create([
            'name' => 'school',
            'slug' => 'school',
            'locale' => 'en',
            'color' => 'yellow'
        ]);

        \App\Tag::create([
            'name' => 'children',
            'slug' => 'children',
            'locale' => 'en',
            'color' => 'red'
        ]);

        \App\Tag::create([
            'name' => 'syria',
            'slug' => 'syria',
            'locale' => 'en',
            'color' => 'blue'
        ]);

        \App\Tag::create([
            'name' => 'مساعدة',
            'slug' => 'help',
            'locale' => 'ar',
            'color' => 'pink'
        ]);

        \App\Tag::create([
            'name' => 'مدرسة',
            'slug' => 'school',
            'locale' => 'ar',
            'color' => 'blue'
        ]);

        \App\Tag::create([
            'name' => 'الأطفال',
            'slug' => 'children',
            'locale' => 'ar',
            'color' => 'pink'
        ]);
    }
}
