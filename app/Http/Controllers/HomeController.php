<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Project;
use App\Models\Client;
use App\Support\SiteCache;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $data = SiteCache::remember(SiteCache::KEY_HOME, function () {
            return [
                'products' => Product::query()
                    ->select(['id', 'name_en', 'name_ar', 'image', 'description', 'features', 'sort_order'])
                    ->orderBy('sort_order')
                    ->orderBy('id')
                    ->take(6)
                    ->get(),
                'projects' => Project::query()
                    ->select(['id', 'title_en', 'title_ar', 'description_en', 'description_ar', 'image'])
                    ->orderBy('id')
                    ->take(6)
                    ->get(),
                'clients' => Client::query()
                    ->select(['id', 'name', 'logo'])
                    ->orderBy('id')
                    ->take(8)
                    ->get(),
            ];
        });

        return view('welcome', $data);
    }
}
