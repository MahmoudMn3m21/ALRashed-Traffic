<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexByCategory(Request $request, Category $category)
    {
        $mainCategories = Category::query()
            ->with(['subcategories' => fn ($q) => $q->orderBy('sort_order')->orderBy('name_en')])
            ->orderBy('name_en')
            ->get();

        $subcategoryId = $request->query('subcategory');

        $productsQuery = Product::query()->where('category_id', $category->id);
        if ($subcategoryId) {
            $productsQuery->where('subcategory_id', $subcategoryId);
        }

        $products = $productsQuery->paginate(12)->withQueryString();

        return view('products.index', compact('products', 'category', 'mainCategories', 'subcategoryId'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
