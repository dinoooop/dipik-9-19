@extends('layouts.sidenav')
@section('title', 'Blogs')

@section('content')

<h1>Blogs</h1>

<div class="table-top">
    <div class="form-group">
        <input type="text" name="search" />
    </div>
    <a href="/admin/blogs" class="btn"><i class="fas fa-search"></i></a>
    <a href="/admin/blogs/create" class="btn"><i class="fas fa-add"></i></a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $model)
        <tr>
            <td>{{$model['id']}}</td>
            <td>{{$model['title']}}</td>
            <td>
                <a href="/admin/blogs/{{$model['id']}}/edit" class="btn"><i class="fas fa-edit"></i></a>
                <button data-model-end-point="blogs" data-model-id="{{ $model->id }}" class="btn trash"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection