@extends('user.layouts.user')

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
        <div class="col-xs-6 col-xs-offset-3">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Add New Trade</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <form
                        method="POST"
                        action="{{ route('trades.store') }}"
                    >
                        @csrf


                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            >Qty</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="qty"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>

                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            >S.No</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="s_no"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            >buy_date</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="buy_date"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            > symbol</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="symbol"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            >expiration_date</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="expiration_date"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            >callput</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="callput"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            > strike_price</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="strike_price"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            >stock_price</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="stock_price"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            >stock_stoploss</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="stock_stoploss"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            >stock_resistance</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="stock_resistance"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            >buy_price</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="buy_price"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            >sell_price</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="sell_price"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            >sell_date</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="sell_date"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            >net</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="net"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            >profit</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="profit"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            >current_price</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="current_price"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            >days_to_expire</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="days_to_expire"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label
                                class="small mb-1"
                                for="inputFirstName"
                            >status</label>
                            <input
                                class="form-control py-4"
                                id="inputFirstName"
                                type="text"
                                name="status"
                                placeholder="Enter name"
                            />
                            @if ($errors->has('qty'))
                            <small class="help-block text-danger">
                                {{ $errors->first('qty') }}
                            </small>
                            @endif
                        </div>
                        <button
                            class="btn btn-primary btn-block"
                            type="submit"
                        >
                            Crate Trade
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