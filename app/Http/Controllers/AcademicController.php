<?php

namespace App\Http\Controllers;

use App\Models\FrontPages\Academic;
use Illuminate\Http\Request;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = Academic::all();
        return view('AdminPanel.Academic.show', compact('showData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.Academic.create');
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
            'name' => 'min:3|max:100|unique:academics,name,except,id',
            'description' => 'min:10|max:600',
            'start_date' => 'date|before:end_date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $academic = Academic::create([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        toast('New Academic History Has Been Added Successfully!', 'success');
        return redirect()->route('academic.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Academic $academic)
    {
        return view('AdminPanel.Academic.delete', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Academic $academic)
    {
        return view('AdminPanel.Academic.update', compact('academic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Academic $academic)
    {
        $request->validate([
            'name' => 'min:3|max:100|unique:academics,name,' . $academic->id,
            'description' => 'min:10|max:600',
            'start_date' => 'date|before:end_date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $academic->update([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        toast('Selected Academic History Has Been Updated Successfully!', 'success');
        return redirect()->route('academic.index', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Academic $academic)
    {
        $academic->delete();

        toast('Selected Academic Has Been Deleted Successfully!', 'danger');
        return redirect()->route('academic.index', get_defined_vars());
    }
}
