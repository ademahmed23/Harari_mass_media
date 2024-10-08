<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\OnlinePoll;

class AdminOnlinePollController extends Controller
{
    public function show()
    {
        $online_poll_data = OnlinePoll::orderBy('id','desc')->get();
        return view('admin.poll.online_poll_show', compact('online_poll_data'));
    }

    public function create()
    {
        $language = Language::all(); 
        return view('admin.poll.online_poll_create',compact('language'));
    }

    public function store(Request $request)
    {
        // $language = Language::where(''); 

        $request->validate([
            'question' => 'required'
        ]);

        $online_poll = new OnlinePoll();
        $online_poll->question = $request->question;
        $online_poll->yes_vote = 0;
        $online_poll->no_vote = 0;
        $online_poll->language = $request->language;
        $online_poll->save();

        return redirect()->route('admin.admin_online_poll_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    { $language = Language::all();
        $online_poll_data = OnlinePoll::where('id',$id)->first();
        return view('admin.poll.online_poll_edit', compact('online_poll_data','language'));
    }

    public function update(Request $request,$id) 
    {
        $request->validate([
            'question' => 'required'
        ]);

        $online_poll_data = OnlinePoll::where('id',$id)->first();
        $online_poll_data->question = $request->question;
        $online_poll_data->language = $request->language;
        $online_poll_data->update();

        return redirect()->route('admin.admin_online_poll_show')->with('success', 'Data is updated successfully.');
    }

    public function delete($id)
    {
        $online_poll_data = OnlinePoll::where('id',$id)->first();
        $online_poll_data->delete();

        return redirect()->route('admin.admin_online_poll_show')->with('success', 'Data is deleted successfully.');

    }
}
