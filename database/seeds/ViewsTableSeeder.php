<?php

use Illuminate\Database\Seeder;

class ViewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\View::create([
           'views' => 17,
            'created_at' => '2017-05-26 19:39:00'
        ]);

        \App\View::create([
            'views' => 109,
            'created_at' => '2017-04-26 19:39:00'
        ]);

        \App\View::create([
            'views' => 210,
            'created_at' => '2017-05-26 19:39:00'
        ]);

        \App\View::create([
            'views' => 320,
            'created_at' => '2017-06-26 19:39:00'
        ]);

        \App\View::create([
            'views' => 9,
            'created_at' => '2017-05-26 19:39:00'
        ]);

        \App\View::create([
            'views' => 900,
            'created_at' => '2017-03-26 19:39:00'
        ]);

        \App\View::create([
            'views' => 205,
            'created_at' => '2017-04-26 19:39:00'
        ]);

        \App\View::create([
            'views' => 143,
            'created_at' => '2017-03-26 19:39:00'
        ]);
    }
}
