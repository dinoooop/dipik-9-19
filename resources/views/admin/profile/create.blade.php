@extends('layouts.sidenav')
@section('title', 'Create Profile')

@section('content')

<h1>Create Profile</h1>
<form method="post" action="/admin/profiles">
    @csrf
    <div class="form-group">
        <label for="title">Title:</label>
        <input name="title" type="text" id="title" />
    </div>
    <div class="form-group">
        <label for="story">Story:</label>
        <input name="story" type="text" id="story" />
    </div>
    <div class="form-group">
        <label for="work">Works:</label>
        <input name="work" type="text" id="work" />
    </div>
    <div class="form-group">
        <label for="experience">Experience:</label>
        <input name="experience" type="text" id="experience" />
    </div>
    <div class="form-group">
        <label for="is_blog"><input name="is_blog" type="checkbox" id="is_blog" value="1" /> Enable Blog:</label>
    </div>
    <div class="form-group">
        <label for="is_social"><input name="is_social" type="checkbox" id="is_social" value="1" /> Enable Social:</label>
    </div>
    <div class="form-group">
        <label for="status"><input name="status" type="checkbox" id="status" value="1" /> Activate this profile:</label>
    </div>
    <button type="submit">Submit</button>
</form>

@endsection