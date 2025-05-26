<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
    public function index()
    {
        //dd("uu");
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'project_url' => 'nullable',
            'image' => 'required|image',
            'status' => 'required',
        ]);
        
        $data['image'] = $request->file('image')->store('images', 'public');
        Project::create($data);
    
        return redirect()->route('projects.index')->with('success', 'Project created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'project_url' => 'nullable',
            'image' => 'nullable|image',
            'status' => 'required',
        ]);
    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }
    
        $project->update($data);
    
        return redirect()->route('projects.index')->with('success', 'Project updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
    return redirect()->route('projects.index')->with('success', 'Project deleted!');
    }
}
