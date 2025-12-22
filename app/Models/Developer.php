<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Developer extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'name',
        'email'
    ];

    protected $sortable = [
        'name',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
