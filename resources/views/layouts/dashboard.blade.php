<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/favicon-16x16.png') }}">
    <link href="{{ url('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css') }}"
        rel="stylesheet" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <!--Datatables-->
    <link rel="stylesheet"
        href="{{ url('https://adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('https://adminlte.io/themes/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('https://adminlte.io/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/authority_global.css') }}">



    <link rel="stylesheet" href="{{ asset('sweetalert2.min.css') }}">
    @yield('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script>
        (function(w, d) {
            ! function(a, e, t, r, z) {
                a.zarazData = a.zarazData || {}, a.zarazData.executed = [], a.zarazData.tracks = [], a.zaraz = {
                    deferred: []
                };
                var s = e.getElementsByTagName("title")[0];
                s && (a.zarazData.t = e.getElementsByTagName("title")[0].text), a.zarazData.w = a.screen.width, a
                    .zarazData.h = a.screen.height, a.zarazData.j = a.innerHeight, a.zarazData.e = a.innerWidth, a
                    .zarazData.l = a.location.href, a.zarazData.r = e.referrer, a.zarazData.k = a.screen.colorDepth, a
                    .zarazData.n = e.characterSet, a.zarazData.o = (new Date).getTimezoneOffset(), a.dataLayer = a
                    .dataLayer || [], a.zaraz.track = (e, t) => {
                        for (key in a.zarazData.tracks.push(e), t) a.zarazData["z_" + key] = t[key]
                    }, a.zaraz._preSet = [], a.zaraz.set = (e, t, r) => {
                        a.zarazData["z_" + e] = t, a.zaraz._preSet.push([e, t, r])
                    }, a.dataLayer.push({
                        "zaraz.start": (new Date).getTime()
                    }), a.addEventListener("DOMContentLoaded", (() => {
                        var t = e.getElementsByTagName(r)[0],
                            z = e.createElement(r);
                        z.defer = !0, z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(
                            a.zarazData))), t.parentNode.insertBefore(z, t)
                    }))
            }(w, d, 0, "script");
        })(window, document);
    </script>
    <title>EmergenCyp | Dashboard</title>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    @php
        use App\Models\Staff;
        $staff = Staff::find(Auth::id());
        $role = Staff::find(Auth::id())->staff_role_id;
        $name = Staff::find(Auth::id())->name;
        $surname = Staff::find(Auth::id())->surname;
        
    @endphp

    <div id="app">
        <div class="wrapper">
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset('images/emergencyp.png') }}" alt="EmergenCyp Logo"
                    height="160" width="450">
            </div>

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <!-- Right navbar links -->
                <ul class="navbar-nav ">
                    <li>
                        <a class="nav-link" data-widget="pushmenu" href="#sidebar" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">

                        <a class="nav-link btn-group dropwdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" href=""><i class="fa-solid fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="list-group">
                                <li class="list-group-item border-top-0">
                                    <button class="dropdown-item" type="button">
                                        <h6><i class="far fa-bell"></i> +1 Report </h6>
                                    </button>
                                </li>
                                <li class="list-group-item">
                                    <button class="dropdown-item" type="button">
                                        <h6><i class="far fa-bell"></i>+1 Report </h6>
                                    </button>
                                </li>
                                <li class="list-group-item border-bottom-0">
                                    <button class="dropdown-item" type="button">
                                        <h6><i class="far fa-bell"></i> +1 Report </h6>
                                    </button>
                                </li>
                                <li class="text-center">
                                    <a href="{{ route('chatPage') }}" class="dropdown-item button1">
                                        <i class="far fa-paper-plane"></i> See All
                                    </a>
                                </li>
                            </ul>


                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-group dropwdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" href=""><i class="fas fa-inbox"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="list-group">
                                <li class="list-group-item border-top-0">
                                    <button class="dropdown-item" type="button">
                                        <h6><i class="far fa-envelope"></i> Tolgahan Dayanıklı </h6>
                                    </button>
                                </li>
                                <li class="list-group-item">
                                    <button class="dropdown-item" type="button">
                                        <h6><i class="far fa-envelope"></i> Tolgahan Dayanıklı </h6>
                                    </button>
                                </li>
                                <li class="list-group-item border-bottom-0">
                                    <button class="dropdown-item" type="button">
                                        <h6><i class="far fa-envelope"></i> Tolgahan Dayanıklı </h6>
                                    </button>
                                </li>
                                <li class="text-center">
                                    <a href="{{ route('chatPage') }}" class="dropdown-item button1">
                                        <i class="far fa-paper-plane"></i> See All
                                    </a>
                                </li>
                            </ul>


                        </div>
                    </li>
                    <li class="nav-item">
                        <span class="text-şef" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                            data-bs-content="Disabled popover">
                            <a class="nav-link" href="{{ route('logout') }}"><i
                                    class="fas fa-sign-out-alt"></i></a>
                        </span>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside id="sidebar" class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ route('statistics') }}" class="brand-link">
                    <img src="{{ asset('images/emergencyp-white.png') }}" alt="EmergenCYP Logo"
                        class="brand-image img-circle">
                    <span class=" brand-text font-weight-light">
                        <p style="font-size: 15px;"> EmergenCyp</p>
                    </span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex text-center justify-content-center align-items-center">
                        <div class="info">
                            {{-- <a href="#" class="d-block">{{ Auth::user()->name }}</a> --}}
                            <a href="{{ route('profile', $staff) }}" class="d-block"><i
                                    class="fas fa-user-circle"></i>
                                {{ Str::title($name . ' ' . $surname) }}</a>
                        </div>
                    </div>

                    <!-- SidebarSearch Form -->
                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                            <li class="nav-header"> <strong> STATISTICS & INSIGHTS</strong></li>

                            <li class="nav-item menu-open">
                                <a href="{{ route('statistics') }}" class=" nav-link active">
                                    <i class="ml-1 fas fa-chart-line"></i>
                                    <p class="ml-1">
                                        Statistics & Insights
                                    </p>
                                </a>

                            </li>
                            <li class="nav-header"> <strong> EVENT OPERATIONS</strong></li>
                            <li class="nav-item">
                                <a href="{{ route('newReports', ['id' => $staff->id]) }}" class="nav-link">
                                    <i class="ml-1 fas fa-search-location"></i>
                                    <p class="ml-1">
                                        New Reports
                                        <span class="right badge badge-danger ml-1">Live Map</span>
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="ml-1 fas fa-folder-open"></i>
                                    <p class="ml-1">
                                        Report Archive
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('currentReports') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Current Reports</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('pastReports') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Past Reports</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-header"><strong>USER OPERATIONS</strong></li>
                            @if ($role == '3')
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="ml-1 fas fa-user-tie"></i>
                                        <p class="ml-2">
                                            Authorities
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('createAuthority') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Create Authorities </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('authorities') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>All Authorites</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="ml-1 fas fa-user-tie"></i>
                                    <p class="ml-2">
                                        Agents
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('deployAgentGroups') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Create Agent Groups</p>
                                        </a>
                                    </li>
                                    @if ($role == '3')
                                        <li class="nav-item">
                                            <a href="{{ route('createAgents') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Create Agents</p>
                                            </a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <a href="{{ route('agentGroups') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Agent Groups</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('agents') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Agents</p>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="ml-1 fas fa-user"></i>
                                    <p class="ml-2">
                                        Users
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('users') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Users</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-header"><strong>SYSTEM OPERATIONS</strong></li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="ml-1 fas fa-envelope"></i>
                                    <p class="ml-2">
                                        SMS Messages
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('createMessages') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Create SMS Messages</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('messages') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>See All SMS Messages</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="ml-1 fas fa-bell"></i>
                                    <p class="ml-2">
                                        Notifications
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('createNotifications') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Create Notifications</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('notifications') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>See All Notifications</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="ml-1 fas fa-database"></i>
                                    <p class="ml-2">
                                        Databases
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Modify Databases</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Archive Databases</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>



            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                            </div><!-- /.col -->
                            <!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        @yield('statistic_content')

                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2022 <a href="{{ route('statistics') }}">EmergenCYP</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0
                </div>
            </footer>
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="{{ url('https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://adminlte.io/themes/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script
        src="{{ url('https://adminlte.io/themes/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script
        src="{{ url('https://adminlte.io/themes/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}">
    </script>
    <script src="{{ url('https://adminlte.io/themes/v3/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}">
    </script>
    <script src="{{ url('https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}">
    </script>
    <script src="{{ url('https://adminlte.io/themes/v3/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('https://adminlte.io/themes/v3/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('https://adminlte.io/themes/v3/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.colVis.min.js') }}">
    </script>
    {{-- <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/datepicker/daterangepicker.js') }}"></script> --}}
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "dom": 'Bfrtip',
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('reports.data') }}",
                "columnDefs": [
                    {
                        targets: [0, 1, 2, 3, 4 ,5, 6]
                    },
                    { 
                        "data": "id",
                        targets: [0], 
                        render: function(data, type) {
                            if (type === 'display') {
                                return '<a target="_blank" href="report/' + data + '">' + data + '</a>';
                            }
                            return data;
                        }
                    },
                    { "data": "type", targets: [1] },
                    { "data": "user", targets: [2] },
                    { "data": "staff", targets: [3] },
                    { 
                        "data": "statusid",
                        targets: [4],
                        render: function ( data, type ) {
                            let status = "Not Handled";
                            if (type === 'display') {
                                let className = "bg-danger";
                                if(data === 2){
                                    className = "bg-warning";
                                    status = "Being Handled";
                                }
                                return status;
                            }
                            return status;
                        }
                    },
                    { 
                        "data": "location",
                        targets: [5],
                        render: function(data, type) {
                            let loc = data.lat.substr(0, 7) + ' - ' + data.lon.substr(0, 7);
                            if (type === 'display') {
                                return '<a target="_blank" href="https://www.google.com/maps/search/' + data.lat + ',' + data.lon + '">' + loc + '</a>';
                            }
                            return loc;
                        }
                    },
                    { "data": "date", targets: [6] },
                ],
                "rowCallback": function(row, data, index) {
                    if (data["statusid"] === 3) {
                        $("td:eq(4)", row).addClass("bg-danger");
                    }
                    else if (data["statusid"] === 2) {
                        $("td:eq(4)", row).addClass("bg-warning");
                    }
                },
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1 .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script src="{{ url('https://kit.fontawesome.com/3a82b90854.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/password_generator.js') }}"></script>
    <script src="{{ url('//cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>

    <script src="{{ asset('sweetalert2.min.js') }}"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js') }}"></script>
    <script
        src="{{ url('https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=') }}"
        crossorigin="anonymous"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
</body>

@yield('sweetjs')

</html>
