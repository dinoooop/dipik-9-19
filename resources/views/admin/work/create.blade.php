@extends('layouts.sidenav')
@section('title', 'Create Work')

@section('content')

<h1>Create Work</h1>
<form method="post" action="/admin/works">
    @csrf
    <div class="form-group">
        <label for="title">Title:</label>
        <input name="title" type="text" id="title" />
    </div>
    <div class="form-group">
        <label for="url">URL:</label>
        <input name="url" type="text" id="url" />
    </div>
    <div class="form-group">
        <label for="content">Content:</label>
        <textarea name="content" id="content"></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image Id:</label>
        <input name="image" type="number" id="image" />
    </div>
    <button type="submit">Submit</button>
</form>

@endsection