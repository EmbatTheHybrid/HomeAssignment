<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Category extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'name'
    ];

    protected $sortable = ['name'];

    public function games() {
        return $this->belongsToMany(Game::class, 'game_category', 'category_id', 'game_id');
    }
}
