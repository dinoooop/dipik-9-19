@extends('layouts.sidenav')
@section('title', 'Create Experience')

@section('content')

<h1>Create Experience</h1>
<form method="post" action="/admin/experiences">
    @csrf
    <div class="form-group">
        <label for="title">Title:</label>
        <input name="title" type="text" id="title" />
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input name="address" type="text" id="address" />
    </div>
    <div class="form-group">
        <label for="content">Content:</label>
        <textarea name="content" id="content"></textarea>
    </div>
    <div class="form-group">
        <label for="duration">Duration:</label>
        <input name="duration" type="text" id="duration" />
    </div>
    <button type="submit">Submit</button>
</form>

@endsection