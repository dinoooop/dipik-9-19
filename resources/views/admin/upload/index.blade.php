@extends('layouts.sidenav')
@section('title', 'Uploads')

@section('content')

<h1>Uploads</h1>

<div class="table-top">
    <div class="form-group">
        <input type="text" name="search" />
    </div>
    <a href="/admin/uploads" class="btn"><i class="fas fa-search"></i></a>
    <a href="/admin/uploads/create" class="btn"><i class="fas fa-add"></i></a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Url</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data['uploads'] as $key => $model)
        <tr>
            <td>{{$model['id']}}</td>
            
            <td>
                <img src="{{asset('storage/uploads/' . $model['url'])}}" alt="" width="150">
            </td>
            <td>{{asset('storage/uploads/' . $model['url'])}}</td>
            <td>
                <a href="/admin/uploads/{{$model['id']}}/edit" class="btn"><i class="fas fa-edit"></i></a>
                <button data-model-end-point="uploads" data-model-id="{{ $model->id }}" class="btn trash"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>






{{-- Base URL --}}
@php
    $base_url = url('admin/uploads');
    $current_page = $data['page'];
    $total_pages = $data['uploads']->lastPage();
@endphp


<ul class="pagination">
    @if ($current_page > 1)
        <li><a href="{{ $base_url }}?page={{ $current_page - 1 }}">prev</a></li>
    @endif

    @for ($i = 1; $i <= $total_pages; $i++)
        @if ($i == $current_page)
            <li><a href="{{ $base_url }}?page={{ $i }}" class="active">{{ $i }}</a></li>
        @elseif (
            $i == 1 || $i == $total_pages || // Always show the first and last pages
            $i == $current_page || // Show the current page
            abs($i - $current_page) <= 1 || // Show pages within one step of the current page
            ($i == 2 && $current_page > 4) || // Show the second page if the current page is far enough
            ($i == $total_pages - 1 && $current_page < $total_pages - 3) // Show the second-to-last page if the current page is far enough
        )
            <li><a href="{{ $base_url }}?page={{ $i }}">{{ $i }}</a></li>
        @elseif ($i == 3 && $current_page > 4)
            <span class="ellipsis">...</span>
        @elseif ($i == $total_pages - 2 && $current_page < $total_pages - 3)
            <span class="ellipsis">...</span>
        @endif
    @endfor

    @if ($current_page < $total_pages)
        <li><a href="{{ $base_url }}?page={{ $current_page + 1 }}">Next</a></li>
    @endif
</ul>

@endsection