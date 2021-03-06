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


    <h1>
        Trades
        <small>Detail</small>
        <a
            href="{{ route('trades.create') }}"
            class="btn btn-primary text-uppercase"
        >create</a>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>
                Home</a>
        </li>
        <li class="active">Trades</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Trades Detail</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div
                        id="example1_wrapper"
                        class="dataTables_wrapper form-inline dt-bootstrap"
                    >
                        <div class="row">
                            <div class="col-sm-12">
                                <table
                                    id="searchable_table"
                                    class="table table-bordered table-striped dataTable"
                                    role="grid"
                                    aria-describedby="example1_info"
                                >
                                    <thead>
                                        <tr role="row">
                                            <th
                                                class="sorting_asc"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 290px;"
                                            >S.No</th>

                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 334px;"
                                            >Qty</th>
                                            {{-- <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 361px;"
                                            >Symbol</th> --}}
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending"
                                                style="width: 252px;"
                                            >Expiration Date</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Call/Put</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Strike Price</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Stock Price</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Stock Stop Loss</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Stock Resistance</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Buy Price</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Sell Price</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Sell Date</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Net</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Profit</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Current Price</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Days to Expire</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Status</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Created At</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Updated At</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 0;
                                        @endphp
                                        @foreach ($trades as $trade)
                                        <tr
                                            class="{{ $i%2 == 0 ? 'even' : 'odd' }}"
                                            role="row"
                                        >
                                            <td class="sorting_1">
                                                {{ $trade->s_no }}</td>
                                            <td>{{ $trade->qty }}</td>
                                            {{-- <td>{{ $trade->symbol }}</td>
                                            --}}
                                            <td>{{ $trade->expiration_date }}
                                            </td>
                                            <td>{{ $trade->callput }}</td>
                                            <td>{{ $trade->strike_price }}</td>
                                            <td>{{ $trade->stock_price }}</td>
                                            <td>{{ $trade->stock_stoploss }}
                                            <td>{{ $trade->stock_resistance }}
                                            <td>{{ $trade->buy_price }}
                                            <td>{{ $trade->sell_price }}
                                            <td>{{ $trade->sell_date }}
                                            <td>{{ $trade->net }}
                                            <td>{{ $trade->profit }}
                                            <td>{{ $trade->current_price }}
                                            <td>{{ $trade->days_to_expire }}
                                            <td>{{ $trade->status }}
                                            <td>{{ $trade->created_at }}
                                            <td>{{ $trade->updated_at }}
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('trades.destroy', $trade->id) }}"
                                                    method="POST"
                                                    class="d-inline"
                                                >
                                                    @csrf
                                                    @method("delete")
                                                    <button
                                                        class="btn btn-sm btn-danger my-1"
                                                        type="submit"
                                                        onclick="return confirm('Are you sure! You want to delete this trade?')"
                                                    >Delete</button>
                                                </form>

                                                <a
                                                    href="{{ route('trades.show', $trade->id) }}"
                                                    class="btn btn-info"
                                                    style="margin-top: .3rem"
                                                >
                                                    See
                                                </a>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr role="row">
                                            <th
                                                class="sorting_asc"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 290px;"
                                            >#</th>

                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 334px;"
                                            >Qty</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Browser: activate to sort column ascending"
                                                style="width: 361px;"
                                            >Symbol</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending"
                                                style="width: 252px;"
                                            >Expiration Date</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Call/Put</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Strike Price</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Stock Price</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Stock Stop Loss</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Stock Resistance</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Buy Price</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Sell Price</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Sell Date</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Net</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Profit</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Current Price</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Days to Expire</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Status</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Created At</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Updated At</th>
                                            <th
                                                class="sorting"
                                                tabindex="0"
                                                aria-controls="example1"
                                                rowspan="1"
                                                colspan="1"
                                                aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 190px;"
                                            >Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
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