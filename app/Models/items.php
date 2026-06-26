<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class items extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'name',
        'price',
    ];

    public function game()
    {
        return $this->belongsTo(games::class);
    }
}
