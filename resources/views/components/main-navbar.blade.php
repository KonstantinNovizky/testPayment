<nav class="navbar navbar-expand-md navbar-dark mt-0  d-flex align-items-center justify-content-center "
    style="margin-top:0px !important;padding-top:0px !important">
    <a href="#" class="navbar-brand">
        <img src="{{ asset('content/images/stlogo.png') }}" style="margin-top:0px !important;" height="130px" width=""
            alt="">
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ml-auto">
            <a href="{{ url('/') }}" class="nav-item nav-link mt-0  {{ $current == 'home' ? 'active' : '' }}">
                Home
            </a>
            <a href="{{ url('login') }}" class="nav-item nav-link {{ $current == 'login' ? 'active' : '' }}">
                Login
            </a>
            <a href="{{ url('/') }}" class="nav-item nav-link {{ $current == 'subscribe' ? 'active' : '' }}">
                Subscribe
            </a>
            <a href="{{ url('terms-conditions') }}"
                class="nav-item nav-link  {{ $current == 'terms' ? 'active' : '' }}">
                Term & Conditions
            </a>
            <a href="{{ url('/') }}" class="nav-item nav-link  {{ $current == 'contact' ? 'active' : '' }}">
                Contact
            </a>
        </div>
    </div>
</nav>
