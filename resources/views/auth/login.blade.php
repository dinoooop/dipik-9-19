@extends('layouts.blank')
@section('title', 'User Login')


@section('content')
<div class="container-blank">
    <div class="cardbody">
        <h1>Login</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="/authenticate">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input name="email" type="email" id="email" />
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input name="password" type="password" id="password" />
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</div>
@endsection