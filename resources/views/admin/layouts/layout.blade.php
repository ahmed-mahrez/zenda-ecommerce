<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>

    <link rel="stylesheet" href="{{asset('assets/admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/base/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">

    <link rel="shortcut icon" href="{{asset('assets/admin/images/favicon.png')}}" />
    @stack('css')
</head>

<body>
    <div class="container-scroller">
        <!-- navbar -->
        @include('admin.layouts.partials.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
            @include('admin.layouts.partials.sidebar')
            <!-- content -->
            <div class="main-panel">
                <div class="content-wrapper">
                    {{ $slot }}
                </div>

                <!-- footer -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- JS Scripts-->

    <script src="{{asset('assets/admin/js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/base/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{asset('assets/admin/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('assets/admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/admin/js/template.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('assets/admin/js/dashboard.js')}}"></script>
    <script src="{{asset('assets/admin/js/data-table.js')}}"></script>
    <script src="{{asset('assets/admin/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/admin/js/dataTables.bootstrap4.js')}}"></script>
    <!-- End custom js for this page-->

    <script src="{{asset('assets/admin/js/jquery.cookie.js')}}" type="text/javascript"></script>

    @push('js')
    @livewireScripts
    @endpush

    @stack('js')


</body>

</html>