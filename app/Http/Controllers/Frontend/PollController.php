<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OnlinePoll;
use App\Models\Language;
use App\Helper\Helpers;

class PollController extends Controller
{
    public function submit(Request $request)
    {
        $poll_data = OnlinePoll::where('id',$request->id)->first();
        if($request->vote == 'Yes')
        {
            $updated_yes = $poll_data->yes_vote+1;
            $poll_data->yes_vote = $updated_yes;
        }
        else
        {
            $updated_no = $poll_data->no_vote+1;
            $poll_data->no_vote = $updated_no;
        }
        $poll_data->update();

        session()->put('current_poll_id', $poll_data->id);

        return redirect()->back()->with('success', 'Your vote is counted successfully');

    }

    public function previous()
    {
        // Helpers::read_json();

        if(!session()->get('language')) {
            $language = Language::where('default',1)->first()->lang;
        } else {
            $language = session()->get('session_short_name');
        }    
        $language = Language::all();
        
        $online_poll_data = OnlinePoll::where('language', getLangauge())->orderBy('id','desc')->get();
        return view('front.poll_previous', compact('online_poll_data'));
    }
}
