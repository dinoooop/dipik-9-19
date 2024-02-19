@extends('layouts.front')
@section('title', 'User Login')


@section('content')
<section class="blog-header">
    @include('templates.nav')
</section>

<section id="nav-stick-time">
    <div class="wrapper blog-single">

        <div class="blog-main">
            <h1>{{ $data['title'] }}</h1>
            <p class="date-time">{{ blogDateFormat($data['updated_at']) }}</p>
            <div class="blog-content"><?php echo $data->content ?></div>
        </div>

        <div class="blog-side">

            <div class="side-block">
                <img src="{{ getImageById(3) }}" alt="author" class="author-image">
                <h4>Author</h4>
                <p>{{ $user->abt_author }}</p>
            </div>

            <div class="side-block">
                <h4>Explore</h4>
                <div class="tags">
                    @foreach($tags as $key => $tag)
                    <div class="tag">
                        <a href="{{ url('tags/' . $tag->slug) }}" class="button-txt-bg">{{ $tag->title }}</a>
                    </div>
                    @endforeach
                </div>
            </div>

            @if($featured)
            <div class="side-block">
                <h4>Featured Post</h4>
                <div class="side-post">
                    <a href="{{ url('blogs/' . $featured->slug) }}"><img src="{{ getImageById($featured['image']) }}" alt="author" class="side-post-image"></a>
                    <h5 class="side-post-head"><a href="{{ url('blogs/' . $featured->slug) }}" class="button-txt-bg">{{ $featured['title'] }}</a></h5>
                </div>
            </div>
            @endif

            @if($related)
            <div class="side-block">
                <h4>Related Read</h4>
                <div class="side-post">
                    <a href="{{ url('blogs/' . $related->slug) }}"><img src="{{ getImageById($related['image']) }}" alt="author" class="side-post-image"></a>
                    <h5 class="side-post-head"><a href="{{ url('blogs/' . $related->slug) }}" class="button-txt-bg">{{ $related['title'] }}</a></h5>
                </div>
            </div>
            @endif




        </div>


    </div>

</section>

@include('templates.footer')

@endsection