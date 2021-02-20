@extends('layouts.main')

@section('title')
    Register
@endsection


@section('underhead')

@endsection

@section('main')

<section
    style=""
    class="pt-2"
>
    <div class="container mt-4">
        <a href="{{ route('main') }}">
            <img
                src="{{ asset('img/go-back.png') }}"
                alt=""
                class="login-page-previous-btn"
            >
        </a>
    </div>

    <div class="container">
        {{-- <x-alert-container></x-alert-container> --}}
        <div
            class="row align-items-center"
            style="min-height: 80vh"
        >
            <div class="col-md-7 mx-auto bg-info p-3">
                <form class="card card-body px-5">
                    <div
                        class="mx-auto"
                        style="width: 80%;"
                    >
                        <h1 class="text-center text-uppercase my-3 h4">
                            @if ($status)
                            <i class="fa fa-star"></i>
                            sign up finished
                            @else
                            <i
                                class="fa fa-exclamation-triangle text-danger"></i>
                            Failed to Signup!
                            @endif
                        </h1>

                        <div class="row form-group">
                            <div class="offset-6 col-6 text-right">Step 3/3
                            </div>
                        </div>

                        <h3 class="display-4 text-center">
                            @if ($status)
                            Thank You!
                            @else
                            Failed to Signup!
                            @endif
                        </h3>
                        <h4 class="text-center text-uppercase">
                            welcome to selective trades
                        </h4>
                        <div class="mt-1">
                            {!! $message !!}
                        </div>
                        <div class="form-group">
                            @if ($status)
                            <a
                                href="{{ route('login') }}"
                                class="btn btn-outline-primary btn-block"
                            >Login</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
@endsection


@section('customjs')
<script>
    $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

</script>

@endsection