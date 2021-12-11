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
        $abouts = About::all();

        return view('admin.abouts.admin-about', compact('abouts'));
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

        $img = time() . '.' . $request->img->extension();

        $request->img->move(public_path('img/uploads/abouts'), $img);

        $request->image = $img;

        $about = About::create([
            'name' => $request->name,
            'email' => $request->email,
            'desc' => $request->desc,
            'phone' => $request->phone,
            'link' => $request->link,
            'image' => $img,
            'user_id'=> Auth::user()->id;
        ]);

        if ($about) {
            Toastr::success('Success add about', 'Notification');

            return redirect('/admin/about/');
        } else {
            Toastr::danger('Failed add about', 'Notification');

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
        $about = About::find($id);

        return view('admin.abouts.edit-about', compact('about'));
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
        $validated = $request->validate([
            'name' => 'min:3|max:255',
            'email' => 'unique:abouts|max:255',
            'desc' => 'max:255',
            'phone' => 'min:12|unique:abouts',
            'link' => 'unique:abouts|max:255',
            'img' => 'mimes:jpg,jpeg,png,svg'
        ]);

        if ($request->img == null) {
            $update = About::where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'desc' => $request->desc,
                'phone' => $request->phone,
                'link' => $request->link,
            ]);

            if ($update) {
                Toastr::success('Success update about', 'Notification');

                return redirect('/admin/about/');
            } else {
                Toastr::danger('Failed update about', 'Notification');

                return redirect('/admin/about/');
            }
        } else {
            $about = About::find($id);
            $img_path = public_path('img/uploads/abouts/' . $about->image);
            unlink($img_path);
            $updateImg = time() . '.' . $request->img->extension();

            $request->img->move(public_path('img/uploads/abouts'), $updateImg);

            $request->image = $updateImg;

            $update = $about->update([
                'name' => $request->name,
                'email' => $request->email,
                'desc' => $request->desc,
                'phone' => $request->phone,
                'link' => $request->link,
                'image' => $updateImg
            ]);

            if ($update) {
                Toastr::success('Success update about', 'Notification');

                return redirect('/admin/about/');
            } else {
                Toastr::danger('Failed update about', 'Notification');

                return redirect('/admin/about/');
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
