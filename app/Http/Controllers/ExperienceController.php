<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ExperienceController extends Controller
{

    public function index(Request $request)
    {
        $data = Experience::all();
        return view('admin.experience.index', ['data' => $data]);
    }

    public function edit($id)
    {
        $data = Experience::find($id);
        return view('admin.experience.edit', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.experience.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'address' => 'required',
            'content' => 'required',
            'duration' => 'required',
        ]);

        $data = Experience::create($validated);
        return redirect('/admin/experiences');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'address' => 'required',
            'content' => 'required',
            'duration' => 'required',
        ]);

        $data = Experience::find($id)->update($validated);
        return redirect('/admin/experiences');
    }

    public function destroy(Request $request, $id)
    {
        $data = Experience::find($id)->delete();
        return response()->json($data);
    }
}
