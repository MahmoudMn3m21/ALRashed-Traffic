<?php

namespace App\Http\Controllers;

use App\Models\CatalogItem;

class CatalogController extends Controller
{
    public function index()
    {
        $items = CatalogItem::query()
            ->select(['id', 'title_en', 'title_ar', 'file', 'sort_order'])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('catalog.index', compact('items'));
    }
}
