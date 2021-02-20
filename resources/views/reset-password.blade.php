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
                <div
                    class="card"
                    style=""
                >
                    <main class="card-body px-5">
                        <h3 class="card-title  text-center text-uppercase">reset password</h3>
                        <form action="{{url('reset-pwd')}}" method="post">
                            @csrf
                                <input type="hidden" class="form-control is-invalid" name="email" value="{{ $email }}">
                            <div class="form-group">
                                <label for="password" class="font-size-1rem">New Password <sup class="text-danger">*</sup></label>
                                <input type="password" name="password" class="form-control" id="password" style="padding-right: 20px">
                                <span data-toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                @if ($errors->has('password'))
                                    <small class="help-block text-danger">
                                        {{ $errors->first('password') }}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="confirm_password" class="font-size-1rem">Confirm Password <sup class="text-danger">*</sup></label>
                                <input type="password" name="password_confirmation" class="form-control" id="confirm_password" style="padding-right: 20px">
                                <span data-toggle="#confirm_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                @if ($errors->has('password_confirmation'))
                                    <small class="help-block text-danger">
                                        {{ $errors->first('password_confirmation') }}
                                    </small>
                                @endif
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

    </script>

@endsection