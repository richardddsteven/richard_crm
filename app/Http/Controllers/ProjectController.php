<?php

// app/Http/Controllers/ProjectController.php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Lead;
use App\Models\Product;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['lead', 'product'])->get();

        return view('projects.index', compact('projects'));
    }

    //menngkonfirmasi project
    public function approve($id)
    {
        $project = Project::findOrFail($id);
        $project->approved = true;
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project approved.');
    }

    //menampilkan project yang sudah di approve
    public function approvedProjectsForCustomer()
    {
        $projects = Project::with(['lead', 'product'])
            ->where('approved', true)
            ->get();

        return view('customers.index', compact('projects')); // <- arahkan ke view customers.index
    }
}

