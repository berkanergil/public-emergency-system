 
 <?php $__env->startSection('breadcrumb'); ?>
 <?php $__env->stopSection(); ?>
 <style type="text/css">
     /* Set the size of the div element that contains the map */
     #map {
         height: 800px;
         /* The height is 400 pixels */
         width: 100%;
         /* The width is the width of the web page */
     }

 </style>

 <?php $__env->startSection('statistic_content'); ?>
     <div class="container-fluid">
         <div class="card px-5 mb-5">
             <div class="card-title">
                 <h3 class="create_staff_form pt-3"><?php echo e(__('New Reports')); ?></h4>
                     <hr class="create_staff_form">
             </div>
             <div class="card-body">
                 
                 <live-map></live-map>
             </div>
         </div>
     </div>


     <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
     <script async
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcn-lnWsUHf2TwU1EeCV9SbRrDYcI7Suc&callback=initMap&libraries=&v=weekly">
     </script>
 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('sweetjs'); ?>
     
     
     
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/report_operations/newReports.blade.php ENDPATH**/ ?>