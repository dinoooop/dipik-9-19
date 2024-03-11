<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates.head')
    <link href="{{ asset('assets/css/admin.css') }}" rel="stylesheet">
    @yield('head')
</head>

<body>
    <div class="container">
        <aside class="sidenav">
            <ul>
                <li><a href="/" target="_blank">
                        <i class="fa-solid fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li><a href="/admin/profiles">
                        <i class="fa-solid fa-id-badge"></i>
                        <span>Profiles</span>
                    </a>
                </li>
                <li><a href="/admin/blogs">
                        <i class="fa-solid fa-blog"></i>
                        <span>Blogs</span>
                    </a>
                </li>
                <li><a href="/admin/create-code-html">
                        <i class="fa-solid fa-code"></i>
                        <span>Code Editor</span>
                    </a>
                </li>
                <li><a href="/admin/stories">
                        <i class="fa-solid fa-book-open-reader"></i>
                        <span>Stories</span>
                    </a>
                </li>
                <li><a href="/admin/works">
                        <i class="fa-solid fa-briefcase"></i>
                        <span>Works</span>
                    </a>
                </li>
                <li><a href="/admin/uploads">
                        <i class="fa-solid fa-square-caret-up"></i>
                        <span>Uploads</span>
                    </a>
                </li>
                <li><a href="/admin/experiences">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>Experiences</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/users">
                        <i class="fa-solid fa-user"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li><a href="/admin/tags">
                        <i class="fa-solid fa-tag"></i>
                        <span>Tags</span>
                    </a>
                </li>
                <li>
                    <a href="/logout">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </aside>

        <main>
            <div class="main">

                @yield('content')

            </div>
        </main>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>