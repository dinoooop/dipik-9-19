<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TagController extends Controller
{

    public function index(Request $request)
    {
        $data = Tag::all();
        return view('admin.tag.index', ['data' => $data]);
    }

    public function home(Request $request)
    {
        
        $tag = Tag::where('slug', $request->slug)->first();
        $data = $tag->blogs;
        return view('blog.index', ['data' => $data]);
    }

    public function edit($id)
    {
        $data = Tag::find($id);
        return view('admin.tag.edit', ['data' => $data]);
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:tags',
        ]);

        $validated['slug'] = Str::slug($validated['title'], '-');
        $tag = Tag::create($validated);
        
        return redirect('/admin/tags');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|unique:tags,title,id' . $id,
            
        ]);

        $validated['slug'] = Str::slug($validated['title'], '-');
        
        $data = Tag::find($id)->update($validated);
        return redirect('/admin/tags');
    }

    public function destroy(Request $request, $id)
    {
        $data = Tag::find($id)->delete();
        return response()->json($data);
    }
}
