<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsAndCondition;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TermsAndConditionController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:terms and condition index,admin']);
    }

    function index() : View {
        $TermsAndCondition = TermsAndCondition::first();
        return view('admin.terms-and-condition.index', compact('TermsAndCondition'));
    }

    function update(Request $request) : RedirectResponse {
        $request->validate([
            'description' => ['required']
        ]);

        TermsAndCondition::updateOrCreate(
            ['id' => 1],
            ['description' => $request->description]
        );

        toast()->success('Updated Successfully!');

        return redirect()->back();
    }
}
