<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;

class GalleryController extends Controller
{
    public function index()
    {
        $items = GalleryItem::orderBy('sort_order')->orderBy('id')->get();
        return view('gallery.index', compact('items'));
    }
}
