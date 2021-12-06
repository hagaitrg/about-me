<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CV;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

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

        $file = $request->name  . '.' . $request->file->extension();

        $request->file->move(public_path('docs/uploads/cvs'), $file);

        $request->file = $file;

        $cv = CV::create([
            'name' => $request->name,
            'file' => $file
        ]);

        if ($cv) {
            Toastr::success('Success add cv', 'Notification');

            return redirect('/admin/cv/');
        } else {
            Toastr::danger('Failed add cv', 'Notification');

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
    public function edit($id)
    {
        $cv = CV::find($id);

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
        $validated = $request->validate([
            'name' => 'min:3|max:255',
            'file' => 'mimes:pdf,doc,docx|max:2048'
        ]);

        if ($request->file == null) {
            $update = CV::where('id', $id)->update([
                'name' => $request->name,
            ]);

            if ($update) {
                Toastr::success('Success update cv', 'Notification');

                return redirect('/admin/cv/');
            } else {
                Toastr::danger('Failed update cv', 'Notification');

                return redirect('/admin/cv/');
            }
        } else {
            $cv = CV::find($id);

            $file_path = public_path('docs/uploads/cvs/' . $cv->file);

            unlink($file_path);

            $updateFile = $request->name . '.' . $request->file->extension();

            $request->file->move(public_path('docs/uploads/cvs/'), $updateFile);

            $request->image = $updateFile;

            $update = $cv->update([
                'name' => $request->name,
                'file' => $updateFile
            ]);

            if ($update) {
                Toastr::success('Success update cv', 'Notification');

                return redirect('/admin/cv/');
            } else {
                Toastr::danger('Failed update cv', 'Notification');

                return redirect('/admin/cv/');
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
        $cv = CV::find($id);

        if ($cv) {
            $file_path = public_path('docs/uploads/cvs/' . $cv->file);

            unlink($file_path);
            $cv->delete();

            Toastr::success('Success delete cv', 'Notification');

            return redirect('/admin/cv/');
        } else {
            Toastr::success('Failed delete cv', 'Notification');

            return redirect('/admin/cv/');
        }
    }
}
