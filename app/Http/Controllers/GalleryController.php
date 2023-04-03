<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FrontPages\Gallery;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = Gallery::all();
        return view('AdminPanel.Gallery.show', compact('showData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.Gallery.create');
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
            'icon_image.*' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:3048',
        ]);

        if ($request->file('icon_image')) {

            foreach ($request->file('icon_image') as $img) {
                $pannerName = uniqid() . 'Icon' . '.' . $img->extension();
                Image::make($img)->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/icons/' . $pannerName));
                $Gallery = Gallery::insert([
                    'icon_image' => $pannerName,
                ]);
            }
        }

        toast('New Galleries Has Been Added Successfully!', 'success');
        return redirect()->route('Gallery.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $Gallery)
    {
        return view('AdminPanel.Gallery.delete', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $Gallery)
    {
        return view('AdminPanel.Gallery.update', compact('Gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $Gallery)
    {
        $request->validate([
            'icon_image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:3048',
        ]);

        if ($request->file('icon_image')) {

            $pannerName = uniqid() . 'Icon' . '.' . $request->file('icon_image')->extension();
            Image::make($request->file('icon_image'))->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/icons/' . $pannerName));
            $Gallery->update([
                'icon_image' => $pannerName,
            ]);
        }

        toast('This Icon Has Been Updated Successfully!', 'success');
        return redirect()->route('Gallery.index', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $Gallery)
    {

        if ($Gallery->icon_image) {
            unlink(public_path('uploads/icons/' . $Gallery->icon_image));
        }
        $Gallery->delete();

        toast('Selected Icon Has Been Deleted Successfully!', 'danger');
        return redirect()->route('Gallery.index');
    }
}
