@extends('layouts.sidenav')
@section('title', 'Create User')

@section('content')

<h1>Create User</h1>
<form method="post" action="/admin/users">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input name="name" type="text" id="name" />
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input name="email" type="email" id="email" />
    </div>
    <div class="form-group">
        <label for="abt_author">About Author:</label>
        <input name="abt_author" type="abt_author" id="abt_author" />
    </div>
    <button type="submit">Submit</button>
</form>

@endsection