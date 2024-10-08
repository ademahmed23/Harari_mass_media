<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutUpdateRequest;
use App\Models\AboutUs;
use App\Models\Language;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutUsController extends Controller
{
    use FileUploadTrait;

    function __construct()
    {
        $this->middleware(['permission:about index,admin']);
    }

    function index() : View {
        $languages = Language::all();
        $about = AboutUs::first();
        return view('admin.about.index', compact('about','languages'));
    }

    function update(AboutUpdateRequest $request) : RedirectResponse {
        $imagePath = $this->handleFileUpload($request, 'image', $request->old_image);

        AboutUs::updateOrCreate(
            ['id' => 1],
            [
                ['language' => $request->language],
                'image' => !empty($imagePath) ? $imagePath : $request->old_image,
                'video_url' => $request->video_url,
                'description' => $request->description,
                'button_url' => $request->button_url
            ]
        );
       
        toast()->success('Updated Successfully!');

        return redirect()->back();
    }
}
