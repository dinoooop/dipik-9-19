@extends('layouts.sidenav')
@section('title', 'Profiles')

@section('content')

<h1>Profiles</h1>

<div class="table-top">
    <div class="form-group">
        <input type="text" name="search" />
    </div>
    <a href="/admin/profiles" class="btn"><i class="fas fa-search"></i></a>
    <a href="/admin/profiles/create" class="btn"><i class="fas fa-add"></i></a>
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
                <a href="/admin/profiles/{{$model['id']}}/edit" class="btn"><i class="fas fa-edit"></i></a>
                <button data-model-end-point="profiles" data-model-id="{{ $model->id }}" class="btn trash"><i class="fas fa-trash"></i></button>
                @if($model->status == 1)
                <button  class="btn trash"><i class="fa-solid fa-toggle-on"></i></button>
                @else
                <button data-model-end-point="profiles" data-model-id="{{ $model->id }}" data-current-status="{{ $model->status }}" class="btn change-status"><i class="fa-solid fa-toggle-off"></i></button>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection