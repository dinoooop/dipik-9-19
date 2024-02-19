@extends('layouts.sidenav')
@section('title', 'Edit Story')

@section('content')

<h1>Edit Story</h1>
<form method="post" action="/admin/stories/{{$data->id}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title:</label>
        <input name="title" type="text" id="title" value="{{ $data->title }}" />
    </div>
    <div class="form-group">
        <label for="content">Content:</label>
        <textarea name="content" id="content">{{ $data->content }}</textarea>
    </div>
    
    <button type="submit">Submit</button>
</form>

@endsection