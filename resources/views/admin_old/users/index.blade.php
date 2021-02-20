@extends('admin.layouts.admin2')
@section('title')
SB Admin 2 - Dashboard
@endsection
@section('main')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- Content Row -->
    <div class="row ">

        <!-- Earnings (Monthly) Card Example -->
        <div
            class="col-xl-4 col-md-6 mb-4"
            style=""
        >
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters ">
                        <div class="col mr-2">
                            <a
                                href="#"
                                class="h5 mt-2 font-weight-bold text-blue-800 d-block text-decoration-none"
                            >
                                Options Alert
                            </a>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-bell fa-2x "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a
                                href="#"
                                class="h5 mt-2 font-weight-bold text-blue-800 d-block text-decoration-none"
                            >
                                Options Flow
                            </a>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-dollar fa-2x "></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a
                                href="#"
                                class="h5 mt-2 font-weight-bold text-blue-800 d-block text-decoration-none"
                            >
                                Dark Pool
                            </a>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-user fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Second row with three card -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mt-2 font-weight-bold text-gray-800">
                                Markeet News</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-newspaper fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mt-2 font-weight-bold text-gray-800">
                                Group Discussion</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-users fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mt-2 font-weight-bold text-gray-800">
                                Trades Report<span
                                    class=""
                                    style="padding-left: 130px;"
                                ><img
                                        src="img/report.jpg"
                                        width="10%"
                                        height="10%"
                                        style="display: inline;"
                                        alt=""
                                    ></span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->
@endsection