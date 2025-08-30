<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Project;
use App\Models\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $products = Product::take(6)->get();
        $projects = Project::take(6)->get();
        $clients = Client::take(8)->get();

        return view('welcome', compact('products', 'projects', 'clients'));
    }
}