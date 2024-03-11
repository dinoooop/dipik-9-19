<footer>
    @if(isSocial())
    <div class="socials">
        <div class="social">
            <a href="https://github.com/dinoooop" target="_blank"><i class="fa-brands fa-github"></i></a>
        </div>
        <div class="social">
            <a href="https://www.linkedin.com/in/dinoooop" target="_blank"><i class="fa-brands fa-linkedin"></i></i></a>
        </div>
        <div class="social">
            <a href="https://stackoverflow.com/users/3405443/dinoop" target="_blank"><i class="fa-brands fa-stack-overflow"></i></a>
        </div>
    </div>
    @endif

    <p class="small">&#169; {{ date('Y') }} <a href="{{ url('/') }}">DIPIK</a>. All rights reserved.</p>
</footer>