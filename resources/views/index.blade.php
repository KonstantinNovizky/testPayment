<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Selective Trades</title>
    <script src="https://kit.fontawesome.com/67914b2c2a.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}"/>
    <link rel="stylesheet" href="{{ asset('css/popup.css') }}" />
</head>

<body>

    <nav class="navbar navbar-expand-sm color navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="images/SELECTIVE-TRADES.png" id="logo" alt="I">
        </a>
        <a class="navbar-brand" id="logotext" href="{{ url('/') }}">Selective Trades</a>
        <ul class="navbar-nav ml-auto" id="button">
            <li class="nav-item active p-2">
                <form class="d-inline" action="{{ route('subscribe.me') }}" method="post">
                    @csrf
                    <input type="hidden" name="type" value="subscribe">
                    <button class="btn btn-info banner-footer-btn btn-lg" style="border-radius: 20px; background-color: #070a1b;" type="submit" value="login" id="subscribe">
                        Membership
                    </button>
                </form>
            </li>
            <li class="nav-item p-2">

                <button
                    style="border-radius: 20px; background-color: #070a1b;"
                    class="btn btn-lg btn-info"
                ><i class="glyphicon glyphicon-ok"></i><a
                        href="login"
                        style="text-decoration: none;color: white;"
                    >LOGIN</a></button>
            </li>
        </ul>
    </nav>

    <div class="container">
        <x-alert-container needDismiss></x-alert-container>
    </div>

    <div class="container banner position-relative">
        <div class="row">
            <div
                class=" col-6"
                id="text"
            >
                {{-- <div id="curve">

            </div> --}}
                <a
                    class="navbar-brand text-center"
                    href="{{ url('/') }}"
                >Selective Trades</a>
                <ul
                    class="list-unstyled"
                    id="content"
                >
                    <li class="text-center text-lg-left mb-2">OPTION ALERTS</li>
                    <li class="text-center text-lg-left mb-2">CANDLE PATTERN
                    </li>
                    <li class="text-center text-lg-left mb-2">PIVOT POINTS</li>
                    <li class="text-center text-lg-left mb-2">UNUSUAL VOLUME
                    </li>
                    <li class="text-center text-lg-left mb-2">DARK POOL DATA
                    </li>
                    <li class="text-center text-lg-left mb-2">REAL TIME BULLISH
                        FLOW
                    </li>
                    <li class="text-center text-lg-left mb-2">REAL TIME BEARISH
                        FLOW
                    </li>
                    <li class="text-center text-lg-left mb-2">STOCK PRICE
                        BETWEEN
                        DATES</li>
                    <li class="text-center text-lg-left mb-2">STOCK DFFERENCE
                        BETWEEN DATES</li>
                    <li class="text-center text-lg-left mb-2">MARKET NEWS</li>
                    <li class="text-center text-lg-left mb-2">ANDROID &AMP; IOS
                        APP
                    </li>
                </ul>


                <p class="text-center text-lg-left on-top">* under DEVELOPMENT
                </p>
            </div>
        </div>
        <div class="bg-dark text-light d-flex align-items-center justify-content-center py-3 position-fixed w-100" style="bottom: 0;padding: 1.2rem !important;">
            <a
                href="{{ route('contact.us') }}"
                class="btn btn-link text-light mr-3"
                style="text-decoration: underline"
            >
                Contact Us
            </a>
            <p class="pt-3">
                Click to sign up for training
            </p>
            <a href="{{ route('register_temp') }}" class="btn btn-success mr-5 ml-2">
                SIGN UP for training
            </a>
            <img src="images/apple%20button.svg" class="ml-5 mr-2" style="width: 114px;height: auto;z-index: 1111;">
            <img src="images/google%20button.svg" class="mr-5 " style="width: 114px;height: auto;z-index: 1111;">
            <a href="javascript:void(0);" data-toggle="modal" class="text-light mt-2 mx-3" id="privacyBtn">
                Privacy
            </a>
            <a href="javascript:void(0);" data-toggle="modal" class="text-light mt-2 mx-3" id="disclosureBtn">
                Disclosure
            </a>
            <span class="text-light mt-2 mx-3">copyright @ Velodyne Technologies Inc 2021</span>

        </div>
    </div>

    <div id="disclosureModal" class="modal" >
        <div class="modal-content">
            <div class="modal-header">
                <h2>Disclosure Popup</h2>
                <span class="close" onclick="disclosureClose()">&times;</span>
            </div>
            <div class="modal-body">
                <p>Content</p>
            </div>
            <div class="modal-footer">
                <p>disclosure</p>
            </div>
        </div>
    </div>

    <div id="privacyModal" class="modal">

        <div class="modal-content">
            <div class="modal-header">
                <h2>Privacy Popup</h2>
                <span class="close" onclick="privacyClose()">&times;</span>
            </div>
            <div class="modal-body">
                <p>Content</p>
            </div>
            <div class="modal-footer">
                <h4>privacy</h4>
            </div>
        </div>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"
    ></script>
    <script>
        // Get the modal
        var privacyModal = document.getElementById("privacyModal");
        var disclosureModal = document.getElementById("disclosureModal");

        // Get the button that opens the modal
        var privacyBtn = document.getElementById("privacyBtn");
        var disclosureBtn = document.getElementById("disclosureBtn");

        // When the user clicks the button, open the modal
        privacyBtn.onclick = function() {
            privacyModal.style.display = "block";
        };

        disclosureBtn.onclick = function() {
            disclosureModal.style.display = "block";
        };

        function privacyClose() {
            privacyModal.style.display = "none";
        }

        function disclosureClose() {
            disclosureModal.style.display = "none";
        }
    </script>

</body>

</html>