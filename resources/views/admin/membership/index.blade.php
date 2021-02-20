@extends('admin.layouts.admin')

@section('title')
    Membership
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
        Membership
        <small>Detail</small>
        <a
            href="{{ url('admin/membership/create') }}"
            class="btn btn-primary text-uppercase"
        >create</a>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>
                Home</a>
        </li>
        <li class="active">Memberships</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Memberships Detail</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper"
                        class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table
                                        id="searchable_table"
                                        class="table table-bordered table-striped dataTable"
                                        role="grid"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row" class="no-wrap-container">
                                                <th
                                                    class="sorting_asc"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 50px"
                                                >No</th>
                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 50px"
                                                >Months</th>
                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 50px"
                                                >Amount</th>
                                                <th
                                                        class="sorting"
                                                        tabindex="0"
                                                        aria-controls="example1"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 50px"
                                                >Operation</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($memberships as $item)
                                                @php $i=0; @endphp

                                            <tr class="{{ $i%2 == 0 ? 'even' : 'odd' }} no-wrap-container" role="row">
                                                <td class="sorting_1">
                                                    {{ $item->id }}</td>
                                                <td>{{ $item->month }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>{{ $item->amount }}</td>
                                                <td>
                                                    <div><a class="btn btn-success" href="{{url('admin/membership/'.$item->id)}}">edit</a></div>
                                                    <form action="{{url('admin/membership/delete-membership')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$item->id}}">
                                                        <button class="btn btn-danger" type="submit">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr role="row" class="no-wrap-container">
                                                <th
                                                    class="sorting_asc"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending"
                                                    style="width: 50px"
                                                >No</th>
                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 50px"
                                                >Months</th>
                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 50px"
                                                >Amount</th>
                                                <th
                                                        class="sorting"
                                                        tabindex="0"
                                                        aria-controls="example1"
                                                        rowspan="1"
                                                        colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="width: 50px"
                                                >Operation</th>
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