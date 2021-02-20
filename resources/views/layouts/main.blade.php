<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    {{-- All Styles --}}
    {{--
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <title>@yield('title')</title>

    <script>
        // Load JavaScript and CSS when page is loaded
        // CSS link creator and appendor to head
        const loadCss = function() {
            const link = document.createElement("link");
            link.setAttribute("rel", "stylesheet");
            link.setAttribute("href", "{{ asset('css/app.css') }}");
            document.head.appendChild(link);
        };

        // JS script creator and appendor to body
        const loadJs = function() {
            const script = document.createElement("link");
            script.setAttribute("src", "{{ asset('js/app.js') }}");
            // document.body.appendChild(script);
            const body = document.querySelector('body');
            console.log(body);
        };
        document.onload = function() {
            loadCss();
            // loadJs();
        }();
        loadCss();
        // loadJs();

    </script>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
        crossorigin="anonymous"
    >

    <style>
        /* Change values to match the radius of your form control */
        .fix-rounded-right {
            border-top-right-radius: .2rem !important;
            border-bottom-right-radius: .2rem !important;
        }
    </style>
    <link
        rel="stylesheet"
        href="{{ asset('css/universal.css') }}"
    >
    {{-- <link
        rel="favicon"
        href="{{ asset('images/favicon.png') }}"
    type="image/gif"
    sizes="50x50"
    > --}}
    <link
        rel="icon"
        type="image/png"
        href="{{ asset('images/favicon.png') }}"
    />

    <style>

        .field-icon {
            float: right;
            margin-top: -25px;
            margin-right: 54px;
            position: relative;
            z-index: 2;
        }

        #logo {
            margin-left: 30px;
            width: 50px;
        }

        #logotext {
            font-weight: bold;
            color: black;
            font-size: 35px;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}" />

    @yield('underhead')
</head>

<body>
    @if (Session::has('success') || Session::has("failure"))
    <div
        class="position-absolute"
        style="z-index: 1;"
    >
        <x-alert-container></x-alert-container>
    </div>
    @endif

    <nav class="navbar navbar-expand-sm color navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="images/SELECTIVE-TRADES.png" id="logo" alt="I">
        </a>
        <a class="navbar-brand" id="logotext" href="{{ url('/') }}">Selective Trades</a>
        @if(Request::segment(1) != 'register_temp' && Request::segment(1) != 'contact-us')
            <ul class="navbar-nav ml-auto" id="button">
                @if(Request::segment(1) != 'subscribe-me')
                    <li class="nav-item active p-2">
                        <form class="d-inline" action="{{ route('subscribe.me') }}" method="post">
                            @csrf
                            <input type="hidden" name="type" value="subscribe">
                            <button class="btn btn-info banner-footer-btn btn-lg" style="border-radius: 20px; background-color: #070a1b;" type="submit" value="login" id="subscribe">Membership</button>
                        </form>
                    </li>
                @endif

                @if(Request::segment(1) != 'login')
                    <li class="nav-item p-2">
                        <button style="border-radius: 20px; background-color: #070a1b;" class="btn btn-lg btn-info"><i class="glyphicon glyphicon-ok"></i><a href="login" style="text-decoration: none;color: white;">LOGIN</a></button>
                    </li>
                @endif
            </ul>
        @endif
    </nav>

    @yield('main')


    <script
        src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"
    ></script>

    {{-- All scripts --}}
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}

    @yield('customjs')

</body>

</html>