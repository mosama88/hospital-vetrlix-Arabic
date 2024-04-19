@include('dashboard.layouts.head')

</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- ============================================================== -->
        <!-- Start navbar -->
        <!-- ============================================================== -->

        @include('dashboard.layouts.navbar')

        <!-- ============================================================== -->
        <!-- End navbar -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!-- Left Sidebar Start -->
        <!-- ============================================================== -->

        @include('dashboard.layouts.sidebar')

        <!-- ============================================================== -->
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">


                    <!-- ============================================================== -->
                    <!-- header-title Start -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- header-title End -->
                    <!-- ============================================================== -->




                    <!-- ============================================================== -->
                    <!--  Start content-->
                    <!-- ============================================================== -->
                    @yield('content')

                    <!-- ============================================================== -->
                    <!-- End scontent -->
                    <!-- ============================================================== -->



                    @include('dashboard.layouts.footer')

                </div>
                <!-- end main content-->

            </div>
            <!-- END layout-wrapper -->

            <!-- Right Sidebar -->
            <div class="right-bar">
                <div data-simplebar class="h-100">
                    <div class="rightbar-title px-3 py-4">
                        <a href="javascript:void(0);" class="right-bar-toggle float-end">
                            <i class="mdi mdi-close noti-icon"></i>
                        </a>
                        <h5 class="m-0">Settings</h5>
                    </div>

                    <!-- Settings -->
                    <hr class="mt-0" />
                    <h6 class="text-center">Choose Layouts</h6>

                    <div class="p-4">
                        <div class="mb-2">
                            <img src="{{ asset('dashboard') }}/assets/images/layouts/layout-1.jpg"
                                class="img-fluid img-thumbnail" alt="">
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch"
                                checked />
                            <label class="form-check-label" for="light-mode-switch">Light Mode</label>
                        </div>

                        <div class="mb-2">
                            <img src="{{ asset('dashboard') }}/assets/images/layouts/layout-2.jpg"
                                class="img-fluid img-thumbnail" alt="">
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch"
                                data-bsStyle="{{ asset('dashboard') }}/assets/css/bootstrap-dark.min.css"
                                data-appStyle="{{ asset('dashboard') }}/assets/css/app-dark.min.css" />
                            <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
                        </div>

                        <div class="mb-2">
                            <img src="{{ asset('dashboard') }}/assets/images/layouts/layout-3.jpg"
                                class="img-fluid img-thumbnail" alt="">
                        </div>
                        <div class="form-check form-switch mb-5">
                            <input type="checkbox" class="form-check-input theme-choice" id="rtl-mode-switch"
                                data-appStyle="{{ asset('dashboard') }}/assets/css/app-rtl.min.css" />
                            <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
                        </div>
                        <div class="d-grid">
                            <a href="https://1.envato.market/grNDB" class="btn btn-primary mt-3" target="_blank"><i
                                    class="mdi mdi-cart me-1"></i> Purchase Now</a>
                        </div>
                    </div>

                </div> <!-- end slimscroll-menu-->
            </div>
            <!-- /Right-bar -->

            <!-- Right bar overlay-->
            <div class="rightbar-overlay"></div>



            {{-- @include('dashboard.layouts.scripts') --}}
</body>

</html>
