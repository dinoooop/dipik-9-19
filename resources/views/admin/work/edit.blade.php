@extends('layouts.sidenav')
@section('title', 'Edit Work')

@section('content')

<h1>Edit Work</h1>
<form method="post" action="/admin/works/{{$data->id}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title:</label>
        <input name="title" type="text" id="title" value="{{ $data->title }}" />
    </div>
    <div class="form-group">
        <label for="url">URL:</label>
        <input name="url" type="text" id="url" value="{{ $data->url }}" />
    </div>
    <div class="form-group">
        <label for="content">Content:</label>
        <textarea name="content" id="content">{{ $data->content }}</textarea>
    </div>
    <div class="form-group">
        <label for="image">Image Id:</label>
        <input name="image" type="text" id="image" value="{{ $data->image }}" />
    </div>
    <button type="submit">Submit</button>
</form>

@endsection