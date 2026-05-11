<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
  use HasFactory;

    protected $table = 'images';

    protected $fillable = ['game_class_id', 'path', 'type', 'metadata'];

    protected $casts = [
        'metadata' => 'array'
    ];

    public function build(): BelongsTo
    {
        return $this->belongsTo(Build::class);
    }
}
