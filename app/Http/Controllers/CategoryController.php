<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Support\SiteCache;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = SiteCache::remember(SiteCache::KEY_CATEGORIES_INDEX, function () {
            return Category::query()
                ->select(['id', 'name_en', 'name_ar', 'image'])
                ->withCount('products')
                ->orderBy('name_en')
                ->get();
        });

        return view('categories.index', compact('categories'));
    }
}
