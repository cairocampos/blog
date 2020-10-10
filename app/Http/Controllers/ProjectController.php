<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $projects = Project::all();

        return view("projects.index", [
            "projects" => $projects
        ]);
    }

    public function create()
    {
        return view("projects.create");
    }

    public function store(ProjectRequest $request)
    {
        $request->validated();
        
        $data = $request->only(["title", "description", "link", "files"]);

        $project = Project::create([
            "title" => $data["title"],
            "description" => $data["description"],
            "link" => $data["link"]
        ]);

        return redirect()->route("projects.index");
    }

    public function edit($id)
    {   
        $project = Project::find($id);
        return view("projects.edit", [
            "project" => $project
        ]);
    }

    public function update(ProjectRequest $request, $id) 
    {
        $request->validated();
        $project = Project::find($id);

        if(!$project) {
            return rediret()->route("projects.index");
        }

        $data = $request->only(["title", "description", "link", "files"]);
        $project->title = $data["title"];
        $project->description = $data["description"];
        $project->link = $data["link"];
        $project->save();

        return redirect()->route("projects.edit", ["id" => $id])
            ->with("status", "Project updated!");
    }
}
