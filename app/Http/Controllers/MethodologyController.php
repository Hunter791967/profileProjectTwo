<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\FrontPages\Methodology;

class MethodologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = Methodology::all();
        return view('AdminPanel.Methodologies.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.Methodologies.create');
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
            'image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:3048',
        ]);

        if ($request->file('image')) {
            $imageName = uniqid() . 'Image' . '.' . $request->file('image')->extension();

            Image::make($request->file('image'))->resize(320, 240)->save(public_path('uploads/methodology/' . $imageName));
            // $service = Service::create([
            //     'service_image' => $imageName,
            // ]);
        }


        $methodology = Methodology::create([
            'name' => $request->name,
            'image' => $imageName,
        ]);

        toast('New Methodology Has Been Added Successfully!', 'success');
        return redirect()->route('methodology.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FrontPages\Methodology  $methodology
     * @return \Illuminate\Http\Response
     */
    public function show(Methodology $methodology)
    {
        return view('AdminPanel.Methodologies.delete', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontPages\Methodology  $methodology
     * @return \Illuminate\Http\Response
     */
    public function edit(Methodology $methodology)
    {
        return view('AdminPanel.Methodologies.update', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontPages\Methodology  $methodology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Methodology $methodology)
    {
        $request->validate([
            'name' => 'min:3|max:150',
            'image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:3048',
        ]);

        if ($request->file('image')) {
            $imageName = uniqid() . 'Image' . '.' . $request->file('image')->extension();

            Image::make($request->file('image'))->resize(320, 240)->save(public_path('uploads/methodology/' . $imageName));
            // $service = Service::create([
            //     'service_image' => $imageName,
            // ]);
        }


        $methodology->update([
            'name' => $request->name,
            'image' => $imageName,
        ]);

        toast('New Methodology Has Been Updateded Successfully!', 'success');
        return redirect()->route('methodology.index', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontPages\Methodology  $methodology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Methodology $methodology)
    {
        $methodology->delete();

        toast('Selected Methodology Has Been Deleted Successfully!', 'danger');
        return redirect()->route('methodology.index', get_defined_vars());
    }
}
