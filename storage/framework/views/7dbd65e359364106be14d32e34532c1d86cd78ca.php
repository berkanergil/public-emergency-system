<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="icon" href="<?php echo e(asset('images/favicon-16x16.png')); ?>">
    <link href="<?php echo e(url('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css')); ?>"
        rel="stylesheet" />

    <link rel="stylesheet"
        href="<?php echo e(url('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="stylesheet"
        href="<?php echo e(url('https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css')); ?>">

    <link rel="manifest" href="/site.webmanifest">
    

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')); ?>">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/jqvmap/jqvmap.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('dist/css/adminlte.min.css')); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/daterangepicker/daterangepicker.css')); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo e(asset('plugins/summernote/summernote-bs4.min.css')); ?>">
    <!--Datatables-->
    <link rel="stylesheet"
        href="<?php echo e(url('https://adminlte.io/themes/v3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(url('https://adminlte.io/themes/v3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(url('https://adminlte.io/themes/v3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/auth/authority_global.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(url('https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.css')); ?>" />


    <?php echo $__env->yieldContent('css'); ?>
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
    <?php
        use App\Models\Staff;
        $staff = Staff::find(Auth::id());
        $role = Staff::find(Auth::id())->staff_role_id;
        $name = Staff::find(Auth::id())->name;
        $surname = Staff::find(Auth::id())->surname;
        
    ?>

    <div id="app">
        <div class="wrapper">
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="<?php echo e(asset('images/emergencyp.png')); ?>" alt="EmergenCyp Logo"
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
                                    <a href="<?php echo e(route('chatPage')); ?>" class="dropdown-item button1">
                                        <i class="far fa-paper-plane"></i> <?php echo e(__('See All')); ?>

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
                                    <a href="<?php echo e(route('chatPage')); ?>" class="dropdown-item button1">
                                        <i class="far fa-paper-plane"></i> <?php echo e(__('See All')); ?>

                                    </a>
                                </li>
                            </ul>


                        </div>
                    </li>
                    <li class="nav-item">
                        <?php echo $__env->make('layouts/languageSwitcher', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </li>

                    <li class="nav-item">
                        <span class="text-şef" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                            data-bs-content="Disabled popover">
                            <a class="nav-link" href="<?php echo e(route('logout')); ?>"><i
                                    class="fas fa-sign-out-alt"></i></a>
                    </li>
                </ul>
            </nav>


            <aside id="sidebar" class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="<?php echo e(route('statistics')); ?>" class="brand-link">
                    <img src="<?php echo e(asset('images/emergencyp-white.png')); ?>" alt="EmergenCYP Logo"
                        class="brand-image img-circle">
                    <span class=" brand-text font-weight-light">
                        <p style="font-size: 15px;"> EmergenCyp</p>
                    </span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex text-center justify-content-center align-items-center">
                        <div class="info">
                            
                            <a href="<?php echo e(route('profile', $staff)); ?>" class="d-block"><i
                                    class="fas fa-user-circle"></i>
                                <?php echo e(Str::title($name . ' ' . $surname)); ?></a>
                        </div>
                    </div>
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
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-header"> <strong> <?php echo e(__('STATISTICS & INSIGHTS')); ?></strong></li>

                            <li class="nav-item menu-open">
                                <a href="<?php echo e(route('statistics')); ?>" class=" nav-link active">
                                    <i class="ml-1 fas fa-chart-line"></i>
                                    <p class="ml-1">
                                        <?php echo e(__('Statistics & Insights')); ?>

                                    </p>
                                </a>

                            </li>
                            <li class="nav-header"> <strong> <?php echo e(__('EVENT OPERATIONS')); ?></strong></li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('newReports', ['id' => $staff->id])); ?>" class="nav-link">
                                    <i class="ml-1 fas fa-search-location"></i>
                                    <p class="ml-1">
                                        <?php echo e(__('New Reports')); ?>

                                        <span class="right badge badge-danger ml-1"><?php echo e(__('Live Map')); ?></span>
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="ml-1 fas fa-folder-open"></i>
                                    <p class="ml-1">
                                        <?php echo e(__('Report Archive')); ?>

                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('currentReports')); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p><?php echo e(__('Current Reports')); ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('pastReports')); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p><?php echo e(__('Past Reports')); ?></p>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>

                            <li class="nav-header"><strong><?php echo e(__('USER OPERATIONS')); ?></strong></li>
                            <?php if($role == '3'): ?>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="ml-1 fas fa-user-tie"></i>
                                        <p class="ml-2">
                                            <?php echo e(__('Authorities')); ?>

                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('createAuthority')); ?>" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p><?php echo e(__('Create Authorities')); ?> </p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('authorities')); ?>" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p><?php echo e(__('All Authorites')); ?></p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="ml-1 fas fa-user-tie"></i>
                                    <p class="ml-2">
                                        <?php echo e(__('Agents')); ?>

                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('deployAgentGroups')); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p><?php echo e(__('Create Agent Groups')); ?></p>
                                        </a>
                                    </li>
                                    <?php if($role == '3'): ?>
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('createAgents')); ?>" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p><?php echo e(__('Create Agents')); ?></p>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('agentGroups')); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p><?php echo e(__('Agent Groups')); ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('agents')); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p><?php echo e(__('All Agents')); ?></p>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="ml-1 fas fa-user"></i>
                                    <p class="ml-2">
                                        <?php echo e(__('Users')); ?>

                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('users')); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p><?php echo e(__('All Users')); ?></p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-header"><strong><?php echo e(__('SYSTEM OPERATIONS')); ?></strong></li>


                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="ml-1 fas fa-bell"></i>
                                    <p class="ml-2">
                                        <?php echo e(__('Notifications')); ?>

                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('createNotifications')); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p><?php echo e(__('Create Notifications')); ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('notifications')); ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p><?php echo e(__('See All Notifications')); ?></p>
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
                        <?php echo $__env->yieldContent('statistic_content'); ?>

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



        </div>


        <!-- Main Footer -->
        <footer class="main-footer">
            <strong><?php echo e(__('Copyright')); ?> &copy; 2022 <a href="<?php echo e(route('statistics')); ?>">EmergenCYP</a>.</strong>
            <?php echo e(__('All rights reserved.')); ?>

            <div class="float-right d-none d-sm-inline-block">
                <b><?php echo e(__('Version')); ?></b> 1.0
            </div>
        </footer>

    </div>
    <!-- ./wrapper -->
    <script
        src="<?php echo e(url('https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=')); ?>"
        crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo e(asset('plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- ChartJS -->
    <script src="<?php echo e(asset('plugins/chart.js/Chart.min.js')); ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo e(asset('plugins/sparklines/sparkline.js')); ?>"></script>
    <!-- JQVMap -->

    <!-- daterangepicker -->
    <script src="<?php echo e(asset('plugins/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo e(asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
    <!-- Summernote -->
    <script src="<?php echo e(asset('plugins/summernote/summernote-bs4.min.js')); ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo e(asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo e(asset('dist/js/demo.js')); ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo e(asset('dist/js/pages/dashboard.js')); ?>"></script>
    <script src="<?php echo e(url('https://adminlte.io/themes/v3/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('https://adminlte.io/themes/v3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>">
    </script>
    <script
        src="<?php echo e(url('https://adminlte.io/themes/v3/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>">
    </script>
    <script
        src="<?php echo e(url('https://adminlte.io/themes/v3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>">
    </script>
    <script src="<?php echo e(url('https://adminlte.io/themes/v3/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>">
    </script>
    <script src="<?php echo e(url('https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>">
    </script>
    <script src="<?php echo e(url('https://adminlte.io/themes/v3/plugins/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(url('https://adminlte.io/themes/v3/plugins/pdfmake/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(url('https://adminlte.io/themes/v3/plugins/pdfmake/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(url('https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>">
    </script>
    <script src="<?php echo e(url('https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.print.min.js')); ?>">
    </script>
    <script src="<?php echo e(url('https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>">
    </script>
    
    <script>
        $(function() {
            $("#currentReports").DataTable({
                "dom": 'Bfrtip',
                "processing": true,
                "serverSide": true,
                "ajax": "<?php echo e(route('reports.data')); ?>",
                "columnDefs": [{
                        targets: [0, 1, 2, 3, 4, 5, 6]
                    },
                    {
                        "data": "id",
                        targets: [0],
                        render: function(data, type) {
                            if (type === 'display') {
                                return '<a target="_blank" href="report/' + data + '">' + data +
                                    '</a>';
                            }
                            return data;
                        }
                    },
                    {
                        "data": "type",
                        targets: [1]
                    },
                    {
                        "data": "user",
                        targets: [2]
                    },
                    {
                        "data": "staff",
                        targets: [3]
                    },
                    {
                        "data": "status",
                        targets: [4],
                        render: function(data, type) {
                            let status = data.locale === 'en' ? "Not Handled" : "Müdahale Edilmedi";
                            if (type === 'display') {
                                let className = "bg-danger";
                                if (data.id === 2) {
                                    className = "bg-warning";
                                    status = data.locale === 'en' ? "Being Handled" :
                                        "Müdahale Ediliyor";
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
                                return '<a target="_blank" href="https://www.google.com/maps/search/' +
                                    data.lat + ',' + data.lon + '">' + loc + '</a>';
                            }
                            return loc;
                        }
                    },
                    {
                        "data": "date",
                        targets: [6]
                    },
                ],
                "rowCallback": function(row, data, index) {
                    if (data["status"].id === 3) {
                        $("td:eq(4)", row).addClass("bg-danger");
                    } else if (data["status"].id === 2) {
                        $("td:eq(4)", row).addClass("bg-warning");
                    }
                },
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#currentReports .col-md-6:eq(0)');
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
    <!-- jQuery Knob Chart -->
    <script src="<?php echo e(asset('plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
    <script src="<?php echo e(url('https://kit.fontawesome.com/3a82b90854.js')); ?>" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/password_generator.js')); ?>"></script>
    <script src="<?php echo e(url('https://kit.fontawesome.com/3a82b90854.js')); ?>" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/password_generator.js')); ?>"></script>
    <script src="<?php echo e(url('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(url('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js')); ?>">
    </script>

    <script src="<?php echo e(asset('dist/js/adminlte.js')); ?>"></script>
    <script src="<?php echo e(url('https://cdn.jsdelivr.net/npm/sweetalert2@11')); ?>"></script>
    <script src="<?php echo e(url('https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js')); ?>">
    </script>

</body>

<?php echo $__env->yieldContent('sweetjs'); ?>

</html>
<?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>