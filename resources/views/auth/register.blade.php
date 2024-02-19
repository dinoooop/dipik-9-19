@extends('layouts.app')
@section('title', 'Register page')

@section('content')
<div class="container-blank">
    <div class="cardbody">
        <h1>Sign Up</h1>        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="/signup">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input name="name" type="name" id="name" />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input name="email" type="email" id="email" />
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input name="password" type="password" id="password" />
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm password:</label>
                <input name="password_confirmation" type="password" id="password_confirmation" />
            </div>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</div>
@endsection