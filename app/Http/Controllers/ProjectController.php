<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjType;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = Project::all(['id', 'name', 'client_name', 'project_desc']);
        return view('AdminPanel.Projects.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allData = ProjType::all();
        // $showData = Project::all();
        return view('AdminPanel.Projects.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'min:3|max:150',
            'image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:6048',
            'client_name' => 'required|min:3|max:250',
            'period' => 'required',
            'date' => 'date',
            'project_desc' => 'min:10',
        ]);

        if ($request->file('image')) {
            $projectImage = uniqid() . 'Image' . '.' . $request->file('image')->extension();

            Image::make($request->file('image'))->resize(850, 430)->save(public_path('uploads/projects/' . $projectImage));
            // dd($projectImage);
            // Project::insert([
            //     'image' => $projectImage,
            // ]);
        }


        $project = Project::create([
            'name' => $request->name,
            'image' => $projectImage,
            'client_name' => $request->client_name,
            'location_add' => $request->location_add,
            'period' => $request->period,
            'date' => $request->date,
            'project_link' => $request->project_link,
            'project_desc' => $request->project_desc,
        ]);

        $project->proj_types()->attach($request->proj_type_id);


        toast('New Project Has Been Added Successfully!', 'success');
        return redirect()->route('project.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // dd($project);
        return view('AdminPanel.Projects.delete', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $allData = ProjType::with('projects')->get();

        return view('AdminPanel.Projects.update', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'min:3|max:150',
            'image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:5048',
            'client_name' => 'required|min:3|max:250',
            'period' => 'required',
            'date' => 'date',
            'project_desc' => 'min:10',
        ]);

        if ($request->file('image')) {
            if ($project->image != 'organization.png') {
                unlink(public_path('uploads/projects/' . $project->image));
            }

            $projectImage = uniqid() . 'Image' . '.' . $request->file('image')->extension();

            Image::make($request->file('image'))->resize(850, 430)->save(public_path('uploads/projects/' . $projectImage));
        }

        $project->update([
            'name' => $request->name,
            'image' => $projectImage,
            'client_name' => $request->client_name,
            'location_add' => $request->location_add,
            'period' => $request->period,
            'date' => $request->date,
            'project_link' => $request->project_link,
            'project_desc' => $request->project_desc,
        ]);

        $project->proj_types()->sync($request->proj_type_id);

        toast('Selected Project Has Been Updated Successfully!', 'success');
        return redirect()->route('project.index', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->image != 'organization.png') {
            Storage::disk('public_uploads')->delete('projects/' . $project->image);
        }

        $project->proj_types()->detach();
        $project->delete();

        toast('Selected Project Has Been Deleted Successfully!', 'danger');
        return redirect()->route('project.index', get_defined_vars());
    }
}
