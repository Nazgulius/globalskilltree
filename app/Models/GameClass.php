<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GameClass extends Model
{
  use HasFactory;

    protected $fillable = [
        'name_class', 'skill_point', 'rang', 'species', 
        'description'
    ];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'game_class_id');
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class, 'game_class_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class, 'game_class_id');
    }
}
