<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameServer extends Model
{
  protected $fillable = [
        'game_id',
        'name_server',
        'link_server',
        'max_lvl',
        'description',
    ];
}
