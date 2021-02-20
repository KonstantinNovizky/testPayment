@extends('layouts.main')

@section('title')
Register
@endsection

@section('main')
<section
    style="background: url({{ asset('images/blue-background.png') }}) ;background-position: center;background-repeat: no-repeat; background-size: cover;"
    class="pt-2"
>
    <div class="container">
        <a
            href="{{ route('main') }}"
            class="btn btn-primary"
        >Back to home</a>
        {{-- <x-alert-container></x-alert-container> --}}

        <div class="row  d-flex justify-content-center">
            <div
                class="col-md-6 m-4 mb-10  d-flex justify-content-around"
                style="background-color: white;border-radius: 1%;"
            >
                Application is successfully submitted, our team will contact you
                soon.
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