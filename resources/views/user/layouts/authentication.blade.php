<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta
        http-equiv="X-UA-Compatible"
        content="IE=edge"
    >
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >
    <meta
        name="description"
        content=""
    >
    <meta
        name="author"
        content=""
    >

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    {{--
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> --}}

    <!-- Custom styles for this template-->
    {{--
    <link href="css/sb-admin-2.css" rel="stylesheet"> --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/app.css') }}"
    >
    <link
        rel="stylesheet"
        href="{{ asset('css/universal.css') }}"
    >
    <style>
        .no-wrap-container th,
        .no-wrap-container td
        {
            white-space: nowrap !important;
            /* background: red !important; */
        }
        .d-inline{
            display: inline !important;
        }
    </style>
</head>


<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div
            id="content-wrapper"
            class="d-flex flex-column"
        >
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav
                    class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button
                        id="sidebarToggleTop"
                        class="btn btn-link d-md-none rounded-circle mr-3"
                    >
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                    >
                        <div class="input-group">
                            <h4>Selective Trades</h4>
                        </div>
                    </form>
                </nav>
                <!-- End of Topbar -->


                <div class="container">
                    @yield('main')

                </div>
                <!-- /.container -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->


    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>