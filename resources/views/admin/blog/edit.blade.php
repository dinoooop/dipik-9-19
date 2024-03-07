@extends('layouts.sidenav')
@section('title', 'Edit Blog')


@section('header')
<link rel="stylesheet" href="{{ asset('assets/richtexteditor/rte_theme_default.css') }}" />
<script type="text/javascript" src="{{ asset('assets/richtexteditor/rte.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/richtexteditor/plugins/all_plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/rte-upload.js') }}"></script>
@endsection

@section('content')

<h1>Edit Blog</h1>
<form method="post" action="/admin/blogs/{{$data->id}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title:</label>
        <input name="title" type="text" id="title" value="{{ $data->title }}" />
    </div>
    <div class="form-group">


        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content"><?php echo $data->content ?></textarea>
        </div>
        <!-- <label for="content">Content:</label>
        <input name="content" id="inp_content" type="hidden" />
        <div id="content_editor" class="richtexteditor" style="width: 100%; margin:0 auto;">
        <?php // echo $data->content ?>
        </div> -->
    </div>
    <div class="form-group">
        <label for="excerpt">Excerpt:</label>
        <textarea name="excerpt" id="excerpt">{{ $data->excerpt }}</textarea>
    </div>
    <div class="form-group">
        <label for="image">Image:</label>
        <input name="image" type="text" id="image" value="{{ $data->image }}" />
    </div>
    <div class="form-group">
        <label for="tags">Tags:</label>
        <input name="tags" type="text" value="{{ $data->tags }}" id="tags" />
    </div>
    <div class="form-group">
        <label for="related">Related Post:</label>
        <input name="related" type="number" value="{{ $data->related }}" id="related" />
    </div>
    <div class="form-group">
        <label for="created_at">Created At:</label>
        <input name="created_at" type="text" value="{{ $data->created_at }}" id="created_at" />
    </div>
    <div class="form-group">
        <label for="status">Status:</label>
        <span><input name="status" type="radio" value="2" id="draft" {{ $data->status == 2 ? "checked" : "" }} /> <label for="draft">Draft</label></span>
        <span><input name="status" type="radio" value="1" id="publish" {{ $data->status == 1 ? "checked" : "" }} /> <label for="publish">Publish</label></span>
    </div>
    <div class="form-group">
        <label for="is_featured">Set Featured:</label>
        <span><input name="is_featured" type="checkbox" value="1" id="is_featured" {{ $data->is_featured == 1 ? "checked" : "" }} /> <label for="is_featured">A featured post</label></span>
    </div>
    <button type="submit">Submit</button>
</form>

<script>
    var editor1 = new RichTextEditor(document.getElementById("content_editor"));

    editor1.attachEvent("change", function() {
        document.getElementById("inp_content").value = editor1.getHTMLCode();
    });
</script>
@endsection