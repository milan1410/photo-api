<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['title', 'photo_path', 'category_id'];

    // Relationship with category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

