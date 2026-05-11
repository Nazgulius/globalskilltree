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
      'title', 
      'description', 
      'skills', 
      'items', 
      'characteristics', 
      'is_published'
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
}
