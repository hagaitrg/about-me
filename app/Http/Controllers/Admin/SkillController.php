<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Brian2694\Toastr\Facades\Toastr;
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
        $skills = Skill::all();

        return view('admin.skills.admin-skill', compact('skills'));
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
            'tag_id' => 'required|not_in:0|integer',
            'link' => 'required|unique:abouts|max:255',
            'img' => 'required|mimes:jpg,jpeg,png,svg'
        ]);

        $img = $request->name . '-img' . '.' . $request->img->extension();

        $request->img->move(public_path('img/uploads/skills'), $img);

        $request->image = $img;

        $skill = Skill::create([
            'name' => $request->name,
            'tag_id' => $request->tag_id,
            'link' => $request->link,
            'image' => $img
        ]);

        if ($skill) {
            Toastr::success('Success add about', 'Notification');

            return redirect('/admin/skill/');
        } else {
            Toastr::danger('Failed add about', 'Notification');

            return redirect('/admin/skill/');
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
        $skill = Skill::find($id);

        return view('admin.skills.edit-skill', compact('skill'));
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
            'tag_id' => 'not_in:0|integer',
            'link' => 'unique:abouts|max:255',
            'img' => 'mimes:jpg,jpeg,png,svg'
        ]);

        if ($request->img == null) {
            $update = Skill::where('id', $id)->update([
                'name' => $request->name,
                'tag_id' => $request->tag_id,
                'link' => $request->link,
            ]);

            if ($update) {
                Toastr::success('Success update skill', 'Notification');

                return redirect('/admin/skill/');
            } else {
                Toastr::danger('Failed update skill', 'Notification');

                return redirect('/admin/skill/');
            }
        } else {
            $skill = Skill::find($id);

            $img_path = public_path('img/uploads/skills/' . $skill->image);

            unlink($img_path);

            $updateImg = $request->name . '-img' . '.' . $request->img->extension();

            $request->img->move(public_path('img/uploads/skills'), $updateImg);

            $request->image = $updateImg;

            $update = $skill->update([
                'name' => $request->name,
                'tag_id' => $request->tag_id,
                'link' => $request->link,
                'image' => $updateImg
            ]);

            if ($update) {
                Toastr::success('Success update skill', 'Notification');

                return redirect('/admin/skill/');
            } else {
                Toastr::danger('Failed update skill', 'Notification');

                return redirect('/admin/skill/');
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
        $skill = Skill::find($id);


        if ($skill) {
            $img_path = public_path('img/uploads/skills/' . $skill->image);

            unlink($img_path);
            $skill->delete();

            Toastr::success('Success delete skill', 'Notification');

            return redirect('/admin/skill/');
        } else {
            Toastr::danger('Failed delete skill', 'Notification');

            return redirect('/admin/skill/');
        }
    }
}
