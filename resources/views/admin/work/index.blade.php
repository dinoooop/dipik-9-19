@extends('layouts.sidenav')
@section('title', 'Works')

@section('content')

<h1>Works</h1>

<div class="table-top">
    <div class="form-group">
        <input type="text" name="search" />
    </div>
    <a href="/admin/works" class="btn"><i class="fas fa-search"></i></a>
    <a href="/admin/works/create" class="btn"><i class="fas fa-add"></i></a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $model)
        <tr>
            <td>{{$model['id']}}</td>
            <td>{{$model['title']}}</td>
            <td>{{$model['image']}}</td>
            <td>
                <a href="/admin/works/{{$model['id']}}/edit" class="btn"><i class="fas fa-edit"></i></a>
                <button data-model-end-point="works" data-model-id="{{ $model->id }}" class="btn trash"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection