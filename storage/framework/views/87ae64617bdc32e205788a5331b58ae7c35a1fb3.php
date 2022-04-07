

<?php $__env->startSection('statistic_content'); ?>
    <div class="container-fluid ">
        <div class="row gutters d-flex justify-content-center align-items-center">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card p-5 shadow p-3 mb-5 bg-white rounded">
                    <div class="card-title mt-3">
                        <h3 class="text-bold create_staff_form"><?php echo e(__('Create Notification')); ?></h3>
                        <hr class="create_staff_form">
                    </div>
                    <div class="card-body">
                        <form class="validatedForm" action="" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="title"><i class="far fa-lightbulb"></i>
                                            <?php echo e(__('Notification Title')); ?></label>
                                        <input type="text" class="form-control" id="title" placeholder="Enter Title"
                                            name="title">
                                    </div>
                                </div>


                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="notification"><i class="far fa-bell"></i>
                                            <?php echo e(__('Notification Text')); ?></label>
                                        <textarea type="number" class="form-control" id="notification" name="notification" rows="5"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="submit" class="form-buttons btn btn-success"><i
                                                class="far fa-bell"></i>
                                            <?php echo e(__('Create')); ?></button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/system_operations/notifications/createNotifications.blade.php ENDPATH**/ ?>