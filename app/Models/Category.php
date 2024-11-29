<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'parent_id'];

    // Recursive relationship to fetch subcategories
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Relationship to fetch photos for this category
    public function photos()
    {
        return $this->hasMany(Photo::class, 'category_id');
    }
}
