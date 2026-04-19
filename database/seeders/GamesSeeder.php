<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('games')->insert([
          'name_game' => 'Ragnarok Online',
          'name_server' => 'Myth of Yggdrasil',
          'link_server' => 'https://mythofyggdrasil.com/',
          'max_lvl' => '100',
          'description' => 'Myth of Yggdrasil combines a classic foundation with modern design to deliver an experience that respects its origins while evolving for modern players.l',
        ]);

    }
}
