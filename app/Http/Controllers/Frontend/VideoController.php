<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Language;
use App\Helpers\helper;

class VideoController extends Controller
{
    public function index()
    {
        // Retrieve all videos
        $videos = Video::all();

        // Pass $videos to your view
        return view('frontend.video', compact('videos'));
    }
}
