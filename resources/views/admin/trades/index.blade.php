@extends('admin.layouts.admin')

@section('title')
Dashboard
@endsection

@section('underhead')
<link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/popup.css') }}">
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
    <x-alert type="danger" needDismiss>
        @slot('title')
        Failed Action!
        @endslot
        {{ session('failure') }}
    </x-alert>
    @endif

    <h1>
        Trades
        <small>Detail</small>
        <a href="{{ route('trades.create') }}" class="btn btn-primary text-uppercase">Create</a>
        <a class="btn btn-success text-uppercase" href="javascript:void(0);" id="myBtn">Bulk Upload</a>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>Home</a></li>
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
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="searchable_table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr class="no-wrap-container">
                                                <th>S.No</th>
                                                <th>DATE</th>
                                                <th>EXP.DATE</th>
                                                <th>STOCK NAME</th>
                                                <th>STRIKE</th>
                                                <th>CALL / PUT</th>
                                                <th>QTY</th>
                                                <th>In PRICE</th>
                                                <th>TOTAL</th>
                                                <th>SELL DATE</th>
                                                <th>SELL PRICE</th>
                                                <th>HIGH</th>
                                                <th>TOTAL Net</th>
                                                <th>PROFIT / LOSS</th>
                                                <th>IN %</th>
                                                <th>HOLD / EXIT</th>
                                                <th>TOTAL PROFIT / LOSS</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $i = 0;
                                            @endphp
                                            @foreach ($trades as $trade)
                                            <tr class="{{ $i%2 == 0 ? 'even' : 'odd' }} no-wrap-container"
                                                role="row">
                                                <td class="sorting_1">{{ $trade->s_no }}</td>
                                                <td>{{ $trade->created_at }}</td>
                                                <td>{{ $trade->expiration_date }}</td>
                                                <th>stock name</th>
                                                <th>strike</th>
                                                <td>{{ $trade->callput }}</td>
                                                <td>{{ $trade->qty }}</td>
                                                <td>In Price</td>
                                                <td>total</td>
                                                <td>{{ $trade->sell_date }}</td>
                                                <td>{{ $trade->sell_price }}</td>
                                                <th>high</th>
                                                <td>{{ $trade->net }}</td>
                                                <td>{{ $trade->profit }}</td>
                                                <th>In %</th>
                                                <th>Hold / Exit</th>
                                                <th>Total Profit/Loss</th>
                                                <td>
                                                    <form action="{{ route('trades.destroy', $trade->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method("delete")
                                                        <button class="btn btn-sm btn-danger my-1"
                                                            type="submit" onclick="return confirm('Are you sure! You want to delete this trade?')">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>

                                                    <a href="{{ route('trades.show', $trade->id) }}" class="btn btn-sm btn-primary"
                                                        style="margin-top: .3rem"
                                                    >
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="no-wrap-container">
                                                <th>S.No</th>
                                                <th>DATE</th>
                                                <th>EXP.DATE</th>
                                                <th>STOCK NAME</th>
                                                <th>STRIKE</th>
                                                <th>CALL / PUT</th>
                                                <th>QTY</th>
                                                <th>In PRICE</th>
                                                <th>TOTAL</th>
                                                <th>SELL DATE</th>
                                                <th>SELL PRICE</th>
                                                <th>HIGH</th>
                                                <th>TOTAL Net</th>
                                                <th>PROFIT / LOSS</th>
                                                <th>IN %</th>
                                                <th>HOLD / EXIT</th>
                                                <th>TOTAL PROFIT / LOSS</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
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

<form id="myModal" class="modal" method="post" action="{{route('file-import')}}" enctype="multipart/form-data">
    @csrf
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Bulk Import Trades</h2>
        </div>
        <div class="modal-body">
            <p>Pls select csv/excel file</p>
            <input class="form-control" type="file" name="importFile">
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success" style="color:black;">Import</button>
        </div>
    </div>

</form>

@endsection

@section('customjs')
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.js') }}"></script>
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

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
@endsection