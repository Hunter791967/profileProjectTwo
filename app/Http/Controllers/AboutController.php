<?php

namespace App\Http\Controllers;

use App\Models\FrontPages\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = About::all();
        return view('AdminPanel.About.show', compact('showData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.About.create');
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
            'title' => 'min:8|max:80',
            'about_favorite' => 'min:8|max:80',
            // 'about_desc' => 'min:20|max:400',
            'btn_text' => 'required|min:3|max:30',
            'about_tab' => 'min:10',
            'resume' => 'max:4048',
        ]);

        if ($request->file('resume')) {


            $pannerName = uniqid() . 'Resume' . '.' . $request->file('resume')->extension();
            $request->file('resume')->move(public_path('uploads/resume/'), $pannerName);
        }

        $about = About::create([
            'title' => $request->title,
            'about_favorite' => $request->about_favorite,
            'about_desc' => $request->about_desc,
            'btn_text' => $request->btn_text,
            'about_tab' => $request->about_tab,
            'resume' => $pannerName,
        ]);
        // dd($homeSlider);
        toast('New About Section Has Been Added Successfully!', 'success');
        return redirect()->route('About.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        // dd($about);
        return view('AdminPanel.About.delete', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('AdminPanel.About.update', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'min:8|max:80',
            'about_favorite' => 'min:8|max:80',
            // 'about_desc' => 'min:20|max:300',
            'btn_text' => 'required|min:3|max:30',
            'about_tab' => 'min:10',
        ]);

        $about->update([
            'title' => $request->title,
            'about_favorite' => $request->about_favorite,
            'about_desc' => $request->about_desc,
            'btn_text' => $request->btn_text,
            'about_tab' => $request->about_tab,
        ]);
        // dd($homeSlider);
        toast('New About Section Has Been Updated Successfully!', 'success');
        return redirect()->route('About.index', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {

        $about->delete();

        toast('Selected About Has Been Deleted Successfully!', 'danger');
        return redirect()->route('About.index', get_defined_vars());
    }
}
