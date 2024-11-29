<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Photo;


class PhotoController extends Controller
{
    public function getAllCategoryIds($category)
    {
        $ids = [$category->id];

        foreach ($category->children as $child) {
            $ids = array_merge($ids, $this->getAllCategoryIds($child));
        }

        return $ids;
    }

    public function photosByCategory($categoryId)
    {
        $category = Category::with('children')->findOrFail($categoryId);

        // Get all category IDs including subcategories
        $categoryIds = $this->getAllCategoryIds($category);

        // Fetch photos for all these categories
        $photos = Photo::whereIn('category_id', $categoryIds)->get();

        return response()->json($photos);
    }

}
