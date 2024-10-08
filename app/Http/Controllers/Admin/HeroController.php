<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeroUpdateRequest;
use App\Models\Hero;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeroController extends Controller
{
    use FileUploadTrait;

    function __construct()
    {
        $this->middleware(['permission:section index,admin'])->only(['index']);
        $this->middleware(['permission:section update,admin'])->only(['update']);
    }

    function index() : View {
        $hero = Hero::first();
        return view('admin.hero.index', compact('hero'));
    }

    function update(HeroUpdateRequest $request) : RedirectResponse {

        $imagePath = $this->handleFileUpload($request, 'background', $request->old_background);

        Hero::updateOrCreate(
            ['id' => 1],
            [
                'background' => !empty($imagePath) ? $imagePath : $request->old_background,
                'title' => $request->title,
                'sub_title' => $request->sub_title
            ]
        );

        toast()->success('Updated Successfully');

        return redirect()->back();
    }
}
