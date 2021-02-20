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


    <h1>
        Users
        <small>Detail</small>
        <a
            href="{{ route('admin.users.create') }}"
            class="btn btn-primary text-uppercase"
        >create</a>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i>
                Home</a>
        </li>
        <li class="active">Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Users Detail</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div
                        id="example1_wrapper"
                        class="dataTables_wrapper form-inline dt-bootstrap"
                    >
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table
                                        id="searchable_table"
                                        class="table table-bordered table-striped dataTable"
                                        role="grid"
                                        aria-describedby="example1_info"
                                    >
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
                                                    style="width: 290px;"
                                                >#</th>
                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 361px;"
                                                >First Name</th>
                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 334px;"
                                                >Last Name</th>
                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 334px;"
                                                >IP Address</th>
                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 334px;"
                                                >Type of Subscription</th>
                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 334px;"
                                                >Expire</th>
                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 334px;"
                                                >Telegram ID</th>
                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 334px;"
                                                >Twitter Account</th>

                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 252px;"
                                                >Email</th>
                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 190px;"
                                                >Phone</th>
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
                                            $i = 0;;
                                            @endphp
                                            @foreach ($users as $user)
                                            @if (session('id') == $user->id)
                                                @continue
                                            @endif
                                            <tr
                                                class="{{ $i%2 == 0 ? 'even' : 'odd' }} no-wrap-container"
                                                role="row"
                                            >
                                                <td class="sorting_1">
                                                    {{ $user->id }}</td>
                                                <td>{{ $user->first_name }}</td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>IP Address</td>


                                                @php
                                                // We will do it after
                                                /*
                                                $now = new \DateTime();
                                                $oneYearBefore = new \DateTime();
                                                $oneYearBefore->sub();

                                                dd($user->subscription()->where('user_id',
                                                24)->first());
                                                $subscriptionDate = new \DateTime();
                                                dd($now);
                                                */
                                                @endphp


                                                <td>
                                                    @if(count($user->subscriptions))
                                                    {{ $user->subscriptions()->first()->price == 1 ? "Monthly" : "Yearly" }}
                                                    @else
                                                    Not Subscripte Yet
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(count($user->subscriptions))
                                                    @php
                                                    $dateFormatString = "d F, Y";
                                                    $subscription =
                                                    $user->subscriptions()->first();
                                                    if($subscription->price == 1)
                                                    {
                                                    $expireDate =
                                                    date($dateFormatString,
                                                    strtotime($subscription->created_at->addYear()));
                                                    }
                                                    else
                                                    {
                                                    $expireDate =
                                                    date($dateFormatString,
                                                    strtotime($subscription->created_at->addMonth()));
                                                    }
                                                    @endphp
                                                    {{ $expireDate }}

                                                    @else
                                                    Not Subscripte Yet
                                                    @endif
                                                </td>
                                                <td>{{ $user->telegram_id }}</td>
                                                <td>{{ $user->twitter_id }}</td>

                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>
                                                    <form
                                                        action="{{ route('admin.users.update', $user->id) }}"
                                                        method="POST"
                                                        class="d-inline"
                                                        style="display: inline"
                                                    >
                                                        @csrf
                                                        @method("put")
                                                        <input
                                                            type="hidden"
                                                            name="status"
                                                            value="{{ $user->status == 0 ? 1 : 0 }}"
                                                        >
                                                        <button
                                                            type="submit"
                                                            class="btn btn-sm btn-{{ $user->status ? 'warning' : 'primary' }}"
                                                            style="margin-bottom: .2rem"
                                                            onclick="return confirm('Are you sure! You want to {{ $user->status ? 'deactivate' : 'activate' }} this user?')"
                                                        >
                                                            @if ($user->status)
                                                            <span>
                                                                {{-- <i
                                                                    class="fa fa-th-list mr-1"></i> --}}
                                                                {{-- Deactivate --}}
                                                                <i class="fa fa-ban"></i>
                                                            </span>
                                                            @else
                                                            <span>
                                                                {{-- <i
                                                                    class="fa fa-th-list mr-1"></i>
                                                                Activate --}}
                                                                <i class="fa fa-check"></i>
                                                            </span>
                                                            @endif
                                                        </button>
                                                    </form>
                                                    <form
                                                        action="{{ route('admin.users.destroy', $user->id) }}"
                                                        method="POST"
                                                        class="d-inline"
                                                    >
                                                        @csrf
                                                        @method("delete")
                                                        <button
                                                            class="btn btn-sm btn-danger my-1"
                                                            type="submit"
                                                            onclick="return confirm('Are you sure! You want to delete this user?')"
                                                        >
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>

                                                    <a
                                                        href="{{ route('admin.users.show', $user->id) }}"
                                                        class="btn btn-sm btn-primary"
                                                        style="margin-top: .3rem"
                                                    >
                                                        <i class="fa fa-eye"></i>
                                                    </a>
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
                                                    style="width: 290px;"
                                                >#</th>
                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="Browser: activate to sort column ascending"
                                                    style="width: 361px;"
                                                >First Name</th>
                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 334px;"
                                                >Last Name</th>
                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending"
                                                    style="width: 252px;"
                                                >Email</th>
                                                <th
                                                    class="sorting"
                                                    tabindex="0"
                                                    aria-controls="example1"
                                                    rowspan="1"
                                                    colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending"
                                                    style="width: 190px;"
                                                >Phone</th>
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