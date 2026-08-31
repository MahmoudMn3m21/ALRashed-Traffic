<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;

class GalleryController extends Controller
{
    public function index()
    {
        $items = GalleryItem::query()
            ->select(['id', 'title_en', 'title_ar', 'image', 'sort_order'])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(24);

        return view('gallery.index', compact('items'));
    }
}
