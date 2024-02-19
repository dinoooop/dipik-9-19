<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WorkController extends Controller
{

    public function index(Request $request)
    {
        $data = Work::all();
        return view('admin.work.index', ['data' => $data]);
    }

    public function edit($id)
    {
        $data = Work::find($id);
        return view('admin.work.edit', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.work.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'url' => 'sometimes',
            'content' => 'required',
            'image' => 'required',
        ]);

        $data = Work::create($validated);
        return redirect('/admin/works');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'url' => 'sometimes',
            'content' => 'required',
            'image' => 'required',
        ]);

        $data = Work::find($id)->update($validated);
        return redirect('/admin/works');
    }

    public function destroy(Request $request, $id)
    {
        $data = Work::find($id)->delete();
        return response()->json($data);
    }
}
