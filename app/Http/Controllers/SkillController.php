<?php

namespace App\Http\Controllers;

use App\Models\FrontPages\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = Skill::all();
        return view('AdminPanel.Skills.show', compact('showData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.Skills.create');
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
            'name' => 'min:3|max:80|unique:skills,name,except,id',
            'skill_rate' => 'numeric|between:10,99.99',
        ]);

        $skill = Skill::create([
            'name' => $request->name,
            'skill_rate' => $request->skill_rate,
        ]);
        // dd($homeSlider);
        toast('New Skill Has Been Added Successfully!', 'success');
        return redirect()->route('skill.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        return view('AdminPanel.Skills.delete', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('AdminPanel.Skills.update', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'min:3|max:80',
            'skill_rate' => 'numeric|between:10,99.99',
        ]);

        $skill->update([
            'name' => $request->name,
            'skill_rate' => $request->skill_rate,
        ]);
        // dd($homeSlider);
        toast('Selected Skill Has Been Updated Successfully!', 'success');
        return redirect()->route('skill.index', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        toast('Selected Skill Has Been Deleted Successfully!', 'danger');
        return redirect()->route('skill.index', get_defined_vars());
    }
}
