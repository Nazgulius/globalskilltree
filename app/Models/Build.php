<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Build extends Model
{
  use HasFactory;

    // Указываем имя таблицы (если оно отличается от стандартного)
    protected $table = 'builds';


    // Поля, которые можно массово заполнять
    protected $fillable = [
      'user_id',
      'name', 
      'class',
      'recommended_level',
      'description_mini',
      'strengths_and_weaknesses',
      'description', 
      'skills', 
      'items', 
      'characteristics', 
      'is_published',
      'equipment',
      'video',
    ];

    // Если нужны кастомные типы данных для полей
    protected $casts = [
        'skills' => 'array',
        'items' => 'array',
        'characteristics' => 'array'
    ];

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }


}
