@extends('layouts.sidenav')
@section('title', 'Create Story')

@section('content')

<h1>Create Story</h1>
<form method="post" action="/admin/stories">
    @csrf
    <div class="form-group">
        <label for="title">Title:</label>
        <input name="title" type="text" id="title" />
    </div>
    <div class="form-group">
        <label for="content">Content:</label>
        <textarea name="content" id="content"></textarea>
    </div>
    <button type="submit">Submit</button>
</form>

@endsection