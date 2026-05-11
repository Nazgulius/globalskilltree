<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
  protected $table = 'items';

  protected $fillable = [
    'game_class_id', 'name', 'type', 'type_class', 
    'description', 'stats', 'required_level', 
    'required_class', 'required_class_rang'
  ];

  public function gameClass(): BelongsTo
  {
      return $this->belongsTo(GameClass::class);
  }
}
