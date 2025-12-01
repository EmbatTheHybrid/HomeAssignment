<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function categories() {
        return $this->belongsToMany(Category::class, 'game_category', 'game_id', 'category_id');
    }

    public function developer() {
        return $this->belongsTo(Developer::class);
    }
}
