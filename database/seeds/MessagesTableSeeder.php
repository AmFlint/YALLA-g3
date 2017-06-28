<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Message::create([
            'name' => 'Antoine Masselot',
            'email' => 'antoine.masselot@hetic.net',
            'content' => 'Bravo, je souhaitais vous encourager dans votre démarche !',
        ]);

        \App\Message::create([
            'name' => 'Déborah Baud',
            'email' => 'deborah.baud@hetic.net',
            'content' => 'Merci de votre geste !',
            'viewed' => 1
        ]);

        \App\Message::create([
            'name' => 'Gérome Lacaux',
            'email' => 'gerome.lacaux@hetic.net',
            'content' => 'Hi, I\'m happy to get up every morning to see that people like you exist !',
        ]);

        \App\Message::create([
            'name' => 'Ugo Degioanni',
            'email' => 'ugo.degioanni@hetic.net',
            'content' => 'Hello there! I wanted to know if you guys need any help sometimes ? I volunteer !',
            'viewed' => 1
        ]);

        \App\Message::create([
            'name' => 'Nicolas Leroy',
            'email' => 'nicolas.leroy@hetic.net',
            'content' => 'Ce que vous faites, c\'est extraordinaire !',
        ]);

        \App\Message::create([
            'name' => 'Julien Furberg',
            'email' => 'julien.furberg@hetic.net',
            'content' => 'Comment parrainer un enfant ?',
        ]);
    }
}
