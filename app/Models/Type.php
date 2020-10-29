<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'password'
    ];

    public function photos() {
        return $this->hasMany(Photo::class);
    }

    public function sets() {
        return $this->hasMany(Sets::class);
    }
}
