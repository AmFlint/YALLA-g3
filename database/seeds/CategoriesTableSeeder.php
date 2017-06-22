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
        $category1 = \App\Category::create([
           'name' => 'Non classé',
            'slug' => 'non-classe',
            'locale' => 'fr_FR',
            'parent_id' => 0
        ]);

        $category2 = \App\Category::create([
            'name' => 'Ecole',
            'slug' => '',
            'locale' => 'fr_FR',
            'parent_id' => 0
        ]);
    }
}
