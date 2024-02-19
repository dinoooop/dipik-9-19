@extends('layouts.sidenav')
@section('title', 'Edit Tag')

@section('content')

<h1>Edit Tag</h1>
<form method="post" action="/admin/tags/{{$data->id}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title:</label>
        <input name="title" type="text" id="title" value="{{ $data->title }}" />
    </div>
    
    <button type="submit">Submit</button>
</form>

@endsection