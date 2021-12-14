<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CV;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cvs = CV::all();

        return view('admin/cv/admin-cv', compact('cvs'));
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
            'file' => 'required|mimes:pdf,doc,docx|max:2048'
        ]);

        $user = Auth::user();

        if (CV::where('user_id', $user->id)->get('file')->count() > 0) {
            $cvFile = CV::where('user_id', $user->id)->value('file');
            $file_path = public_path('docs/uploads/cvs/' . $cvFile);

            unlink($file_path);
        }

        $file = $request->name  . '-CV.' . $request->file->extension();

        $request->file->move(public_path('docs/uploads/cvs'), $file);

        $request->file = $file;

        $cv = CV::updateOrCreate(
            [
                "user_id" => $user->id,
            ],
            [
                'name' => $request->name,
                'file' => $file,
            ]
        );

        if ($cv) {
            Toastr::success('Success add cv', 'Notification', ["positionClass" => "toast-bottom-right"]);

            return redirect('/admin/cv/');
        } else {
            Toastr::danger('Failed add cv', 'Notification', ["positionClass" => "toast-bottom-right"]);

            return redirect('/admin/cv/');
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
    public function edit()
    {
        $cv = CV::where('user_id', Auth::user()->id)->first();

        return view('admin.cv.edit-cv', compact('cv'));
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

        $user = Auth::user();
        $cv = CV::where('user_id', $user->id);

        if ($cv) {
            $cvFile = $cv->value('file');
            $file_path = public_path('docs/uploads/cvs/' . $cvFile);

            unlink($file_path);
            $cv->delete();

            Toastr::success('Success delete cv', 'Notification', ["positionClass" => "toast-bottom-right"]);

            return redirect('/admin/cv/');
        } else {
            Toastr::success('Failed delete cv', 'Notification', ["positionClass" => "toast-bottom-right"]);

            return redirect('/admin/cv/');
        }
    }
}
