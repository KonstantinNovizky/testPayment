@extends('admin.layouts.admin2')
@section('title')
Users Detail
@endsection

@section('main')


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Start of main row conataning dates poertion -->
    <div
        class="row bg-primary my-2"
        id="btn-row"
        style="height:50px;"
    >
        <h5 style="color: black;margin:11px;">User Details</h5>
    </div>

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

    <!-- table section start here -->
    <div class="row">
        <table class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th
                        scope="col"
                        class="table-head-setting"
                        style="font-size: 1rem !important"
                    >#</th>
                    <th
                        scope="col"
                        class="table-head-setting"
                        style="font-size: 1rem !important"
                    >First Name
                    </th>
                    <th
                        scope="col"
                        class="table-head-setting"
                        style="font-size: 1rem !important"
                    >Last Name
                    </th>
                    <th
                        scope="col"
                        class="table-head-setting"
                        style="font-size: 1rem !important"
                    >Email</th>
                    <th
                        scope="col"
                        class="table-head-setting"
                        style="font-size: 1rem !important"
                    >Phone</th>
                    {{-- <th scope="col" class="table-head-setting">Type of
                                        Subscription</th>
                                    <th scope="col" class="table-head-setting">Expired</th>
                                    <th scope="col" class="table-head-setting">Telegram ID</th>
                                    <th scope="col" class="table-head-setting">Twitter Account</th>
                                    --}}
                    <th
                        scope="col"
                        class="table-head-setting"
                        style="font-size: 1rem !important"
                    >
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        <form
                            action="{{ route('admin.users.update', $user->id) }}"
                            method="POST"
                            class="d-inline"
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
                            >
                                @if ($user->status)
                                <span>
                                    <i class="fa fa-th-list mr-1"></i>
                                    Deactivate
                                </span>
                                @else
                                <span>
                                    <i class="fa fa-th-list mr-1"></i>
                                    Activate
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
                                class="btn btn-sm btn-danger my-1">Delete</button>
                        </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection