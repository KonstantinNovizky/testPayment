@extends('admin.layouts.admin')

@section('title')
Dashboard
@endsection

@section('underhead')
<link
    rel="stylesheet"
    href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"
>
@endsection

@section('main')
<!-- Content Header (Page header) -->
<section class="content-header">
    @if (Session::has('success'))
    <x-alert needDismiss>
        @slot('title')
        Action performed:
        @endslot
        {{ session('success') }}
    </x-alert>
    @elseif(Session::has("failure"))
    <x-alert
        type="danger"
        needDismiss
    >
        @slot('title')
        Failed Action!
        @endslot
        {{ session('failure') }}
    </x-alert>
    @endif
</section>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-6  col-xs-offset-3">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Edit User</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <form
                        method="POST"
                        action="{{ route('admin.users.update', $user->id) }}"
                    >
                        @csrf
                        @method('PUT')
                        <form
                            method="POST"
                            action="{{ route('admin.users.store') }}"
                        >
                            @csrf
                            <div class="form-group">
                                <label
                                    class="small mb-1"
                                    for="inputFirstName"
                                >First Name</label>
                                <input
                                    class="form-control py-4"
                                    id="inputFirstName"
                                    type="text"
                                    name="first_name"
                                    placeholder="Enter first name"
                                    value="{{ $user->first_name }}"
                                />
                                @if ($errors->has('first_name'))
                                <small class="help-block text-danger">
                                    {{ $errors->first('first_name') }}
                                </small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label
                                    class="small mb-1"
                                    for="inputFirstName"
                                >Last Name</label>
                                <input
                                    class="form-control py-4"
                                    id="inputFirstName"
                                    type="text"
                                    name="last_name"
                                    placeholder="Enter last name"
                                    value="{{ $user->last_name }}"
                                />
                                @if ($errors->has('last_name'))
                                <small class="help-block text-danger">
                                    {{ $errors->first('last_name') }}
                                </small>
                                @endif
                            </div>


                            <div class="form-group">
                                <label
                                    class="small mb-1"
                                    for="email"
                                >Email</label>
                                <input
                                    class="form-control py-4"
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="Enter email"
                                    value="{{ $user->email }}"
                                />
                                @if ($errors->has('email'))
                                <small class="help-block text-danger">
                                    {{ $errors->first('email') }}
                                </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label
                                    class="small mb-1"
                                    for="inputPassword"
                                >Password</label>
                                <input
                                    class="form-control py-4"
                                    id="inputPassword"
                                    type="password"
                                    placeholder="Enter new password"
                                    name="password"
                                />
                                @if ($errors->has('password'))
                                <small class="help-block text-danger">
                                    {{ $errors->first('password') }}
                                </small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label
                                    class="small mb-1"
                                    for="inputConfirmPassword"
                                >
                                    Confirm Password
                                </label>
                                <input
                                    class="form-control py-4"
                                    id="inputConfirmPassword"
                                    name="password_confirmation"
                                    type="password"
                                    placeholder="Confirm new password"
                                />
                                @if ($errors->has('password_confirmation'))
                                <small class="help-block text-danger">
                                    {{ $errors->first('password_confirmation') }}
                                </small>
                                @endif
                            </div>
                            <button
                                class="btn btn-primary btn-block"
                                type="submit"
                            >
                                Update User
                            </button>
                        </form>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection

@section('customjs')
<script
    src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"
>
</script>
<script
    src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"
></script>
<script>
    $(function () {
        $('#searchable_table').DataTable()
    //   $('#example1').DataTable({
    //     'paging'      : true,
    //     'lengthChange': false,
    //     'searching'   : false,
    //     'ordering'    : true,
    //     'info'        : true,
    //     'autoWidth'   : false
    //   })
    })
</script>
@endsection


@section('customjs')
<script src="assets/demo/datatables-demo.js"></script>
@endsection