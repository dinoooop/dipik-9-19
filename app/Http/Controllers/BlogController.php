<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index(Request $request)
    {
        $data = Blog::orderBy('created_at', 'DESC')->get();
        return view('admin.blog.index', compact('data'));
    }

    public function blogs(Request $request)
    {
        $data = Blog::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('blog.index', compact('data'));
    }

    public function single(Request $request)
    {
        $data = Blog::where('slug', $request->slug)->first();
        $tags = Tag::all();
        $featured = Blog::where('is_featured', 1)->where('slug', '!=', $request->slug)->first();
        $related = Blog::where('id', $data->related)->first();
        $user = User::find($data->user_id);

        if ($related?->id == $featured?->id) {
            $related = null;
        }

        return view('blog.single', compact(
            'data',
            'tags',
            'featured',
            'related',
            'user'
        ));
    }

    public function edit($id)
    {
        $data = Blog::find($id);
        $data['tags'] = getBlogTagTitles($data);
        return view('admin.blog.edit', compact('data'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'status' => 'required',
        ]);

        $validated['user_id'] = gcuid();
        $validated['slug'] = Str::slug($validated['title'], '-');

        $sometimes = $request->all();
        $merged = array_merge($sometimes, $validated);

        if ($request->is_featured == 1) {
            Blog::where('id', '>=', 1)->update(['is_featured' => 0]);
        }

        $blog = Blog::create($merged);
        $tagIds = createTags($request->tags);
        $blog->tags()->attach($tagIds);

        return redirect('/admin/blogs');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'status' => 'required',
        ]);

        $validated['slug'] = Str::slug($validated['title'], '-');
        $sometimes = $request->all();
        $merged = array_merge($sometimes, $validated);

        if ($request->is_featured == 1) {
            Blog::where('id', '>=', 1)->update(['is_featured' => 0]);
        }

        $blog = Blog::find($id);
        $blog->update($merged);
        $tagIds = createTags($request->tags);
        $blog->tags()->sync($tagIds);

        return redirect('/admin/blogs/' . $id . '/edit');
    }

    public function destroy(Request $request, $id)
    {
        $data = Blog::find($id)->delete();
        return response()->json($data);
    }
}
