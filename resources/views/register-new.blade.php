@extends('layouts.main')

@section('title')
Register
@endsection

@section('underhead')

@endsection

@section('main')


<section
    style="background: url({{ asset('images/blue-background.png') }}) ;background-position: center;background-repeat: no-repeat; background-size: cover;"
    class="pt-2"
>
    <div class="container">
        {{-- <x-alert-container></x-alert-container> --}}

        <div class="row  d-flex justify-content-center">
            <div class="col-md-6 m-4 mb-10  d-flex justify-content-around" style="background-color: white;border-radius: 1%;">
                <form action="{{ route('subscribe.payment') }}" method="post">
                    @csrf
                    @method('post')
                    <input type="hidden" name="price" value="{{ $user['price'] }}">
                    <p class="text-center font-weight-bold" style="padding-top: 25px;"><span style="padding-right: 5px;font-size: 20px;">
                            <i class="fa fa-user"></i></span>ACCOUNT</p>
                    <div class="row mb-3">
                        <div class="col-6">
                            Personnal Information:
                        </div>
                        <div class="col-6 text-right">
                            Step 1/3
                        </div>
                    </div>

                    <!-- form section start here -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">First Name<span
                                        style="color:red;">*</span></label>
                                <input
                                    type="text"
                                    name="first_name"
                                    class="form-control custom-first"
                                    value="{{ old('first_name') ? old('first_name') : $user['first_name'] }}"
                                >
                                @if ($errors->has('first_name'))
                                <small class="help-block text-danger">
                                    {{ $errors->first('first_name') }}
                                </small>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Last Name<span
                                        style="color:red;">*</span></label>
                                <input
                                    type="text"
                                    name="last_name"
                                    class="form-control custom-first"
                                    value="{{ old('last_name') ? old('last_name') : $user['last_name'] }}"
                                >
                                @if ($errors->has('last_name'))
                                <small class="help-block text-danger">
                                    {{ $errors->first('last_name') }}
                                </small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Email<span
                                style="color:red;">*</span></label>
                        <input
                            type="email"
                            name="email"
                            class="form-control custom"
                            value="{{ old('email') ? old('email') : $user['email'] }}"
                        >
                        @if ($errors->has('email'))
                        <small class="help-block text-danger">
                            {{ $errors->first('email') }}
                        </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Phone No
                            <span style="color:red;">*</span>
                        </label>

                        <div class="input-group row pl-3 pr-4">
                            <select name="phone_code" class="form-control col-4">
                                @for($i=1;$i<212;$i++)
                                    <option value="+{{$i}}" {!! old('phone_code')== "+".$i || $user['phone_code']=="+".$i ? 'selected' : '' !!} >+{{$i}}</option>
                                @endfor
                            </select>
                            <input
                                type="tel"
                                aria-label="First name"
                                class="form-control col-8"
                                placeholder="Enter Phone Number"
                                name="phone"
                                value="{{ old('phone') }}"
                            >
                        </div>

                        @if ($errors->has('phone'))
                        <small class="help-block text-danger">
                            {{ $errors->first('phone') }}
                        </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Password<span style="color:red;">*</span></label>
                        <input type="password" name="password" class="form-control custom" id="password" style="padding-right: 50px">
                        <span data-toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        @if ($errors->has('password'))
                        <small class="help-block text-danger">
                            {{ $errors->first('password') }}
                        </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Confirm Password<span style="color:red;">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control custom" id="confirm_password" style="padding-right: 50px">
                        <span data-toggle="#confirm_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        @if ($errors->has('password_confirmation'))
                        <small class="help-block text-danger">
                            {{ $errors->first('password_confirmation') }}
                        </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Telegram ID
                            {{-- <span style="color:red;">*</span> --}}
                        </label>
                        <input
                            type="text"
                            name="telegram_id"
                            class="form-control custom"
                        >
                        @if ($errors->has('telegram_id'))
                        <small class="help-block text-danger">
                            {{ $errors->first('telegram_id') }}
                        </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Twitter Account
                            {{-- <span style="color:red;">*</span> --}}
                        </label>
                        <input
                            type="text"
                            name="twitter_id"
                            class="form-control custom"
                        >
                        @if ($errors->has('twitter_id'))
                        <small class="help-block text-danger">
                            {{ $errors->first('twitter_id') }}
                        </small>
                        @endif
                    </div>
                    <div class="form-group">
                        <span
                            class="d-inline-block"
                            tabindex="0"
                        >
                            <input
                                type="checkbox"
                                name="agree"
                                id="agree"
                                class=""
                                style=""
                                data-toggle="tooltip"
                                title="required"
                                {{ old('agree') ? 'checked' : ''}}
                            >
                        </span>

                        <label for="agree" style="font-size: 12px;">
                            By Clicking to Sign up you agree to our
                            <a href="javascript:void(0);" data-toggle="modal" id="termBtn">
                                terms and condations
                            </a>
                        </label>
                        @if ($errors->has('agree'))
                        <br>
                        <small class="help-block text-danger">
                            {{ $errors->first('agree') }}
                        </small>
                        @endif
                    </div>
                    <div
                        class="row last-row"
                        style="padding-bottom: 25px;padding-top: 10px;"
                    >
                        <div class="col-md-6">
                            <a
                                href="{{ url('/') }}"
                                class="btn btn-block  btn-outline-primary"
                                style="width: 80%;"
                            >Back</a>
                        </div>
                        <div class="col-md-6">
                            <button
                                type="submit"
                                class="btn btn-block btn-primary"
                                style="width: 80%;"
                            >Next</button>
                        </div>
                    </div>

                    <p class="text-center">
                        Already have an account just <a
                            href="{{ route('login') }}"
                        >Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

    <div id="termModal" class="modal">

        <div class="modal-content">
            <div class="modal-header">
                <h2>Terms and Conditions</h2>
                <span class="close" onclick="termClose()">&times;</span>
            </div>
            <div class="modal-body" style="padding-top: 20px">
                <h4>Selective Trades</h4>
                <p>OPTION ALERTS</p>
                <p>CANDLE PATTERN</p>
                <p>PIVOT POINTS</p>
                <p>UNUSUAL VOLUME</p>
                <p>DARK POOL DATA</p>
                <p>REAL TIME BULLISH FLOW</p>
                <p>REAL TIME BEARISH FLOW</p>
                <p>STOCK PRICE BETWEEN DATES</p>
                <p>STOCK DFFERENCE BETWEEN DATES</p>
                <p>MARKET NEWS</p>
                <p>ANDROID & IOS APP</p>
            </div>
            <div class="modal-footer">
                <h4>terms and conditions</h4>
            </div>
        </div>
    </div>

@endsection


@section('customjs')
<script>
    $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        }
    );

    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("data-toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    var termModal = document.getElementById("termModal");

    // Get the button that opens the modal
    var termBtn = document.getElementById("termBtn");

    // When the user clicks the button, open the modal
    termBtn.onclick = function() {
        termModal.style.display = "block";
    };

    function termClose() {
        termModal.style.display = "none";
    }

</script>

@endsection