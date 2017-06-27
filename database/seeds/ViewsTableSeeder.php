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
        // post 1
        \App\View::create([
           'views' => 17,
            'created_at' => '2017-02-26 19:39:00'
        ]);

        \App\View::create([
            'views' => 109,
            'created_at' => '2017-03-26 19:39:00'
        ]);

        \App\View::create([
            'views' => 210,
            'created_at' => '2017-04-26 19:39:00'
        ]);

        \App\View::create([
            'views' => 320,
            'created_at' => '2017-05-26 19:39:00'
        ]);

        // post 2
        \App\View::create([
            'views' => 9,
            'created_at' => '2017-02-26 19:39:00'
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
            'created_at' => '2017-05-26 19:39:00'
        ]);

        // post 3
        \App\View::create([
            'views' => 201,
            'created_at' => '2017-04-26 19:39:00'
        ]);

        \App\View::create([
            'views' => 90,
            'created_at' => '2017-05-26 19:39:00'
        ]);

        // post 4

        \App\View::create([
            'views' => 802,
            'created_at' => '2017-04-26 19:39:00'
        ]);

        \App\View::create([
            'views' => 207,
            'created_at' => '2017-05-26 19:39:00'
        ]);

        //post 5

        \App\View::create([
            'views' => 65,
            'created_at' => '2017-04-26 19:39:00'
        ]);

        \App\View::create([
            'views' => 143,
            'created_at' => '2017-05-26 19:39:00'
        ]);

        //post 6

        \App\View::create([
            'views' => 143,
            'created_at' => '2017-04-26 19:39:00'
        ]);

        \App\View::create([
            'views' => 260,
            'created_at' => '2017-05-26 19:39:00'
        ]);

        // post 7
        \App\View::create([
            'views' => 210,
            'created_at' => '2017-04-26 19:39:00'
        ]);

        \App\View::create([
            'views' => 280,
            'created_at' => '2017-05-26 19:39:00'
        ]);

        //post 8

        \App\View::create([
            'views' => 310,
            'created_at' => '2017-04-26 19:39:00'
        ]);

        \App\View::create([
            'views' => 430,
            'created_at' => '2017-05-26 19:39:00'
        ]);
    }
}
