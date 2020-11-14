<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    // protected $imagePath = '/images/';

    protected $fillable = [
        'path', 'type_id', 'requirePassword'
    ];

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function sets() {
        return $this->hasMany(Sets::class);
    }

    // public function getPathAttribute($value) {
    //     return $this->imagePath.$value;
    // }
}
