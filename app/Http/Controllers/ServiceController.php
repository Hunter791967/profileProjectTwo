<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = Service::all();
        return view('AdminPanel.Services.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.Services.create');
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
            'service_image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:3048',
            'icon_image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:1048',
            'service_tab' => 'min:10',
        ]);

        if ($request->file('service_image')) {
            $imageName = uniqid() . 'Image' . '.' . $request->file('service_image')->extension();

            Image::make($request->file('service_image'))->resize(323, 240)->save(public_path('uploads/services/' . $imageName));
            // $service = Service::create([
            //     'service_image' => $imageName,
            // ]);
        }

        if ($request->file('icon_image')) {
            $iconName = uniqid() . 'Icon' . '.' . $request->file('icon_image')->extension();

            Image::make($request->file('icon_image'))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/services/' . $iconName));
            // $service = Service::create([
            //     'icon_image' => $iconName,
            // ]);
        }

        $service = Service::create([
            'name' => $request->name,
            'service_tab' => $request->service_tab,
            'service_image' => $imageName,
            'icon_image' => $iconName,
        ]);

        toast('New Service Has Been Added Successfully!', 'success');
        return redirect()->route('service.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('AdminPanel.Services.delete', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('AdminPanel.Services.update', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'min:3|max:150',
            'service_image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:3048',
            'icon_image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:1048',
            'service_tab' => 'min:10',
        ]);

        if ($request->file('service_image')) {
            if ($service->service_image != 'erp01.jpg') {
                unlink(public_path('uploads/services/' . $service->serivce_image));
            }
            $imageName = uniqid() . 'Image' . '.' . $request->file('service_image')->extension();
            Image::make($request->file('service_image'))->resize(323, 240)->save(public_path('uploads/services/' . $imageName));
            $service->update(['service_image' => $imageName]);
        }

        if ($request->file('icon_image')) {
            if ($service->icon_image != 'digitransform01.png') {
                unlink(public_path('uploads/services/' . $service->icon_image));
            }
            $iconName = uniqid() . 'Image' . '.' . $request->file('icon_image')->extension();
            Image::make($request->file('icon_image'))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/services/' . $iconName));
            $service->update(['icon_image' => $iconName]);
        }

        $service->update([
            'name' => $request->name,
            'service_tab' => $request->service_tab,
        ]);

        toast('New Service Has Been Added Successfully!', 'success');
        return redirect()->route('service.index', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        toast('Selected Service Has Been Deleted Successfully!', 'danger');
        return redirect()->route('service.index', get_defined_vars());
    }
}
