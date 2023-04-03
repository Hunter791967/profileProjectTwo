<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class HomeSliderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = HomeSlider::all();
        return view('AdminPanel.HomeSlider.show', compact('showData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.HomeSlider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->title);
        // dd($request->file('panner'));
        $request->validate([
            'title' => 'min:8|max:50',
            'sub_title' => 'min:8|max:50',
            'title_desc' => 'min:20|max:200',
            'btn_text' => 'required|min:3|max:20',
            'panner' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:3048',
            'scetion_video' => 'mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv |max:8048',
            // 'scetion_video' => 'video|codec:h264|duration_max:6|',
        ]);

        if ($request->file('panner')) {
            $pannerName = uniqid() . 'Panner' . '.' . $request->file('panner')->extension();

            Image::make($request->file('panner'))->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/homeSlider/' . $pannerName));
            $homeSlider = HomeSlider::create([
                'panner' => $pannerName,
            ]);
        }

        if ($request->file('scetion_video')) {
            $videoName = uniqid() . 'Video' . '.' . $request->file('scetion_video')->extension();

            $request->file('scetion_video')->move(public_path('uploads/homeSlider/'), $videoName);
            // $homeSlider = HomeSlider::create([
            //     'scetion_video' => $videoName,
            // ]);
        }

        $homeSlider = HomeSlider::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'title_desc' => $request->title_desc,
            'btn_text' => $request->btn_text,
            'scetion_video' => $videoName,
        ]);
        // dd($homeSlider);
        toast('New HomeSlider Has Been Added Successfully!', 'success');
        return redirect()->route('HomeSlider.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSlider $homeSlider)
    {
        return view('AdminPanel.HomeSlider.delete', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeSlider $homeSlider)
    {
        // dd($homeSlider);
        return view('AdminPanel.HomeSlider.update', compact('homeSlider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeSlider $homeSlider)
    {
        $request->validate([
            'title' => 'min:8|max:50',
            'sub_title' => 'min:8|max:50',
            'title_desc' => 'min:20|max:200',
            'btn_text' => 'required|min:3|max:20',
            'panner' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:3048',
            'scetion_video' => 'mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv |max:6048',
        ]);

        if ($request->file('panner')) {
            if ($homeSlider->panner != 'amr01.png') {
                unlink(public_path('uploads/homeSlider/' . $homeSlider->panner));
            }
            $pannerName = uniqid() . 'Panner' . '.' . $request->file('panner')->extension();
            Image::make($request->file('panner'))->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/homeSlider/' . $pannerName));
            $homeSlider->update(['panner' => $pannerName]);
        }

        if ($request->file('scetion_video')) {
            $videoName = uniqid() . 'Video' . '.' . $request->file('scetion_video')->extension();

            $request->file('scetion_video')->move(public_path('uploads/homeSlider/' . $videoName));
            $homeSlider->update(['video' => $videoName]);
        }


        $homeSlider->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'title_desc' => $request->title_desc,
            'btn_text' => $request->btn_text,
        ]);

        toast('New HomeSlider Has Been Updated Successfully!', 'success');
        return redirect()->route('HomeSlider.index', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeSlider $homeSlider)
    {
        if ($homeSlider->panner != 'amr01.png') {
            Storage::disk('public_uploads')->delete('HomeSlider/' . $homeSlider->panner);
        }
        if ($homeSlider->scetion_video) {
            unlink(public_path('uploads/homeSlider/' . $homeSlider->scetion_video));
        }
        $homeSlider->delete();

        toast('Selected User Has Been Deleted Successfully!', 'danger');
        return redirect()->route('HomeSlider.index');
    }
}
