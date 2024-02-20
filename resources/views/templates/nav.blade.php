<div class="header  wrapper" id="myHeader">
    <div class="logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('assets/images/logo.png') }}" alt="dipik">
        </a>
    </div>

    <nav>
        <div class="menu" onclick="myFunction()">[=]</div>
        <div class="topnav" id="myTopnav" onclick="handleNavLinkClick()">
            <a href="{{ url('/#story') }}">Story</a>
            <a href="{{ url('/#work') }}">Works</a>
            <a href="{{ url('/#experience') }}">Experience</a>
            <a href="{{ url('/#contact') }}">Contact</a>
            @if(isBlog())
            <a href="{{ url('/blogs') }}">Blogs</a>
            @endif
        </div>
    </nav>
</div>