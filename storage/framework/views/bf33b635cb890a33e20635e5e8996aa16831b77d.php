

<?php
use App\Models\Staff;
use Illuminate\Support\Facades\App;

$role = Staff::find(Auth::id())->staff_role_id;
$locale = App::currentLocale();
?>

<?php $__env->startSection('breadcrumb'); ?>
    <a href="<?php echo e(route('agent', $staff)); ?>"><?php echo e(__('Agent ID')); ?>: <?php echo e($staff->id); ?> Profile</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('statistic_content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card user-card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header cards text-center">
                        <h5 class=" text-white"><?php echo e(__('PERSONAL INFORMATION')); ?></h5>
                    </div>
                    <div class="card-block p-4">
                        <p class="text-bold mt-3"> <span class="text-muted"> <?php echo e(__('Full Name')); ?>:</span>
                            <?php echo e(Str::title($staff->name . ' ' . $staff->surname)); ?></p>
                        <p class="text-bold"> <span class="text-muted"> <?php echo e(__('Agent ID')); ?>:</span>
                            <?php echo e($staff->id); ?> </p>

                        <?php if($locale == 'en'): ?>
                            <p class="text-bold"> <span class="text-muted"> <?php echo e(__('Department')); ?>:</span>
                                <?php if($staff->department_id == 1): ?>
                                    <?php echo e(__('Police Department')); ?>

                                <?php elseif($staff->department_id == 2): ?>
                                    <?php echo e(__('Health Department')); ?>

                                <?php else: ?>
                                    <?php echo e(__('Fire Department')); ?>

                                <?php endif; ?>
                            </p>
                        <?php else: ?>
                            <p class="text-bold"> <span class="text-muted"> <?php echo e(__('Department')); ?>:</span>
                                <?php if($staff->department_id == 1): ?>
                                    <?php echo e(__('Polis Departmanı')); ?>

                                <?php elseif($staff->department_id == 2): ?>
                                    <?php echo e(__('Sağlık Departmanı')); ?>

                                <?php else: ?>
                                    <?php echo e(__('İtfaiye Departmanı')); ?>

                                <?php endif; ?>
                            </p>
                        <?php endif; ?>

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
                        </ul>
                        <?php if($role == '3'): ?>
                            <a href="<?php echo e(route('editAgent', $staff->id)); ?>" class="form-buttons float-right">
                                <i class="far fa-edit"></i> <?php echo e(__('Edit User')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card user-card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header cards2 text-center">
                        <h5 class="text-white "><?php echo e(__('DEVICE INFORMATION')); ?></h5>
                    </div>
                    <div class="card-block p-4">

                        <p class="text-bold mt-3"> <span class="text-muted"> <?php echo e(__('Device Model')); ?>:</span>
                            <?php echo e($staff->device_model); ?></p>
                        <p class="text-bold mt-3"> <span class="text-muted"> <?php echo e(__('Device ID')); ?>:</span>
                            <?php echo e($staff->device_id); ?>

                        </p>
                        <p class="text-bold"> <span class="text-muted"> <?php echo e(__('Device Token')); ?>:</span>
                            <?php echo e($staff->device_token); ?> </p>
                        <ul class="list-unstyled activity-leval text-center">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                        </ul>


                    </div>
                </div>
            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/role_operations/agent_operations/agent.blade.php ENDPATH**/ ?>