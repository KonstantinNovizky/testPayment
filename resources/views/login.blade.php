@extends('layouts.main')

@section('title')
Login
@endsection

@section('underhead')


@endsection


@section('main')

    <div class="container">
        <div class="text-center">
            <img
                class="login-page-logo"
                src="{{ asset('images/SELECTIVE-TRADES.png') }}"
            >
        </div>
        <!-- /.margin-center -->

        <div class="row mt-3">
            <div class="col-10 mx-auto col-md-7 p-4 bg-info">
                <div
                    class="card"
                    style=""
                >
                    <main class="card-body px-5">
                        <h3 class="card-title  text-center text-uppercase">login
                        </h3>
                        <form
                            action="{{ route('access') }}"
                            method="post"
                        >
                            @csrf
                            <div class="form-group">
                                <label
                                    for="email"
                                    class="font-size-1rem"
                                >Email <sup class="text-danger">*</sup></label>
                                <div class="input-group">
                                    <input
                                        type="email"
                                        class="form-control {{ $errors->has("email") ? 'is-invalid ' : '' }}fix-rounded-right"
                                        placeholder="Enter Your Email"
                                        name="email"
                                        id="email"
                                    >
                                    @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label
                                    for="password"
                                    class="font-size-1rem"
                                >Password <sup class="text-danger">*</sup></label>
                                <div class="input-group">
                                    <input
                                        type="password"
                                        class="form-control {{ $errors->has("password") ? 'is-invalid ' : '' }}fix-rounded-right"
                                        placeholder="Enter Your Password"
                                        name="password"
                                        id="password"
                                    >
                                    @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <button
                                    class="btn btn-block btn-primary">Login</button>
                            </div>
                            <div class="form-group mb-1">
                                <a
                                    href="{{ route('main') }}"
                                    class="btn btn-block btn-outline-primary"
                                >Back</a>
                            </div>

                            <div class="form-group row">
                                <div class="col-6 text-left">
                                    <a
                                        href="{{ route('forget.password') }}"
                                        class=""
                                    >Forget Password</a>
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