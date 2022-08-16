<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(500)->create();
         User::create ([
            'role' => 'admin',
            'name' => 'admin',
            'nis' => 'admin',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(60)
         ]);
    }
}
