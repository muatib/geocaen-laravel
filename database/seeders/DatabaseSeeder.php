<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname' => 'System',
            'pseudo' => 'admin',
            'email' => 'admin@geocaen.fr',
            'password' => bcrypt('password'),
            'avatarurl' => '/img/default-avatar.png',
            'description' => 'Administrateur système',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $this->call([
            GameStepSeeder::class
        ]);
    }
}
