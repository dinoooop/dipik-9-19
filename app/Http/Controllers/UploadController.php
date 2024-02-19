<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{

    public function index(Request $request)
    {
        $query = Upload::query();
        $query->orderBy('id', 'desc');
        $data['uploads'] = $query->paginate(2);
        $data['page'] = $request->page?? 1;
        return view('admin.upload.index', ['data' => $data]);
    }

    public function edit($id)
    {
        $data = Upload::find($id);
        
        return view('admin.upload.edit', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.upload.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required',
            'url_two' => 'sometimes',
        ]);

        createPubDir('uploads');
        $url = $request->file('url')->store('public/uploads');
        $validated['url'] = basename($url);
        
        $data = Upload::create($validated);
        return redirect('/admin/uploads');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'url' => 'required|file',
            'url_two' => 'sometimes',
        ]);

        $model = Upload::find($id);

        $fileToDelete = 'public/uploads/' . $model->url;
        if (Storage::exists($fileToDelete)) {
            Storage::delete($fileToDelete);
        }        

        $url = $request->file('url')->store('public/uploads');
        $validated['url'] = basename($url);

        $data = $model->update($validated);
        return redirect('/admin/uploads');
    }

    public function destroy(Request $request, $id)
    {
        $model = Upload::find($id);
        $fileToDelete = 'public/uploads/' . $model->url;
        if (Storage::exists($fileToDelete)) {
            Storage::delete($fileToDelete);
        }  
        $data = $model->delete();
        return response()->json($data);
    }
}
