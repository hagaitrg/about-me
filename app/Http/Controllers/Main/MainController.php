<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Message;
use App\Models\Project;
use App\Models\Skill;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::first();
        $webDev = Skill::where('tag_id', 1)->get();
        $framework = Skill::where('tag_id', 2)->get();
        $db = Skill::where('tag_id', 3)->get();
        $vcs = Skill::where('tag_id', 4)->get();
        $projects = Project::all();

        // dd($webDev, $framework, $db, $vcs);

        return view('main.index', compact('abouts', 'webDev', 'framework', 'db', 'vcs', 'projects'));
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
    public function storeMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:6',
            'subject' => 'required|min:6',
            'message' => 'required|max:255',
            'user_id' => 'required|integer'
        ]);

        $message = Message::create([
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
            'user_id' => $request->user_id
        ]);

        if ($message) {
            Toastr::success('Success add message', 'Notification', ["positionClass" => "toast-bottom-right"]);

            return redirect('/');
        } else {
            Toastr::error('Failed add message', 'Notification', ["positionClass" => "toast-bottom-right"]);

            return redirect('/');
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
        //
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
        //
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
