<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" href="<?php echo e(asset('images/logo-white-sm.png')); ?>">
    <link href="<?php echo e(url('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css')); ?>"
        rel="stylesheet" />

    

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

    <link rel="stylesheet" href="<?php echo e(asset('sweetalert2.min.css')); ?>">
    <?php echo $__env->yieldContent('css'); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>EmergenCyp | Dashboard</title>

</head>

<body>
    <?php echo $__env->yieldContent('content'); ?>
</body>

<!-- jQuery -->
<script src="<?php echo e(url('plugins/jquery/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(url('plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(url('plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo e(url('plugins/chart.js/Chart.min.js')); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo e(url('plugins/sparklines/sparkline.js')); ?>"></script>
<!-- JQVMap -->
<script src="<?php echo e(url('plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(url('plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo e(url('plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(url('plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo e(url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
<!-- Summernote -->
<script src="<?php echo e(url('plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo e(url('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(url('dist/js/adminlte.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(url('dist/js/demo.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(url('dist/js/pages/dashboard.js')); ?>"></script>
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
<script src="<?php echo e(url('https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(url('https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(url('https://adminlte.io/themes/v3/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>">
</script>

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
<script src="<?php echo e(asset('js/password_generator.js')); ?>"></script>
<script src="<?php echo e(url('//cdn.jsdelivr.net/npm/sweetalert2@11')); ?>"></script>

<script src="<?php echo e(asset('sweetalert2.min.js')); ?>"></script>
<script src="<?php echo e(url('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js')); ?>"></script>
<script
src="<?php echo e(url('https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=')); ?>"
crossorigin="anonymous"></script>

<?php echo $__env->yieldContent('sweetjs'); ?>

</html>
<?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/layouts/chatboard.blade.php ENDPATH**/ ?>