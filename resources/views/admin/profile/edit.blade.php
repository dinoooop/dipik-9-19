@extends('layouts.sidenav')
@section('title', 'Edit Profile')

@section('content')

<h1>Edit Profile</h1>
<form method="post" action="/admin/profiles/{{$data->id}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title:</label>
        <input name="title" type="text" id="title" value="{{ $data->title }}" />
    </div>
    <div class="form-group">
        <label for="story">Story:</label>
        <input name="story" type="text" id="story" value="{{ $data->story }}" />
    </div>
    <div class="form-group">
        <label for="work">Works:</label>
        <input name="work" type="text" id="work" value="{{ $data->work }}" />
    </div>
    <div class="form-group">
        <label for="experience">Experience:</label>
        <input name="experience" type="text" id="experience" value="{{ $data->experience }}" />
    </div>
    <div class="form-group">
        <label for="is_blog"><input name="is_blog" type="checkbox" id="is_blog" value="1" {{ $data->is_blog }} /> Enable Blog:</label>
    </div>
    <div class="form-group">
        <label for="is_social"><input name="is_social" type="checkbox" id="is_social" value="1" {{ $data->is_social }} /> Enable Social:</label>
    </div>
    <div class="form-group">
        <label for="status"><input name="status" type="checkbox" id="status" value="1" {{ $data->status }} /> Activate this profile:</label>
        
    </div>
    
    <button type="submit">Submit</button>
</form>

@endsection