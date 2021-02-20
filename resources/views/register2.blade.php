@extends('layouts.main')

@section('title')
Register
@endsection

@section('main')
@php
// dd($validated);
@endphp
<section
    style=""
    class="pt-2"
>
    <div class="container">
        {{-- <x-alert-container></x-alert-container> --}}
        <div class="row">
            <div class="col-md-6 mx-auto">
                <form class="card card-body" method="POST" action="{{ route('signup.step3') }}">
                    @csrf
                    @method("POST")
                    <h1 class="text-center text-uppercase my-3">
                        <i class="fa fa-envelope"></i>
                        subscribe
                    </h1>
                    @foreach ($validated as $name=> $value)
                    <input
                        type="hidden"
                        name="{{ $name }}"
                        value="{{ $value }}"
                    >
                    @endforeach

                    <div class="row form-group">
                        <div class="col-6 text-left">Payment Method:</div>
                        <div class="col-6 text-right">Step 2/3</div>
                    </div>

                    <div class="form-group">
                        <button
                            class="btn btn-warning btn-block"
                            type="submit"
                        >PayPal</button>
                    </div>
                    <div class="form-group">
                        <a
                            href="javascript:history.go(-1);"
                            class="btn btn-outline-primary btn-block"
                        >Back</a>
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