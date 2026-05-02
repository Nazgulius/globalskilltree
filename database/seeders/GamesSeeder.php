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
          'description' => 'Myth of Yggdrasil combines a classic foundation with modern design to deliver an experience that respects its origins while evolving for modern players.',
        ]);

        DB::table('games')->insert([
          'name_game' => 'Ragnarok Online',
          'name_server' => 'MOTR',
          'link_server' => 'https://motr-online.com/',
          'max_lvl' => '250',
          'description' => 'Русскоязычный сервер онлайн-игры Ragnarok Online (РО). Он существует более 17 лет и продолжает активно обновляться.',
        ]);

        DB::table('games')->insert([
          'name_game' => 'Ragnarok Online 2',
          'name_server' => 'RO2',
          'link_server' => 'https://playragnarok2.com/',
          'max_lvl' => '100',
          'description' => 'Ragnarok Online 2 info',
        ]);

        DB::table('games')->insert([
          'name_game' => 'Ragnarok Online 3',
          'name_server' => 'RO3',
          'link_server' => 'https://ro3global.com/',
          'max_lvl' => '100',
          'description' => 'Ragnarok Online 3 info',
        ]);

    }
}
