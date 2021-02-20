@extends('layouts.main')

@section('title')
Package Selection
@endsection
@section('underhead')
<style>
    body {
        margin: 0;
        padding: 0;
        height: 100%;
        /* overflow: hidden; */
    }

    .pricing-card {
        box-shadow: 0 0 20px 1px #a9a5a5;
    }

    .card-feature:before {
        margin-right: 0.6rem;
        content: "\f00c";
        font-family: 'FontAwesome';
        color: #4CAF50;
    }

    .card-header-divider {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
    }

    .font-sans-serif {
        font-family: sans-serif;
    }

    .pricing-card .card-header {
        background: transparent;
        padding-top: 1.4rem;
        border-bottom: 0;
        padding-bottom: 0;
    }

    .subscribe-card-btn {
        border-radius: 0;
    }

    .subscribe-card-btn.shadow {
        box-shadow: 0 0 20px 1px #a9a5a5;
    }

    .subscribe-card-btn.shadow:hover {
        background: #274786;
        color: #fff;
    }

    .subscribe-card-btn:not(.shadow):hover {
        color: #274786 !important;
    }

    .subscribe-card-btn:not(.shadow):hover {
        background: #2196F3;
        color: #fff !important;
    }

    .feature-card {
        background-image: linear-gradient(45deg, #274786, #1f6894) !important;
        color: #fff;
    }

    .feature-card .subscribe-card-btn {
        background: #fff;
        box-shadow: 0;
    }

</style>
@endsection


@section('main')

    <div class="container mt-5 pt-5">
        <div class="row">
            @php
               $counter = 0;
            @endphp
            @foreach($memberships as $membership)
            <div class="col-10 mx-auto col-md-6 col-lg-5 pr-0">
                <div class="card pricing-card @if(($counter++)%2==1) feature-card @endif">
                    <header class="card-header text-capitalize">
                        <h1 class="h4 text-center mt-3 mb-2">
                            @if($membership->month == 1)
                                Monthly
                            @else
                                {{$membership->month}} Months
                            @endif

                        </h1>
                        <hr class="card-header-divider">
                    </header>
                    <main class="card-body pt-0">
                        <h3 class="text-center">${{$membership->amount}}</h3>
                        <p class="text-center font-sans-serif">
                            No commitments. Cancel any time.
                        </p>
                        <ul>
                            <li class="text-capitalize card-feature">real time
                                operation flow
                            </li>
                            <li class="text-capitalize card-feature">market news
                            </li>
                            <li class="text-capitalize card-feature">usual stock
                                alert</li>
                            <li class="text-capitalize card-feature">dark pool data
                            </li>
                            <li class="text-capitalize card-feature">trade alerts
                            </li>
                            <li class="text-capitalize card-feature">pivot search
                            </li>
                        </ul>

                        <div class="text-center mt-5 mb-4">
                            <p class="text-capitalize font-sans-serif">
                                under development
                            </p>
                            <form action="{{ route('subscribe.price') }}" method="GET" class="d-inline">
                                @foreach ($user as $key=> $item)
                                <input type="hidden" name="{{ $key }}" value="{{ $item }}">
                                @endforeach
                                <input type="hidden" name="price" value="{{$membership->amount}}">
                                <button type="submit" class="btn btn-lg subscribe-card-btn @if(($counter)%2==1)btn-primary shadow @endif text-capitalize">
                                    sign up
                                </button>
                            </form>
                        </div>
                    </main>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /.row -->
    </div>

@endsection