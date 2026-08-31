<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::query()
            ->select(['id', 'title_en', 'title_ar', 'description_en', 'description_ar', 'image'])
            ->orderBy('id')
            ->paginate(10);

        return view('projects.index', compact('projects'));
    }
}