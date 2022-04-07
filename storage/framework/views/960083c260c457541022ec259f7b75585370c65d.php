

<?php
use App\Models\Staff;
$role = Staff::find(Auth::id())->staff_role_id;
?>


<?php $__env->startSection('statistic_content'); ?>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card user-card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header cards text-center">
                        <h5 class=" text-white"><?php echo e(__('NOTIFICATION INFORMATION')); ?></h5>
                    </div>
                    <div class="card-block p-4">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-bold mt-3"> <span class="text-muted">
                                        <?php echo e(__('Notification Title')); ?>:</span>
                                    <?php echo e(Str::title($notification->title)); ?>

                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="text-bold"> <span class="text-muted">
                                        <?php echo e(__('Notification')); ?>:</span>
                                    <?php echo e(Str::title($notification->notification)); ?>

                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="text-bold"> <span class="text-muted">
                                        <?php echo e(__('Creation Date & Time')); ?>:</span>
                                    <?php echo e($notification->created_at); ?>

                                </p>
                            </div>
                        </div>

                        <ul class="list-unstyled activity-leval text-center">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                        </ul>
                        <a href="<?php echo e(route('editNotification', $notification->id)); ?>" class="form-buttons float-right">
                            <i class="far fa-edit"></i> <?php echo e(__('Edit')); ?></a>
                    </div>

                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/system_operations/notifications/notification.blade.php ENDPATH**/ ?>