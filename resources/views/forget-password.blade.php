@extends('layouts.main')

@section('title')
Forget
@endsection

@section('underhead')


@endsection

@section('main')

    <div class="container">
        <div class="text-center">
            <img
                src="{{ asset('images/SELECTIVE-TRADES.png') }}"
                style="width: 180px;"
            >
        </div>
        <!-- /.margin-center -->

        <div class="row mt-3">
            <div class="col-10 mx-auto col-md-7 p-4 bg-info">
                <div class="card">
                    <main class="card-body px-5">
                        <h3 class="card-title  text-center text-uppercase">forget
                            password</h3>
                        <form action="{{url('forget-pwd')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label
                                    for="email"
                                    class="font-size-1rem"
                                >Email <sup class="text-danger">*</sup></label>
                                <div class="input-group">
                                    <input
                                        type="email"
                                        class="form-control is-invalid fix-rounded-right"
                                        required=""
                                        placeholder="Enter Your Email"
                                        name="email"
                                        id="email"
                                    >
                                    <div class="invalid-feedback">
                                        @if($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <small class="help-block text-danger">
                                                    {{ $error }}
                                                </small>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group mb-1">
                                    <a
                                        href="{{ route('main') }}"
                                        class="btn btn-block btn-outline-primary"
                                    >Back</a>
                                </div>
                                <div class="col-6 form-group mb-1">
                                    <button
                                        type="submit"
                                        class="btn btn-block btn-primary"
                                    >Submit</button>
                                </div>
                            </div>
                        </form>
                    </main>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

@endsection