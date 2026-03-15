<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function indexByCategory(Category $category)
    {
        $products = $category->products()->paginate(12);
        return view('products.index', compact('products', 'category'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
