
<?php $__env->startSection('breadcrumb'); ?>
    <a href="<?php echo e(route('agents')); ?>">All Agents</a>
<?php $__env->stopSection(); ?>
<?php
use Illuminate\Support\Facades\App;

$locale = App::currentLocale();
?>
<?php $__env->startSection('statistic_content'); ?>
    <div class="card  p-5 shadow p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h2 class="create_staff_form text-bold"><?php echo e(__('All Agents')); ?></h2>
            <hr class="create_staff_form">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="agents" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-primary">
                        <th class="create_staff_form"><?php echo e(__('ID')); ?></th>
                        <th class="create_staff_form"><?php echo e(__('Agent Department')); ?></th>
                        <th class="create_staff_form"><?php echo e(__('Name Surname')); ?></th>
                        <th class="create_staff_form"><?php echo e(__('Email')); ?></th>
                        <th class="create_staff_form"><?php echo e(__('Phone Number')); ?></th>
                        <th class="create_staff_form"><?php echo e(__('Date & Time')); ?></th>

                    </tr>
                </thead>
                <tbody class="table-light">

                    <?php $__currentLoopData = $staffObject->agents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $authority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><a target="_blank" href="<?php echo e(route('agent', $authority->id)); ?>"><?php echo e($authority->id); ?></a>
                            </td>
                            <td>
                                <?php if($locale == 'en'): ?>
                                    <?php echo e(Str::title($authority->department?->title)); ?> Department
                                <?php else: ?>
                                    <?php echo e(Str::title($authority->department?->tr)); ?> Departmanı
                                <?php endif; ?>
                            </td>
                            <td><?php echo e(Str::title($authority->name . ' ' . $authority->surname)); ?></td>
                            <td><?php echo e($authority->email); ?></td>
                            <td><?php echo e($authority->msisdn); ?></td>
                            <td><?php echo e($authority->created_at); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/role_operations/agent_operations/agents.blade.php ENDPATH**/ ?>