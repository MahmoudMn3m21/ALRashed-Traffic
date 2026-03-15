<?php

namespace App\Http\Controllers;

use App\Models\CatalogItem;

class CatalogController extends Controller
{
    public function index()
    {
        $items = CatalogItem::orderBy('sort_order')->orderBy('id')->get();
        return view('catalog.index', compact('items'));
    }
}
