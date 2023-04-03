<?php

namespace App\Http\Controllers;

use App\Models\FrontPages\Competency;
use Illuminate\Http\Request;

class CompetencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = Competency::all();
        return view('AdminPanel.Competency.show', compact('showData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.Competency.create');
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
            'name' => 'min:3|max:80|unique:competencies,name,except,id',
        ]);

        $competency = Competency::create([
            'name' => $request->name,
        ]);

        toast('New Competency Has Been Added Successfully!', 'success');
        return redirect()->route('competency.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Competency $competency)
    {
        return view('AdminPanel.Competency.delete', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Competency $competency)
    {
        return view('AdminPanel.Competency.update', compact('competency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competency $competency)
    {
        $request->validate([
            'name' => 'min:3|max:80',
        ]);

        $competency->update([
            'name' => $request->name,
        ]);

        toast('Selected Competency Has Been Updated Successfully!', 'success');
        return redirect()->route('competency.index', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competency $competency)
    {
        $competency->delete();

        toast('Selected Competency Has Been Deleted Successfully!', 'danger');
        return redirect()->route('competency.index', get_defined_vars());
    }
}
