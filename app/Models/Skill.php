<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
  protected $table = 'skills';

  protected $fillable = [
    'game_class_id', 'name', 'description', 'effects', 
    'dependencies', 'dependent', 'max_level'
  ];

  public function gameClass(): BelongsTo
  {
      return $this->belongsTo(GameClass::class);
  }
}
