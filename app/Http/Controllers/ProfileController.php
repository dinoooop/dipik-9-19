<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index(Request $request)
    {
        $data = Profile::all();
        return view('admin.profile.index', ['data' => $data]);
    }

    public function edit($id)
    {
        $data = Profile::find($id);
        $data->status = $data->status == 1 ? "checked": "";
        return view('admin.profile.edit', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.profile.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'story' => 'sometimes',
            'work' => 'sometimes',
            'experience' => 'sometimes',
            'status' => 'sometimes',
        ]);

        if(isset($request->status) && $request->status == 1){
            $validated['status'] = 1;
        } else {
            $validated['status'] = 0;
        }

        $data = Profile::create($validated);
        return redirect('/admin/profiles');
    }

    public function update(Request $request, $id)
    {

        if($request->action == 'change_status') {
            Profile::where('id', '!=', $id)->update(['status' => 0]);
            $data = Profile::where('id', $id)->update(['status' => 1]);
            return response()->json($data);
        }

        $validated = $request->validate([
            'title' => 'required',
            'story' => 'sometimes',
            'work' => 'sometimes',
            'experience' => 'sometimes',
            'status' => 'sometimes',
        ]);

        if(isset($request->status) && $request->status == 1){
            Profile::where('id', '!=', $id)->update(['status' => 0]);
        } else {
            $validated['status'] = 0;
        }

        $data = Profile::find($id)->update($validated);
        return redirect('/admin/profiles');
    }

    public function destroy(Request $request, $id)
    {
        $data = Profile::find($id)->delete();
        return response()->json($data);
    }
}
