<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TeamDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamCreateRequest;
use App\Http\Requests\TeamUpdateRequest;
use App\Models\Team;
use App\Models\SectionTitle;
use App\Traits\FileUploadTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

use function Ramsey\Uuid\v1;

class TeamController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(TeamDataTable $dataTable) : View|JsonResponse
    {
        $keys = ['team_top_title', 'team_main_title', 'team_sub_title'];
        $titles = SectionTitle::whereIn('key', $keys)->pluck('value','key');
        return $dataTable->render('admin.team.index', compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamCreateRequest $request) : RedirectResponse
    {
        $imagePath = $this->handleFileUpload($request, 'image');

        $chef = new Team();
        $chef->image = $imagePath;
        $chef->name = $request->name;
        $chef->title = $request->title;
        $chef->fb = $request->fb;
        $chef->in = $request->in;
        $chef->x = $request->x;
        $chef->web = $request->web;
        $chef->show_at_home = $request->show_at_home;
        $chef->status = $request->status;
        $chef->save();

        toast()->success('Created Successfully!');

        return to_route('admin.team.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View
    {
        $chef = Team::findOrFail($id);
        return view('admin.team.edit', compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamUpdateRequest $request, string $id) : RedirectResponse
    {
        $imagePath = $this->handleFileUpload($request, 'image', $request->old_image);

        $chef = Team::findOrFail($id);
        $chef->image = !empty($imagePath) ? $imagePath : $request->old_image;
        $chef->name = $request->name;
        $chef->title = $request->title;
        $chef->fb = $request->fb;
        $chef->in = $request->in;
        $chef->x = $request->x;
        $chef->web = $request->web;
        $chef->show_at_home = $request->show_at_home;
        $chef->status = $request->status;
        $chef->save();

        toast()->success('Update Successfully!');

        return to_route('admin.chefs.index');
    }

    public function updateTitle(Request $request)
    {
        $validatedData = $request->validate([
                    'chef_top_title' => ['max:100'],
                    'chef_main_title' => ['max:200'],
                    'chef_sub_title' => ['max:500']
                ]);

        foreach ($validatedData as $key => $value) {
            SectionTitle::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        toast()->success('Updated Successfully!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : Response
    {
        try {
            $chef = Team::findOrFail($id);
            $this->removeImage($chef->image);
            $chef->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'something went wrong!']);
        }
    }
}
