<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Support\SiteCache;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexByCategory(Request $request, Category $category)
    {
        $mainCategories = SiteCache::remember(SiteCache::KEY_CATEGORY_TREE, function () {
            return Category::query()
                ->select(['id', 'name_en', 'name_ar'])
                ->with(['subcategories' => fn ($q) => $q
                    ->select(['id', 'category_id', 'name_en', 'name_ar', 'sort_order'])
                    ->orderBy('sort_order')
                    ->orderBy('name_en')])
                ->orderBy('name_en')
                ->get();
        });

        $subcategoryId = $request->query('subcategory');

        $productsQuery = Product::query()
            ->select([
                'id', 'category_id', 'subcategory_id', 'name_en', 'name_ar',
                'image', 'description', 'code', 'sort_order', 'created_at', 'updated_at',
            ])
            ->where('category_id', $category->id);

        if ($subcategoryId) {
            $productsQuery->where('subcategory_id', $subcategoryId);
        }

        $products = $productsQuery
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(12)
            ->withQueryString();

        return view('products.index', compact('products', 'category', 'mainCategories', 'subcategoryId'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
