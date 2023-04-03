<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\user;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /** Construct Method For Authorization Validation */
    public function __construct()
    {
        $this->middleware('permission:users-read')->only(['index', 'show']);
        $this->middleware('permission:users-create')->only('create');
        $this->middleware('permission:users-update')->only('edit');
        $this->middleware('permission:users-delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showData = User::all();
        return view('AdminPanel.Users.show', compact('showData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allRoles = Role::all();
        $allPermissions = Permission::all();
        return view('AdminPanel.Users.add', get_defined_vars());
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
            'name' => 'required|min:3|max:90',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:25',
            'image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:3048'
        ]);

        if ($request->file('image')) {
            // $imageName = uniqid() . $request->file('image')->getClientOriginalName();
            // $imageName = uniqid() . 'Image' . '.' . $request->file('image')->getClientOriginalExtension();
            $imageName = uniqid() . 'Image' . '.' . $request->file('image')->extension();
            Image::make($request->file('image'))->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users/' . $imageName));
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $imageName,
        ]);

        $user->attachRole($request->user_role);
        $user->attachPermissions($request->perms);

        toast('New User Has Been Added Successfully!', 'success');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        $allRoles = Role::all();
        $allPermissions = Permission::all();

        return view('AdminPanel.Users.delete', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        $allRoles = Role::all();
        $allPermissions = Permission::all();

        return view('AdminPanel.Users.update', get_defined_vars());
        // return view('AdminPanel.Users.update', compact('allRoles', 'allPermissions', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $request->validate([
            'name' => 'required|min:3|max:90',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'image' => 'image|mimes:png,jpg,jpeg,tiff,svg,webb|max:3048',
        ]);

        if ($request->file('image')) {
            if ($user->image != 'default.png') {
                unlink(public_path('uploads/users/' . $user->image));
                //Storage::disk('public_uploads')->delete('users/' . $user->image);
            }
            $imageName = uniqid() . 'Image' . '.' . $request->file('image')->extension();
            Image::make($request->file('image'))->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/users/' . $imageName));
            $user->update(['image' => $imageName]);
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->password != $user->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        $user->syncRoles([$request->user_role]);
        $user->syncPermissions($request->perms);

        toast('New User Has Been Updated Successfully!', 'success');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        if ($user->image != 'default.png') {
            Storage::disk('public_uploads')->delete('users/' . $user->image);
        }

        $user->detachRoles($user->Roles);
        $user->detachPermissions($user->Permissions);

        $user->delete();

        toast('Selected User Has Been Deleted Successfully!', 'danger');
        return redirect()->route('user.index');
    }
}
