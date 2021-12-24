<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;

        $about = About::where('user_id', $id)->first();
        $profile = Auth::user();

        return view('admin.profile.show-profile', compact('about', 'profile'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user()->id;

        $profile = User::where('id', $user);

        if ($request->old_password) {

            if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
                // The passwords matches
                return redirect()->back()->with("error", "Your current password does not matches with the password.");
            }

            if (strcmp($request->get('old_password'), $request->get('new_password')) == 0) {
                // Current password and new password same
                return redirect()->back()->with("error", "New Password cannot be same as your current password.");
            }

            $validatedData = $request->validate([
                'name' => 'string|min:6',
                'email' => 'string|regex:/(.+)@(.+)\.(.+)/i',
                'new_password' => 'string|min:8|confirmed',
            ]);

            $password = bcrypt($request->new_password);

            $profile->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $password
            ]);

            if ($profile) {
                Toastr::success('Success change profile', 'Notification', ["positionClass" => "toast-bottom-right"]);

                return redirect('/admin/profile/');
            } else {
                Toastr::danger('Failed change profile', 'Notification', ["positionClass" => "toast-bottom-right"]);

                return redirect('/admin/profile/');
            }
        } else {
            $validatedData = $request->validate([
                'name' => 'string|min:6',
                'email' => 'string|regex:/(.+)@(.+)\.(.+)/i',
            ]);

            $profile->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            if ($profile) {
                Toastr::success('Success change profile', 'Notification', ["positionClass" => "toast-bottom-right"]);

                return redirect('/admin/profile/');
            } else {
                Toastr::danger('Failed change profile', 'Notification', ["positionClass" => "toast-bottom-right"]);

                return redirect('/admin/profile/');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
