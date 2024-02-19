@extends('layouts.sidenav')
@section('title', 'Tags')

@section('content')

<h1>Tags</h1>

<div class="table-top">
    <div class="form-group">
        <input type="text" name="search" />
    </div>
    <a href="/admin/tags" class="btn"><i class="fas fa-search"></i></a>
    <a href="/admin/tags/create" class="btn"><i class="fas fa-add"></i></a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Duration</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $key => $model)
        <tr>
            <td>{{$model['id']}}</td>
            <td>{{$model['title']}}</td>
            <td>{{$model['duration']}}</td>
            <td>
                <a href="/admin/tags/{{$model['id']}}/edit" class="btn"><i class="fas fa-edit"></i></a>
                <button data-model-end-point="tags" data-model-id="{{ $model->id }}" class="btn trash"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection