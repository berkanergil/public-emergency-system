 
 <?php $__env->startSection('breadcrumb'); ?>
     <a href="<?php echo e(route('statistics')); ?>">Statistics</a>
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('statistic_content'); ?>
     <section class="content">
         <div class="container-fluid">
             <h3 class="mb-2 text-bold"><?php echo e(__("Today's Statistics")); ?></h3>
             <div class="row shadow p-3 mb-5 bg-white rounded">
                 <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-info">
                         <div class="inner">
                             <h3><?php echo e($eventObject->countToday()); ?></h3>

                             <p><?php echo e(__('Events Reported Today')); ?></p>
                         </div>
                         <div class="icon">
                             <i class="far fa-flag"></i>
                         </div>
                     </div>
                 </div>
                 <!-- /.col -->
                 <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-success">
                         <div class="inner">
                             <h3><?php echo e($eventObject->handledCountToday()); ?></h3>

                             <p><?php echo e(__('Events Handled Today')); ?></p>
                         </div>
                         <div class="icon">
                             <i class="far fa-check-square"></i>
                         </div>
                     </div>
                 </div>
                 <!-- /.col -->

                 <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-warning">
                         <div class="inner text-white">
                             <h3><?php echo e($eventObject->beingHandledCountToday()); ?></h3>

                             <p><?php echo e(__('Events Being Handled Now')); ?></p>
                         </div>
                         <div class="icon">
                             <i class="fas fa-spinner"></i>
                         </div>

                     </div>
                 </div>
                 <!-- /.col -->
                 <div class="col-lg-3 col-6">
                     <!-- small box -->
                     <div class="small-box bg-danger">
                         <div class="inner">
                             <h3><?php echo e($eventObject->notHandledCountToday()); ?></h3>

                             <p><?php echo e(__('Events Not Handled Today')); ?></p>
                         </div>
                         <div class="icon">
                             <i class="far fa-times-circle"></i>
                         </div>
                     </div>
                 </div>
                 <!-- /.col -->
             </div>
             <h3 class="mb-2 text-bold"><?php echo e(__('General Statistics')); ?></h3>
             <div class="row shadow p-3 mb-5 bg-white rounded">
                 <div class="col-md-4 col-sm-6 col-12">
                     <div class="info-box">
                         <span class="info-box-icon bg-info"><i class="far fa-flag"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text"><?php echo e(__('Total Events Reported')); ?></span>
                             <span class="info-box-number"><?php echo e($eventObject->count()); ?></span>
                         </div>
                         <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->
                 <div class="col-md-4 col-sm-6 col-12">
                     <div class="info-box">
                         <span class="info-box-icon bg-success"><i class="far fa-check-square"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text"><?php echo e(__('Total Events Handled')); ?></span>
                             <span class="info-box-number"><?php echo e($eventObject->handledCount()); ?></span>
                         </div>
                         <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->

                 <!-- /.col -->
                 <div class="col-md-4 col-sm-6 col-12">
                     <div class="info-box">
                         <span class="info-box-icon bg-danger"><i class="far fa-times-circle"></i></span>

                         <div class="info-box-content">
                             <span class="info-box-text"><?php echo e(__('Total Events Not Handled')); ?></span>
                             <span class="info-box-number"><?php echo e($eventObject->notHandledCount()); ?></span>
                         </div>
                         <!-- /.info-box-content -->
                     </div>
                     <!-- /.info-box -->
                 </div>
                 <!-- /.col -->
             </div>
             <h3 class="mb-2 text-bold"><?php echo e(__('Department Deployment Statistics')); ?></h3>
             <div class="row shadow p-3 mb-5 bg-white rounded">
                 <div class="col-lg-4 col-6">
                     <!-- small box -->
                     <div class="small-box bg-info">
                         <div class="inner">
                             <h3><?php echo e($staffObject->policeCount()); ?></h3>

                             <p><?php echo e(__('Number of Personels Deployed for Police Department')); ?></p>
                         </div>
                         <div class="icon">
                             <i class="fab fa-old-republic"></i>
                         </div>
                     </div>
                 </div>
                 <!-- /.col -->
                 <div class="col-lg-4 col-6">
                     <!-- small box -->
                     <div class="small-box bg-success">
                         <div class="inner">
                             <h3><?php echo e($staffObject->healthCount()); ?></h3>

                             <p><?php echo e(__('Number of Personels Deployed for Health Department')); ?></p>
                         </div>
                         <div class="icon">
                             <i class="fas fa-ambulance"></i>
                         </div>
                     </div>
                 </div>
                 <!-- /.col -->

                 <div class="col-lg-4 col-6">
                     <!-- small box -->
                     <div class="small-box bg-warning">
                         <div class="inner text-white">
                             <h3><?php echo e($staffObject->fireCount()); ?></h3>

                             <p><?php echo e(__('Number of Personels Deployed for Fire Department')); ?></p>
                         </div>
                         <div class="icon">
                             <i class="fas fa-fire-extinguisher"></i>
                         </div>
                     </div>
                 </div>
                 <!-- /.col -->

                 <!-- /.col -->
             </div>
             <h3 class="mb-2 text-bold"><?php echo e(__('Event Type Statistics')); ?></h3>

             <div class="card shadow p-3 mb-5 bg-white rounded ">
                 <div class="row  d-flex justify-content-center align-items-center">
                     <div class="col-md-4">
                         <!-- Widget: user widget style 2 -->
                         <div class="card card-widget">
                             <div class="widget-user-header bg-info d-flex justify-content-center align-items-center">
                                 <h3 class="widget-user-username p-3"><?php echo e(__('Fire')); ?></h3>
                             </div>
                             <div class="card-footer p-0">
                                 <ul class="nav flex-column">
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Total Reports')); ?> <span
                                                 class="float-right badge bg-primary"><?php echo e($eventObject->fireCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Fire Department Deployed')); ?> <span
                                                 class="float-right badge bg-info"><?php echo e($groupEventObject->fireFireCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Police Department Deployed')); ?> <span
                                                 class="float-right badge bg-success"><?php echo e($groupEventObject->firePoliceCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Health Department Deployed')); ?> <span
                                                 class="float-right badge bg-danger"><?php echo e($groupEventObject->fireHealthCount()); ?></span>
                                         </span>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <!-- Widget: user widget style 2 -->
                         <div class="card card-widget">
                             <div class="widget-user-header bg-danger d-flex justify-content-center align-items-center">
                                 <h3 class="widget-user-username p-3"><?php echo e(__('Crime')); ?></h3>
                             </div>
                             <div class="card-footer p-0">
                                 <ul class="nav flex-column">
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Total Reports')); ?> <span
                                                 class="float-right badge bg-primary"><?php echo e($eventObject->crimeCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Fire Department Deployed')); ?> <span
                                                 class="float-right badge bg-info"><?php echo e($groupEventObject->crimeFireCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Police Department Deployed')); ?> <span
                                                 class="float-right badge bg-success"><?php echo e($groupEventObject->crimePoliceCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Health Department Deployed')); ?> <span
                                                 class="float-right badge bg-danger"><?php echo e($groupEventObject->crimeHealthCount()); ?></span>
                                         </span>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <!-- Widget: user widget style 2 -->
                         <div class="card card-widget">
                             <div class="widget-user-header bg-primary d-flex justify-content-center align-items-center">
                                 <h3 class="widget-user-username p-3"><?php echo e(__('Natural Events')); ?></h3>
                             </div>
                             <div class="card-footer p-0">
                                 <ul class="nav flex-column">
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Total Reports')); ?> <span
                                                 class="float-right badge bg-primary"><?php echo e($eventObject->naturalEventCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Fire Department Deployed')); ?> <span
                                                 class="float-right badge bg-info"><?php echo e($groupEventObject->naturalEventFireCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Police Department Deployed')); ?> <span
                                                 class="float-right badge bg-success"><?php echo e($groupEventObject->naturalEventPoliceCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Health Department Deployed')); ?> <span
                                                 class="float-right badge bg-danger"><?php echo e($groupEventObject->naturalEventHealthCount()); ?></span>
                                         </span>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="row  d-flex justify-content-center align-items-center">
                     <div class="col-md-4">
                         <!-- Widget: user widget style 2 -->
                         <div class="card card-widget">
                             <div class="widget-user-header bg-warning d-flex justify-content-center align-items-center">
                                 <h3 class="widget-user-username p-3 text-white"><?php echo e(__('Traffic')); ?></h3>
                             </div>
                             <div class="card-footer p-0">
                                 <ul class="nav flex-column">
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Total Reports')); ?> <span
                                                 class="float-right badge bg-primary"><?php echo e($eventObject->trafficCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Fire Department Deployed')); ?> <span
                                                 class="float-right badge bg-info"><?php echo e($groupEventObject->trafficFireCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Police Department Deployed')); ?> <span
                                                 class="float-right badge bg-success"><?php echo e($groupEventObject->trafficPoliceCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Health Department Deployed')); ?> <span
                                                 class="float-right badge bg-danger"><?php echo e($groupEventObject->trafficHealthCount()); ?></span>
                                         </span>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <!-- Widget: user widget style 2 -->
                         <div class="card card-widget">
                             <div class="widget-user-header bg-success d-flex justify-content-center align-items-center">
                                 <h3 class="widget-user-username p-3"><?php echo e(__('Health')); ?></h3>
                             </div>
                             <div class="card-footer p-0">
                                 <ul class="nav flex-column">
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Total Reports')); ?> <span
                                                 class="float-right badge bg-primary"><?php echo e($eventObject->healthCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Fire Department Deployed')); ?> <span
                                                 class="float-right badge bg-info"><?php echo e($groupEventObject->healthFireCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Police Department Deployed')); ?> <span
                                                 class="float-right badge bg-success"><?php echo e($groupEventObject->healthPoliceCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Health Department Deployed')); ?> <span
                                                 class="float-right badge bg-danger"><?php echo e($groupEventObject->healthHealthCount()); ?></span>
                                         </span>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <!-- Widget: user widget style 2 -->
                         <div class="card card-widget">
                             <div class="widget-user-header bg-dark d-flex justify-content-center align-items-center">
                                 <h3 class="widget-user-username p-3"><?php echo e(__('Other')); ?></h3>
                             </div>
                             <div class="card-footer p-0">
                                 <ul class="nav flex-column">
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Total Reports')); ?> <span
                                                 class="float-right badge bg-primary"><?php echo e($eventObject->healthCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Fire Department Deployed')); ?> <span
                                                 class="float-right badge bg-info"><?php echo e($groupEventObject->healthFireCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Police Department Deployed')); ?> <span
                                                 class="float-right badge bg-success"><?php echo e($groupEventObject->healthPoliceCount()); ?></span>
                                         </span>
                                     </li>
                                     <li class="nav-item">
                                         <span href="#" class="nav-link">
                                             <?php echo e(__('Health Department Deployed')); ?> <span
                                                 class="float-right badge bg-danger"><?php echo e($groupEventObject->healthHealthCount()); ?></span>
                                         </span>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
     </section>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/system_operations/statistics.blade.php ENDPATH**/ ?>