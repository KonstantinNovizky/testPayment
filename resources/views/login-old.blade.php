@extends('layouts.main')

@section('title')
Login
@endsection


@section('main')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div
                class="login100-pic js-tilt"
                data-tilt
            >
                <img
                    src="{{ asset('images/img-01.png') }}"
                    alt="IMG"
                >
            </div>

            <form
                class="login100-form validate-form"
                action="{{ route('access') }}"
                method="post"
            >
                @csrf
                <span class="login100-form-title">
                    LOGIN
                </span>
                <div
                    class="wrap-input100 validate-input"
                    data-validate="Valid email is required: ex@abc.xyz"
                >
                    <input
                        class="input100"
                        type="email"
                        name="email"
                        placeholder="Email"
                    >
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i
                            class="fa fa-envelope"
                            aria-hidden="true"
                        ></i>
                    </span>
                </div>

                <div
                    class="wrap-input100 validate-input"
                    data-validate="Password is required"
                >
                    <input
                        class="input100"
                        type="password"
                        name="password"
                        placeholder="Password"
                    >
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i
                            class="fa fa-lock"
                            aria-hidden="true"
                        ></i>
                    </span>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a
                            href="{{ route('main') }}"
                            style="border-radius:25px;"
                            class="btn btn-dark btn-block "
                        >Back</a>
                    </div>
                    <div class="col-md-6 ">
                        <button
                            type="submit"
                            style="border-radius:25px;"
                            class="btn btn-primary btn-block"
                        >
                            Login
                        </button>
                    </div>
                </div>
                <p class="text-center my-3">
                    Not have an account just <a
                        href="{{ route('register') }}">Register</a>
                </p>
                <div class="text-center p-t-12">
                    <a
                        class="float-left hover"
                        style="color: #2B60DE;"
                        href="{{ url('forgot-password') }}"
                    >
                        Forgot Password?
                    </a>
                    <a
                        class=" text-center float-right hover"
                        style="color: #2B60DE;"
                        style="color: blue;"
                        style="padding:5px;border-radius: 25px;"
                        href="{{ route('subscribe') }}"
                    >
                        Subscribe
                    </a>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection

@section('customjs')

<script>
    $('.js-tilt').tilt({
            scale: 1.1
        })

</script>

@endsection