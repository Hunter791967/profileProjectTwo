<?php

namespace App\Http\Controllers;

use App\Models\FrontPages\Contact_detail;
use Illuminate\Http\Request;

class ContactDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = Contact_detail::all();
        return view('AdminPanel.ContactDetails.show', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPanel.ContactDetails.create');
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
            'name' => 'min:8|max:50',
            'email' => 'email',
            'address' => 'min:9|max:100',
            'phone' => 'min:11|numeric',
        ]);


        $contactDetail = Contact_detail::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        toast('New Contact_Details Has Been Added Successfully!', 'success');
        return redirect()->route('contactDetail.index', get_defined_vars());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FrontPages\Contact_detail  $contact_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Contact_detail $contactDetail)
    {
        return view('AdminPanel.ContactDetails.delete', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrontPages\Contact_detail  $contact_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact_detail $contactDetail)
    {
        return view('AdminPanel.ContactDetails.update', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrontPages\Contact_detail  $contact_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact_detail $contactDetail)
    {
        $request->validate([
            'name' => 'min:8|max:50',
            'email' => 'email',
            'address' => 'min:9|max:100',
            'phone' => 'min:11|numeric',
        ]);


        $contactDetail->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        toast('New Contact_Details Has Been Updated Successfully!', 'success');
        return redirect()->route('contactDetail.index', get_defined_vars());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrontPages\Contact_detail  $contact_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact_detail $contactDetail)
    {
        $contactDetail->delete();

        toast('Selected Contact Detail Has Been Deleted Successfully!', 'danger');
        return redirect()->route('contactDetail.index', get_defined_vars());
    }
}
