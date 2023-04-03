<?php

namespace App\Http\Controllers;

use App\Models\FrontPages\Prospect_detail;
use Illuminate\Http\Request;

class ProspectDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = Prospect_detail::all();
        return view('AdminPanel.ProspectDetails.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'min:8|max:80',
        //     'email' => 'email',
        //     'phone' => 'min:11|numeric',
        //     'address' => 'max:500',
        // ]);


        // $prospectDetail = Prospect_detail::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'message' => $request->message,
        // ]);

        // toast('New Prospect_Details Has Been Added Successfully!', 'success');
        // return view('front', get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FrontPages\Prospect_detail  $prospect_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Prospect_detail $prospectDetail)
    {
        return view('AdminPanel.prospectDetails.delete', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontPages\Prospect_detail  $prospect_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Prospect_detail $prospectDetail)
    {
        return view('AdminPanel.prospectDetails.update', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontPages\Prospect_detail  $prospect_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prospect_detail $prospectDetail)
    {
        $request->validate([
            'name' => 'min:8|max:80',
            'email' => 'email',
            'phone' => 'min:11|numeric',
            'message' => 'max:500',
        ]);


        $prospectDetail->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        toast('New Prospect_Details Has Been Updated Successfully!', 'success');
        return redirect()->route('prospectDetail.index', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontPages\Prospect_detail  $prospect_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prospect_detail $prospectDetail)
    {
        $prospectDetail->delete();

        toast('Selected Prospect Detail Has Been Deleted Successfully!', 'danger');
        return redirect()->route('prospectDetail.index', get_defined_vars());
    }
}
