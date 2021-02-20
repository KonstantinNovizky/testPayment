@extends('admin.layouts.authentication')
@section('title')
Admin Login to Selective Trades
@endsection


@section('main')

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                Admin Login
            </div>
            <form
                class="card-body"
                action="{{ route('access') }}"
                method="post"
            >
                <div class="row">
                    @csrf
                    <div class="col-md-10 mx-auto">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4 text-right mt-1">
                                    <label
                                        for="email"
                                        class="text-right font-size-1rem"
                                    >E-Mail Address</label>
                                </div>
                                <div class="col-8">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="email"
                                        name="email"
                                    >
                                </div>
                                @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4 text-right mt-1">
                                    <label
                                        for="password"
                                        class="text-right font-size-1rem"
                                    >Password</label>
                                </div>
                                <div class="col-8 text-left">
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password"
                                        name="password"
                                    >
                                </div>
                                @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                                @endif
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <div class="row">
                                <div class="offset-4 col-8 text-left">
                                    <label for="">
                                        <input
                                            type="checkbox"
                                            class=""
                                            id="remember"
                                            name="remember"
                                        >
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <div class="row">
                                <div class="offset-4 col-8 text-left">
                                    <button
                                        type="submit"
                                        class="btn btn-primary mr-3"
                                        id="login"
                                        name="login"
                                    >
                                        Login
                                    </button>
                                    <a href="#">Forgot Your Password?</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </form>
        </div>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

@endsection