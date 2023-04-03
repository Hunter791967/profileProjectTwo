<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjType;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProjTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = ProjType::all();
        return view('AdminPanel.ProjectTypes.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allData = Project::all();
        return view('AdminPanel.ProjectTypes.create', get_defined_vars());
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
            'image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:4048',
        ]);

        if ($request->file('image')) {
            $imageName = uniqid() . 'Image' . '.' . $request->file('image')->extension();

            Image::make($request->file('image'))->resize(1020, 520)->save(public_path('uploads/projectTypes/' . $imageName));
            // ProjType::insert([
            //     'image' => $imageName,
            // ]);
        }


        $projType = ProjType::create([
            'name' => $request->name,
            'image' => $imageName,
        ]);

        $projType->projects()->attach($request->project_id);

        toast('New Project Type Has Been Added Successfully!', 'success');
        return redirect()->route('projType.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjType  $projType
     * @return \Illuminate\Http\Response
     */
    public function show(ProjType $projType)
    {
        return view('AdminPanel.ProjectTypes.delete', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjType  $projType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjType $projType)
    {
        $allData = Project::with('proj_types')->get();
        return view('AdminPanel.ProjectTypes.update', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjType  $projType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjType $projType)
    {
        $request->validate([
            'name' => 'min:3|max:150',
            'image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:4048',
        ]);

        if ($request->file('image')) {
            if ($projType->image != 'projType01.jpg') {
                unlink(public_path('uploads/projectTypes/' . $projType->image));
            }

            $imageName = uniqid() . 'Image' . '.' . $request->file('image')->extension();

            Image::make($request->file('image'))->resize(1020, 520)->save(public_path('uploads/projectTypes/' . $imageName));
        }

        $projType->update([
            'name' => $request->name,
            'image' => $imageName,
        ]);

        $projType->projects()->sync($request->project_id);

        toast('Selected Project Type Has Been Updated Successfully!', 'success');
        return redirect()->route('projType.index', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjType  $projType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjType $projType)
    {
        if ($projType->image != 'projtype01.jpg') {
            Storage::disk('public_uploads')->delete('projectTypes/' . $projType->image);
        }

        $projType->projects()->detach();
        $projType->delete();

        toast('Selected Project Type Has Been Deleted Successfully!', 'danger');
        return redirect()->route('projType.index', get_defined_vars());
    }
}
