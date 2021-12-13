<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
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
        return view('admin.abouts.admin-about', compact('about'));
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
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|unique:abouts|max:255',
            'desc' => 'required|max:255',
            'phone' => 'required|min:12|unique:abouts',
            'link' => 'required|unique:abouts|max:255',
            'img' => 'mimes:jpg,jpeg,png,svg'
        ]);

        $user = Auth::user();

        if (About::where('user_id', $user->id)->get('image')->exists()) {
            $imgAbout = About::where('user_id', $user->id)->get('image');
            $img_path = public_path('img/uploads/projects/' . $imgAbout->image);

            unlink($img_path);
        }

        $img = time() . $user->name . '-img.' . $request->img->extension();

        $request->img->move(public_path('img/uploads/abouts'), $img);

        $request->image = $img;

        $about = About::where('user_id', $user->id)->updateOrCreate([
            'name' => $user->name,
            'email' => $user->email,
            'desc' => $request->desc,
            'phone' => $request->phone,
            'link' => $request->link,
            'image' => $img,
            'user_id' => $user->id,
        ]);

        if ($about) {
            Toastr::success('Success updateOrCreate about', 'Notification');

            return redirect('/admin/about/');
        } else {
            Toastr::danger('Failed updateOrCreate about', 'Notification');

            return redirect('/admin/about/');
        }
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);


        if ($about) {
            $img_path = public_path('img/uploads/abouts/' . $about->image);

            unlink($img_path);
            $about->delete();

            Toastr::success('Success delete about', 'Notification');

            return redirect('/admin/about/');
        } else {
            Toastr::danger('Failed delete about', 'Notification');

            return redirect('/admin/about/');
        }
    }
}
