<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\GameClass;

class GameClassesSeeder extends Seeder
{
  public function run(): void
  {
    
    $allClass = [
      [
      'name_class' => 'Novice',
      'skill_point' => 9,
      'rang' => 0,
      'species' => 'Human',
      'description' => 'Описание класса',
      ],
      [
      'name_class' => 'Swordman',
      'skill_point' => 49,
      'rang' => 1,
      'species' => 'Human',
      'description' => 'Описание класса',
      ],

    ];

    // Массовое добавление всех одним запросом
    GameClass::insert($allClass);
  }
}
