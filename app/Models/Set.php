<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory;

    protected $imagePath = '/images/';

    protected $fillable = [
        'path', 'photo_id', 'type_id'
    ];

    public function photo() {
        return $this->belongsTo(Photo::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function getPathAttribute($value) {
        return $this->imagePath.$value;
    }
}
