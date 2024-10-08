<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;

use Illuminate\Http\Request;
use App\Models\Video;

class AdminVideoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:videos index,admin'])->only('index');
        $this->middleware(['permission:video_create,admin'])->only(['create', 'store']);
        $this->middleware(['permission:video_edit update,admin'])->only(['edit', 'update']);
        $this->middleware(['permission:videos delete,admin'])->only(['destroy']);
    }
    // public function index()
    // {
    //     $languages = Language::all();
    //     return view('admin.video.video_show', compact('languages'));
    // }
    public function show()
    {
        $languages = Language::all();
        $videos = Video::get();
        return view('admin.video.video_show', compact('videos','languages'));
    }

    public function create()
    { 
        $languages = Language::all();
        return view('admin.video.video_create',compact('languages'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'caption' => 'required',
            'video_id' => 'required'
        ]);


        $video = new Video();
        $video->video_id = $request->video_id;
        $video->caption = $request->caption;
        $video->language =$request->language;
        $video->save();

        return redirect()->route('admin.admin_video_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    { $languages = Language::all();
        $video_data = Video::where('id',$id)->first();
        return view('admin.video.video_edit', compact('video_data','languages'));
    }

    public function update(Request $request,$id) 
    {
        $request->validate([
            'caption' => 'required',
            'video_id' => 'required'
        ]);

        $video_data = Video::where('id',$id)->first();
        $video_data->video_id = $request->video_id;
        $video_data->caption = $request->caption;
         $video_data->language = $request->language;
        $video_data->update();

        return redirect()->route('admin.admin_video_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $video_data = Video::where('id',$id)->first();
        $video_data->delete();

        return redirect()->route('admin.admin_video_show')->with('success', 'Data is deleted successfully.');

    }
}
