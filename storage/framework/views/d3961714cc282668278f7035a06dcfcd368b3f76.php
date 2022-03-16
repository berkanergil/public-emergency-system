
<?php $__env->startSection('breadcrumb'); ?>
    <a href="<?php echo e(route('authority', $staff)); ?>">Authority ID: <?php echo e($staff->id); ?></a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('statistic_content'); ?>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card user-card shadow p-3 mb-5  bg-white rounded">
                    <div class="card-header text-center cards">
                        <h5 class="text-weight-bold text-white"><?php echo e(__('PERSONAL INFORMATION')); ?></h5>
                    </div>
                    <div class="card-block p-4">
                        <p class="text-bold mt-3"> <span class="text-muted"> <?php echo e(__('Full Name')); ?>:</span>
                            <?php echo e(Str::title($staff->name . ' ' . $staff->surname)); ?></p>
                        <p class="text-bold"> <span class="text-muted"> <?php echo e(__('Authority ID')); ?>:</span>
                            <?php echo e($staff->id); ?>

                        </p>
                        <p class="text-bold"> <span class="text-muted"> <?php echo e(__('Email')); ?>:</span>
                            <?php echo e($staff->email); ?> </p>
                        <p class="text-bold"> <span class="text-muted"> <?php echo e(__('Phone Number')); ?>:</span>
                            <?php echo e($staff->msisdn); ?>

                        </p>
                        <ul class="list-unstyled activity-leval text-center">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                        </ul>
                        <a href="<?php echo e(route('editAuthority', ['id' => $staff->id])); ?>"
                            class="form-buttons float-right text-bold"> <i class="far fa-edit"></i>
                            <?php echo e(__('Edit User')); ?></a>


                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/role_operations/authority_operations/authority.blade.php ENDPATH**/ ?>