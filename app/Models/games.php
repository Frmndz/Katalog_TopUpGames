<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class games extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'publisher',
    ];

    public function items()
    {
        return $this->hasMany(items::class);
    }
}
