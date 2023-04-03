<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\FrontPages\MethodologyDetail;

class MethodologyDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = MethodologyDetail::all();
        return view('AdminPanel.MethodologyDetails.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.MethodologyDetails.create');
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
            'icon_image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:3048',
            'methodology_desc' => 'min:3|max:1000',
        ]);

        if ($request->file('icon_image')) {

            $iconName = uniqid() . 'Icon' . '.' . $request->file('icon_image')->extension();
            Image::make($request->file('icon_image'))->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/methodologyDetails/' . $iconName));
            // $contactIcon = Contact_icon::insert([
            //     'icon_image' => $pannerName,
            // ]);
        }


        $methodologyDetail = MethodologyDetail::create([
            'name' => $request->name,
            'icon_image' => $iconName,
            'methodology_desc' => $request->methodology_desc,
        ]);

        toast('New Methodology Details Has Been Added Successfully!', 'success');
        return redirect()->route('methodologyDetail.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FrontPages\MethodologyDetail  $methodologyDetail
     * @return \Illuminate\Http\Response
     */
    public function show(MethodologyDetail $methodologyDetail)
    {
        return view('AdminPanel.MethodologyDetails.delete', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontPages\MethodologyDetail  $methodologyDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(MethodologyDetail $methodologyDetail)
    {
        return view('AdminPanel.MethodologyDetails.update', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontPages\MethodologyDetail  $methodologyDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MethodologyDetail $methodologyDetail)
    {
        $request->validate([
            'name' => 'min:3|max:150',
            'icon_image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:3048',
            'methodology_desc' => 'min:3|max:1000',
        ]);

        if ($request->file('icon_image')) {

            $iconName = uniqid() . 'Icon' . '.' . $request->file('icon_image')->extension();
            Image::make($request->file('icon_image'))->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/methodologyDetails/' . $iconName));
            // $contactIcon = Contact_icon::insert([
            //     'icon_image' => $pannerName,
            // ]);
        }


        $methodologyDetail->update([
            'name' => $request->name,
            'icon_image' => $iconName,
            'methodology_desc' => $request->methodology_desc,
        ]);

        toast('Selected Methodology Details Has Been Updated Successfully!', 'success');
        return redirect()->route('methodologyDetail.index', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontPages\MethodologyDetail  $methodologyDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(MethodologyDetail $methodologyDetail)
    {
        if ($methodologyDetail->icon_image != 'concept01.png') {
            Storage::disk('public_uploads')->delete('methodologyDetails/' . $methodologyDetail->icon_image);
        }

        $methodologyDetail->delete();

        toast('Selected Methodology Details Has Been Deleted Successfully!', 'danger');
        return redirect()->route('methodologyDetail.index');
    }
}
