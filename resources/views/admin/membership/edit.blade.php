@extends('admin.layouts.admin')

@section('title')
    Edit Membership
@endsection

@section('underhead')
    <link rel="stylesheet"
            href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
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
            <div class="col-xs-6 col-xs-offset-3">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add New Membership</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="POST" action="{{route('add.membership')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$membership->id}}">
                            <div class="form-group">
                                <label
                                        class="small mb-1"
                                        for="inputFirstName"
                                >Month</label>
                                <select class="form-control py-4" id="inputFirstName" name="month">
                                    <option value="1" @if($membership->month == 1) selected @endif>Every Month</option>
                                    <option value="2" @if($membership->month == 2) selected @endif>Two Months</option>
                                    <option value="3" @if($membership->month == 3) selected @endif>Three Months</option>
                                    <option value="4" @if($membership->month == 4) selected @endif>Four Months</option>
                                    <option value="6" @if($membership->month == 6) selected @endif>Half of Year</option>
                                </select>

                                @if ($errors->has('month'))
                                    <small class="help-block text-danger">
                                        {{ $errors->first('month') }}
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
                                        type="number"
                                        name="amount"
                                        placeholder="Enter Amount"
                                        min="0"
                                        value="{{$membership->amount}}"
                                />
                                @if ($errors->has('amount'))
                                    <small class="help-block text-danger">
                                        {{ $errors->first('amount') }}
                                    </small>
                                @endif
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">
                                Update Membership
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
    <script src="assets/demo/datatables-demo.js"></script>
@endsection