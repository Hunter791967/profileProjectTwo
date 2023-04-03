<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\FrontPages\Contact_icon;
use Illuminate\Support\Facades\Storage;

class ContactIconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = Contact_icon::all();
        return view('AdminPanel.ContactIcons.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.ContactIcons.create');
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
            'icon_image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:1048',
            'icon_link' => 'min:8',
        ]);

        if ($request->file('icon_image')) {

            $iconName = uniqid() . 'Icon' . '.' . $request->file('icon_image')->extension();
            Image::make($request->file('icon_image'))->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/contactIcons/' . $iconName));
            // $contactIcon = Contact_icon::insert([
            //     'icon_image' => $pannerName,
            // ]);
        }

        $contactIcon = Contact_icon::create([
            'icon_image' => $iconName,
            'icon_link' => $request->icon_link,
        ]);

        toast('New Contact Icons Has Been Added Successfully!', 'success');
        return redirect()->route('contactIcon.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FrontPages\Contact_icon  $contact_icon
     * @return \Illuminate\Http\Response
     */
    public function show(Contact_icon $contactIcon)
    {
        return view('AdminPanel.ContactIcons.delete', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontPages\Contact_icon  $contact_icon
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact_icon $contactIcon)
    {
        return view('AdminPanel.ContactIcons.update', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontPages\Contact_icon  $contact_icon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact_icon $contactIcon)
    {
        $request->validate([
            'icon_image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:1048',
            'icon_link' => 'min:8',
        ]);

        if ($request->file('icon_image')) {
            if ($contactIcon->icon_image != 'website01.png') {
                unlink(public_path('uploads/contactIcons/' . $contactIcon->icon_image));
            }

            $iconName = uniqid() . 'Icon' . '.' . $request->file('icon_image')->extension();
            Image::make($request->file('icon_image'))->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/contactIcons/' . $iconName));
            // $contactIcon = Contact_icon::insert([
            //     'icon_image' => $pannerName,
            // ]);
        }

        $contactIcon->update([
            'icon_image' => $iconName,
            'icon_link' => $request->icon_link,
        ]);

        toast('New Contact Icons Has Been Updated Successfully!', 'success');
        return redirect()->route('contactIcon.index', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontPages\Contact_icon  $contact_icon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact_icon $contactIcon)
    {
        if ($contactIcon->icon_image != 'website01.png') {
            Storage::disk('public_uploads')->delete('contactIcons/' . $contactIcon->icon_image);
        }

        $contactIcon->delete();

        toast('Selected Contact-Icon Has Been Deleted Successfully!', 'danger');
        return redirect()->route('contactIcon.index');
    }
}
