<?php

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Media::create([
           'type' => 'image',
            'url' => 'http://img1.ak.crunchyroll.com/i/spire1/e7c936b5eacd4fd0f89bd7b651954e6b1383245216_full.jpg'
        ]);

        \App\Media::create([
           'type' => 'youtube',
            'url' => 'https://www.youtube.com/embed/_tcW-j7KFgY'
        ]);

        \App\Media::create([
           'type' => 'youtube',
            'url' => 'https://www.youtube.com/embed/m3ESXUyF3DU&t=1413s'
        ]);
    }
}
