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
          'description' => 'Ragnarok Online — массовая многопользовательская ролевая онлайн-игра (MMORPG), разработанная корейской компанией GRAVITY Co., Ltd.. Выпущена в 2002 году.',
        ]);

        DB::table('games')->insert([
          'name_game' => 'Ragnarok Online 2',
          'description' => 'Ragnarok Online 2 — это MMORPG в жанре фэнтези, продолжение популярной игры Ragnarok Online. Её разработала южнокорейская студия Gravity Corp., а позже поддержку взяла на себя Gravity Interactive. Игра вышла 1 мая 2013 года.',
        ]);

        DB::table('games')->insert([
          'name_game' => 'Ragnarok Online 3',
          'description' => 'Ragnarok Online 3 — это кроссплатформенная MMORPG от студии Gravity, являющаяся официальным продолжением культовой Ragnarok Online. Игра сочетает в себе классическую атмосферу оригинала с современными механиками, обновлённой пиксельной графикой и сезонной моделью развития.',
        ]);

    }
}
