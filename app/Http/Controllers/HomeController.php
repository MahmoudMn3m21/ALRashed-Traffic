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
        $products = Product::all();
        $projects = Project::all();
        $clients = Client::all();

        return view('welcome', compact('products', 'projects', 'clients'));
    }
}