@include('admin.body.styles')

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('admin.body.header')
        <!-- Header End  -->
        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.body.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('page-content')
            <!-- End Page-content -->

            @include('admin.body.footer')
            <!-- End Footer here  -->

        </div>
        <!-- end main content-->

   @include('admin.body.script')