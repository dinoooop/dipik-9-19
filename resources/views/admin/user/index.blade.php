@extends('layouts.sidenav')
@section('title', 'Users List')

@section('content')

<h1>Users List</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key => $user)
        <tr>
            <td>{{$user['name']}}</td>
            <td>{{$user['email']}}</td>
            <td><a href="/admin/users/{{$user['id']}}/edit">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection