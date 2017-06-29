<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
           'name' => 'Non classé',
            'slug' => 'non-classe',
            'locale' => 'fr',
            'parent_id' => null
        ]);

        \App\Category::create([
            'name' => 'Ecole',
            'slug' => '',
            'locale' => 'fr',
            'parent_id' => null
        ]);

        \App\Category::create([
            'name' => 'Non classified',
            'slug' => 'non-classified',
            'locale' => 'en',
            'parent_id' => null
        ]);

        \App\Category::create([
            'name' => 'غير مصنفة',
            'slug' => 'non-classified',
            'locale' => 'ar',
            'parent_id' => null
        ]);
    }
}
