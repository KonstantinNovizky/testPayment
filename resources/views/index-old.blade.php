@extends('layouts.main')

@section('title')
Trading Service
@endsection

@section('underhead')
<link
    rel="icon"
    type="image/png"
    href="images/icons/favicon.ico"
/>

<style>
    .form-group {
        margin: 0px !important;
        padding: 0px !important;
    }

    .row {
        margin: 0px !important;
    }
</style>
@endsection

@section('main')

<main
    style="background:url('images/banner-1.png') no-repeat center center/cover;height:100vh;opacity:;"
>
    <div
        class="container"
        style="margin-top:0px !important;padding-top:0px;"
    >
        <x-main-navbar current="index"></x-main-navbar>
    </div>

    <!-- Main section start here -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 d-flex justify-content-end">
                    <h4
                        style="margin-top: 10%;color: rgb(233, 111, 10); font-size: 26px;">
                        Unusual Volume Data <br>
                        Pivots Points <br>
                        Candle Patterns <br>
                        Stock Option Alerts
                    </h4>

                </div>
                <div class="col-md-4 ">
                    <h2
                        class="text-uppercase"
                        style="font-weight:600px;font-size: 30px;margin-top: 40%;color: white;
                                                        line-height: 40px;"
                    >
                        Stock alerts <br> track price <br> movements live.
                    </h2>
                </div>

                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</main>
<!-- Account section start here -->
<section
    style="background: url('images/blue-background.png') ;background-position: center;
                                        background-repeat: no-repeat; background-size: cover;"
>
    <div class="container">
        <h1 class="text-center pt-5 font-weight-bold">Create Your Account</h1>

        <div class="row  d-flex justify-content-center">

            <div
                class="col-md-6 m-4 mb-10  d-flex justify-content-around"
                style="background-color: white;border-radius: 1%;"
            >

                <form action="">
                    <p
                        class="text-center font-weight-bold"
                        style="padding-top: 25px;"
                    ><span style="padding-right: 5px;font-size: 20px;"><i
                                class="far fa-user"
                            ></i></span>ACCOUNT
                    </p>
                    <div
                        class="row "
                        id="info"
                        style="width:95%;"
                    >
                        <div class="col-md-6 ">
                            Personnal Information
                        </div>
                        <div class="col-md-6 text-right">
                            Step 1/3

                        </div>
                    </div>
                    <!-- form section start here -->
                    <div class="row">
                        <div class="col-md-6">
                            <div
                                class="form-group"
                                style="padding-top: 0px 
                                                            !important;"
                            >
                                <label for="">First Name<span
                                        style="color:red;">*</span></label>
                                <input
                                    type="text"
                                    class="form-control custom-first"
                                >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Last Name<span
                                        style="color:red;">*</span></label>
                                <input
                                    type="text"
                                    class="form-control custom-first"
                                >
                            </div>
                        </div>
                    </div>
                    <div
                        class="form-group"
                        style=""
                    >
                        <label for="">Email<span
                                style="color:red;">*</span></label>
                        <input
                            type="email"
                            class="form-control custom"
                        >
                    </div>
                    <div class="form-group">
                        <label for="">Phone No<span
                                style="color:red;">*</span></label>
                        <input
                            type="number"
                            class="form-control custom"
                        >
                    </div>
                    <div class="form-group">
                        <label for="">Password<span
                                style="color:red;">*</span></label>
                        <input
                            type="password"
                            class="form-control custom"
                        >
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password<span
                                style="color:red;">*</span></label>
                        <input
                            type="password"
                            class="form-control custom"
                        >
                    </div>
                    <div class="form-group">
                        <label for="">Telegram ID<span
                                style="color:red;">*</span></label>
                        <input
                            type="password"
                            class="form-control custom"
                        >
                    </div>
                    <div class="form-group">
                        <label for="">Twitter Account<span
                                style="color:red;">*</span></label>
                        <input
                            type="text"
                            class="form-control custom"
                        >
                    </div>
                    <div class="form-group">
                        <input
                            type="checkbox"
                            class=""
                            style=""
                        > <span style="font-size: 12px;">By Clicking to Sign
                            up you agree to our <span>terms and
                                condations</span></span>


                    </div>
                    <div
                        class="row last-row"
                        style="padding-bottom: 25px;padding-top: 10px;"
                    >
                        <div class="col-md-6">
                            <a
                                href=""
                                class="btn btn-block  btn-dark"
                                style="width: 80%;"
                            >Back</a>
                        </div>
                        <div class="col-md-6">
                            <a
                                href=""
                                class="btn btn-block  btn-primary"
                                style="width: 80%;"
                            >Next</a>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</section>
<!-- pricing section start here -->
<!-- <section  style="height:100% !important;background-color:#eee;">
                                            <div class="">
                                                <h2 class="text-center font-weight-bold" style="color:white;font-size:bold;margin:auto;padding-top:50px;color:black;">OUR PRICING</h2>
                                            </div> -->

<div
    class="container"
    style=" background-color:red;height:100% !important"
>
    <div class="row  d-flex justify-content-center">
        <div
            class="col-md-4 col-sm-12 "
            style=" padding-bottom:20px;"
        >
            <div
                class="pricingTable-first  yellow"
                id="change-color-white"
                style=""
            >
                <div class="yellow-header">
                    <h3 class="title">MONTHLY</h3>
                </div>
                <div class="yellow-value">
                    <span class="amount">$1</span>
                    <!-- <span class="amount-sm">00</span> -->
                    <span class="duration">No Commitments Cancel at any
                        time</span>
                </div>
                <ul class="yellow-content">
                    <li><span><i class="far fa-check-circle"></i></span>Real
                        Time Options Flow</li>
                    <li><span><i class="far fa-check-circle"></i></span>Market
                        News</li>
                    <li><span><i class="far fa-check-circle"></i></span>Unusual
                        Stock Alert</li>
                    <li class="disable"> <span><i
                                class="far fa-check-circle"></i></span>Dark Pole
                        Data</li>
                </ul>
                <div class="yellow-signup">
                    <a href="#">Sign Up</a>
                </div>
            </div>
        </div>
        <div
            class="col-md-4 col-sm-12 "
            style=" padding-bottom:20px;"
        >
            <div
                class="pricingTable-second yellow"
                id=""
            >
                <div class="yellow-header">
                    <h3 class="title">YEARLY</h3>
                </div>
                <div class="yellow-value">
                    <span class="amount">$2</span>
                    <!-- <span class="amount-sm">00</span> -->
                    <span class="duration">No Commitments Cancel at any
                        time</span>
                </div>
                <ul class="yellow-content">
                    <li><span><i class="far fa-check-circle"></i></span>Real
                        Time Options Flow</li>
                    <li><span><i class="far fa-check-circle"></i></span>Market
                        News</li>
                    <li><span><i class="far fa-check-circle"></i></span>Unusual
                        Stock Alert</li>
                    <li class="disable"> <span><i
                                class="far fa-check-circle"></i></span>Dark Pole
                        Data</li>
                </ul>
                <div class="yellow-signup">
                    <a href="#">Sign Up</a>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- </section> -->

<!-- concat us  -->
<!-- <div class="contact1" style="height:100% !important;">
                                          <div class="container-contact1">
                                           <div class="contact1-pic js-tilt" data-tilt>
                                            <img src="images/img-01.png" alt="IMG">
                                           </div>

                                           <form class="contact1-form validate-form">
                                            <span class="contact1-form-title">
                                             Get in touch
                                            </span>

                                            <div class="wrap-input1 validate-input" data-validate = "Name is required">
                                             <input class="input1" type="text" name="name" placeholder="Name">
                                             <span class="shadow-input1"></span>
                                            </div>

                                            <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                                             <input class="input1" type="text" name="email" placeholder="Email">
                                             <span class="shadow-input1"></span>
                                            </div>

                                            <div class="wrap-input1 validate-input" data-validate = "Subject is required">
                                             <input class="input1" type="text" name="subject" placeholder="Subject">
                                             <span class="shadow-input1"></span>
                                            </div>

                                            <div class="wrap-input1 validate-input" data-validate = "Message is required">
                                             <textarea class="input1" name="message" placeholder="Message"></textarea>
                                             <span class="shadow-input1"></span>
                                            </div>

                                            <div class="container-contact1-form-btn">
                                             <button class="contact1-form-btn">
                                              <span>
                                               Send Email
                                               <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                              </span>
                                             </button>
                                            </div>
                                           </form>
                                          </div>
                                         </div> -->

@endsection

@section('customjs')

<script>
    $('.js-tilt').tilt({
            scale: 1.1
        })
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');

</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script
    async
    src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"
></script>
@endsection