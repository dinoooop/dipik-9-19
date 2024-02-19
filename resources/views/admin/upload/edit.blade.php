@extends('layouts.sidenav')
@section('title', 'Edit Upload')

@section('content')

<h1>Edit Upload</h1>
<form method="post" action="/admin/uploads/{{$data->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="url">URL:</label>
        <input name="url" type="file" id="url" />
        <img src="{{asset('storage/uploads/' . $data->url)}}" alt="" width="150">
    </div>
    <div class="form-group">
        <label for="url_two">URL Two:</label>
        <input type="file" name="url_two" id="url_two" />
        <img src="{{asset('storage/uploads/' . $data->url_two)}}" alt="" width="150">
    </div>
    <button type="submit">Submit</button>
</form>

@endsection