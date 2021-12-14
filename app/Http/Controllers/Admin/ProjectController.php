<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('user_id', Auth::user()->id)->get();

        return view('admin.projects.admin-projects', compact('projects'));
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
            'name' => 'required|min:1',
            'desc' => 'required|max:255',
            'link' => 'required|unique:projects|max:255',
            'img' => 'mimes:jpg,jpeg,png,svg'
        ]);

        $img = $request->name . '-project' . '-img' . '.' . $request->img->extension();

        $request->img->move(public_path('img/uploads/projects'), $img);

        $request->image = $img;

        $project = Project::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'link' => $request->link,
            'image' => $img,
            'user_id' => Auth::user()->id,
        ]);

        if ($project) {
            Toastr::success('Success add project', 'Notification', ["positionClass" => "toast-bottom-right"]);

            return redirect('/admin/project/');
        } else {
            Toastr::danger('Failed add project', 'Notification', ["positionClass" => "toast-bottom-right"]);

            return redirect('/admin/project/');
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
        $project = Project::find($id);

        return view('admin.projects.edit-project', compact('project'));
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
            'name' => 'required|min:1',
            'desc' => 'required|max:255',
            'link' => 'required|max:255',
            'img' => 'mimes:jpg,jpeg,png,svg'
        ]);

        if ($request->img == null) {
            $update = Project::where('id', $id)->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'link' => $request->link,
                'user_id' => Auth::user()->id,
            ]);

            if ($update) {
                Toastr::success('Success update project', 'Notification', ["positionClass" => "toast-bottom-right"]);

                return redirect('/admin/project/');
            } else {
                Toastr::danger('Failed update project', 'Notification', ["positionClass" => "toast-bottom-right"]);

                return redirect('/admin/project/');
            }
        } else {
            $project = Project::find($id);

            $img_path = public_path('img/uploads/projects/' . $project->image);

            unlink($img_path);

            $updateImg = $request->name . '-img' . '.' . $request->img->extension();

            $request->img->move(public_path('img/uploads/projects/'), $updateImg);

            $request->image = $updateImg;

            $update = $project->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'link' => $request->link,
                'image' => $updateImg,
                'user_id' => Auth::user()->id,
            ]);

            if ($update) {
                Toastr::success('Success update project', 'Notification', ["positionClass" => "toast-bottom-right"]);

                return redirect('/admin/project/');
            } else {
                Toastr::danger('Failed update project', 'Notification', ["positionClass" => "toast-bottom-right"]);

                return redirect('/admin/project/');
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
        $project = Project::find($id);


        if ($project) {
            $img_path = public_path('img/uploads/projects/' . $project->image);

            unlink($img_path);
            $project->delete();

            Toastr::success('Success delete project', 'Notification', ["positionClass" => "toast-bottom-right"]);

            return redirect('/admin/project/');
        } else {
            Toastr::danger('Failed delete project', 'Notification', ["positionClass" => "toast-bottom-right"]);

            return redirect('/admin/project/');
        }
    }
}
