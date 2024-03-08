@extends('layouts.front')
@section('title', 'Blogs')


@section('content')
<section class="blog-header">
    @include('templates.nav')
</section>

<section class="blog-single" id="nav-stick-time">
    <div class="wrapper">

        <h1>Blogs</h1>


        <div class="pockets">

            @foreach($data as $key => $model)
            <div class="pocket">
                <div class="thumb">
                    <a href="{{ url('blogs/' . $model['slug']) }}">
                        <img src="{{ getImageById($model['image']) }}" alt="">
                    </a>
                </div>
                <div class="details">
                    <h4><a href="{{ url('blogs/' . $model['slug']) }}">{{ $model['title'] }}</a></h4>
                    <p class="date-time">{{ blogDateFormat($model['created_at']) }} | {{ getBlogTagTitles($model) }}</p>
                    <p class="excerpt">{{ $model['excerpt'] }}</p>
                </div>
            </div>
            @endforeach

            

        </div>
    </div>

</section>

@include('templates.footer')

@endsection