<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\games;

class items extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'name',
        'price',
    ];

    public function games()
    {
        return $this->belongsTo(games::class, 'game_id');
    }
}
