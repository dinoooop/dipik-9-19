@extends('layouts.sidenav')
@section('title', 'Create Upload')

@section('content')

<h1>Create Upload</h1>
<form method="post" action="/admin/uploads" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="url">Url:</label>
        <input name="url" type="file" id="url" />
    </div>
    <div class="form-group">
        <label for="url_two">URL tow:</label>
        <input name="url_two" type="file" id="url_two" />
    </div>
    <button type="submit">Submit</button>
</form>

@endsection