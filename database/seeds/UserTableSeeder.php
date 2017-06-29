<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.fr',
            'password' => '$2y$10$n2K/3T04jrdQ3qgGegTfGuDNZwS/6jdGXrRug771ILBJgrYFonlgO'
        ]);
    }
}
