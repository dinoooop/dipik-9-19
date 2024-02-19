@extends('layouts.sidenav')
@section('title', 'Edit Experience')

@section('content')

<h1>Edit Experience</h1>
<form method="post" action="/admin/experiences/{{$data->id}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title:</label>
        <input name="title" type="text" id="title" value="{{ $data->title }}" />
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input name="address" type="text" id="address" value="{{ $data->address }}" />
    </div>
    <div class="form-group">
        <label for="content">Content:</label>
        <textarea name="content" id="content">{{ $data->content }}</textarea>
    </div>
    <div class="form-group">
        <label for="duration">Duration:</label>
        <input name="duration" type="text" id="duration" value="{{ $data->duration }}" />
    </div>
    <button type="submit">Submit</button>
</form>

@endsection