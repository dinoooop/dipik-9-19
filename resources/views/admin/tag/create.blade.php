@extends('layouts.sidenav')
@section('title', 'Create Tag')

@section('content')

<h1>Create Tag</h1>
<form method="post" action="/admin/tags">
    @csrf
    <div class="form-group">
        <label for="title">Title:</label>
        <input name="title" type="text" id="title" />
    </div>
    
    <button type="submit">Submit</button>
</form>

@endsection