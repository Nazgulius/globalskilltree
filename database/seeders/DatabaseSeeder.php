<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {        
        $this->call(GamesSeeder::class);
        $this->call(GameClassesSeeder::class);
        $this->call(GamesServersSeeder::class);
    }
}
