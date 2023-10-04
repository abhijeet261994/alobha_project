<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Alobha') }}</title>
    <link rel="shortcut icon" href="/assets/images/logo-sm.png">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
    <!-- DataTables -->
    <link href="/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <!-- Responsive datatable examples -->
    <link href="/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    
    <!-- jQuery  -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/detect.js"></script>
    <script src="/assets/js/fastclick.js"></script>
    <script src="/assets/js/jquery.slimscroll.js"></script>
    <script src="/assets/js/jquery.blockUI.js"></script>
    <script src="/assets/js/waves.js"></script>
    <!-- ends -->
    
</head>
<body>
<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">
            <div class="logo">
                <a href="/" class="logo">
                    <img src="/assets/images/logo-sm.png" alt="" height="32" class="logo-small">
                </a>
            </div>
            <div class="menu-extras topbar-custom">
                <ul class="list-inline float-right mb-0">
                {{-- <li class="list-inline-item hover-links"><a class="nav-link waves-effect color" href="#">Help Desk</a> |</li>
                <li class="list-inline-item hover-links">
                <a class="nav-link waves-effect color" href="#">Emergency Services</a> |</li>
                <li class="list-inline-item hover-links"><a class="nav-link waves-effect color" href="#">Contact Us </a></li>
                <li class="list-inline-item hover-links"><i class="text-primary font-14 fa fa-phone" aria-hidden="true"></i>
                <span><strong>+1 222 333 4444</strong></span></li> --}}
                <!-- User-->
                    <li class="list-inline-item dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown"
                           href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                            
                        </div>

                    </li>
                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                </ul>
            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <!-- MENU Start -->
    <div class="navbar-custom active">
        <div class="container-fluid">
            <div id="navigation" class="active">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">

                    <li class="has-submenu">
                        <a href="/"><i class="dripicons-meter"></i>Home</a>
                    </li>
                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>

<!-- body start -->
<div class="wrapper">
    <div class="container-fluid">
        <!-- page title -->
        <!-- <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">@yield('pagetitle')</h4>
                </div>
            </div>
        </div> -->
        <!-- page title ends -->
        @yield('content')
    </div>
</div>
<!-- body ends -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                © {{date('Y')}} <span class="d-none d-sm-inline-block"></span>
            </div>
        </div>
    </div>
</footer>

<script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Required datatable js -->
<!-- Buttons examples -->
<script src="/assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables/jszip.min.js"></script>
<script src="/assets/plugins/datatables/pdfmake.min.js"></script>
<script src="/assets/plugins/datatables/vfs_fonts.js"></script>
<script src="/assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="/assets/plugins/datatables/buttons.print.min.js"></script>
<script src="/assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="/assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<!-- Datatable init js -->
<script src="/assets/pages/datatables.init.js"></script>
<!-- Bootstrap inputmask js -->
<script src="/assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<!-- App js -->
<script src="/assets/js/app.js"></script>
@yield('jsblock')
</body>
</html>
