<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        $projects = Project::paginate(8);
        return view('projects.index', [
            'projects' => $projects,
        ]);
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
        $data = $request->all();

        $newProject = new Project();
        $newProject->name = $data['name'];
        $newProject->description = $data['description'];
        $newProject->languages = $data['languages'];
        $newProject->year = $data['year'];
        $newProject->image = $data['image'];
        $newProject->user_id = $request->user()->id;
        $newProject->save();

        return redirect()->route('projects.index', ['id' => $newProject->id])->with('created_success', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show',[
            'project' => $project,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        if($request->user()->id !== $project->user_id) abort('401');
        return view('projects.edit', [
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->all();
        $project = Project::findOrFail($id);

        if($request->user()->id !== $project->user_id) abort('401');

            $project->name = $data['name'];
            $project->languages = $data['languages'];
            $project->image = $data['image'];
            $project->description = $data['description'];
            $project->year = $data['year'];
            $project->update();

        return redirect()->route('projects.index')->with('updated_success', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        if($request->user()->id !== $project->user_id) abort('401');

        return redirect()->route('projects.index')->with('deleted_success', $project);
    }

    public function yourProject(Request $request){

        // $projects = Project::all();

        $projects = Project::where('user_id', $request->user()->id)->paginate(8);
        return view('projects.yourProject', [
            'projects' => $projects,
        ]);
    }
}
