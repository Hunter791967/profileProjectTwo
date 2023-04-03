<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\FrontPages\Main_service;

class MainServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = Main_service::all();
        return view('AdminPanel.MainServices.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.MainServices.create');
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
            'main_title' => 'min:8|max:150',
            'sub_title' => 'min:9|max:250',
            'main_image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:3048',
            'main_desc' => 'min:8',
            'sub_desc' => 'min:8',
        ]);

        if ($request->file('main_image')) {
            $imageName = uniqid() . 'Image' . '.' . $request->file('main_image')->extension();

            Image::make($request->file('main_image'))->resize(850, 430)->save(public_path('uploads/mainServices/' . $imageName));
            // $service = Service::create([
            //     'service_image' => $imageName,
            // ]);
        }


        $mainService = Main_service::create([
            'main_title' => $request->main_title,
            'sub_title' => $request->sub_title,
            'main_image' => $imageName,
            'main_desc' => $request->main_desc,
            'sub_desc' => $request->sub_desc,
        ]);

        toast('New Main-Service Has Been Added Successfully!', 'success');
        return redirect()->route('mainService.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FrontPages\Main_service  $main_service
     * @return \Illuminate\Http\Response
     */
    public function show(Main_service $mainService)
    {
        return view('AdminPanel.MainServices.delete', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontPages\Main_service  $main_service
     * @return \Illuminate\Http\Response
     */
    public function edit(Main_service $mainService)
    {
        return view('AdminPanel.MainServices.update', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontPages\Main_service  $main_service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Main_service $mainService)
    {
        $request->validate([
            'main_title' => 'min:8|max:150',
            'sub_title' => 'min:9|max:250',
            'main_image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:3048',
            'main_desc' => 'min:8',
            'sub_desc' => 'min:8',
        ]);

        if ($request->file('main_image')) {
            if ($mainService->main_image != 'prog02.jpg') {
                unlink(public_path('uploads/mainServices/' . $mainService->main_image));
            }
            $imageName = uniqid() . 'Image' . '.' . $request->file('main_image')->extension();

            Image::make($request->file('main_image'))->resize(850, 430)->save(public_path('uploads/mainServices/' . $imageName));
        }


        $mainService->update([
            'main_title' => $request->main_title,
            'sub_title' => $request->sub_title,
            'main_image' => $imageName,
            'main_desc' => $request->main_desc,
            'sub_desc' => $request->sub_desc,
        ]);

        toast('New Main-Service Has Been Updateded Successfully!', 'success');
        return redirect()->route('mainService.index', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontPages\Main_service  $main_service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Main_service $mainService)
    {
        $mainService->delete();

        toast('Selected Main Service Has Been Deleted Successfully!', 'danger');
        return redirect()->route('mainService.index', get_defined_vars());
    }
}
