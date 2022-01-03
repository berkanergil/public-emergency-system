<!DOCTYPE html>
<html lang="en">
@include('layouts.authority.authority_master')

<body class="hold-transition sidebar-mini">
    @php
        use App\Models\Staff;
        $role = Staff::find(Auth::id())->staff_role_id;
    @endphp

    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href=""><i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard') }}" class="brand-link">
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
                        {{-- <a href="" class="d-block">{{ $staff->name . ' ' . $staff->surname }}</a> --}}
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
                            {{-- <a href="{{ route('newReport', ['id' => $staff->id]) }}" class="nav-link"> --}}
                            <i class="ml-1 fas fa-exclamation-triangle"></i>
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
                                    <a href="{{ route('current_archives') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Current Reports</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="past_archives" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Past Reports</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-header"><strong>USER OPERATIONS</strong></li>
                        @if ($role == '3')
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="ml-1 fas fa-user-tie"></i>
                                    <p class="ml-2">
                                        Authorities
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('all_authorities') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Authorites</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('create_authorities') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Create Authorities </p>
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
                                    <a href="{{ route('all_agents') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Agents</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('agent_groups') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Agent Groups</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('form_agent_groups') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form Agent Groups</p>
                                    </a>
                                </li>
                                @if ($role == '3')
                                    <li class="nav-item">
                                        <a href="{{ route('create_agents') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Create Agents</p>
                                        </a>
                                    </li>
                                @endif



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
                                    <a href="{{ route('all_users') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Users</p>
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
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    @yield('breadcrumb')
                                </li>
                                <li class="breadcrumb-item active">Authority Panel</li>
                            </ol>
                        </div><!-- /.col -->
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
            <strong>Copyright &copy; 2021 <a href="">EmergenCYP</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ url('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ url('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ url('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ url('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ url('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ url('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ url('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ url('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ url('dist/js/pages/dashboard.js') }}"></script>
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
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
    <script src="{{ url('//cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script>

    <script src="{{ asset('sweetalert2.min.js') }}"></script>
    <script
        src="{{ url('https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=') }}"
        crossorigin="anonymous"></script>
</body>

@yield('sweetjs')

</html>
