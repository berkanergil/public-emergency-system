
<?php $__env->startSection('breadcrumb'); ?>
    <a href="<?php echo e(route('currentReports')); ?>">
        Current Reports</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('statistic_content'); ?>
    <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    Log::info($locale);

    ?>
    <div class="card p-5 shadow p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h2 class="create_staff_form text-bold"><?php echo e(__('Current Reports')); ?></h2>
            <hr class="create_staff_form">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="currentReports" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-primary">
                        <th>ID</th>
                        <th><?php echo e(__('Emergency Type')); ?></th>
                        <th><?php echo e(__('User Name')); ?></th>
                        <th><?php echo e(__('Staff Name')); ?></th>
                        <th><?php echo e(__('Event Status')); ?></th>
                        <th><?php echo e(__('Location')); ?></th>
                        <th><?php echo e(__('Date & Time')); ?></th>

                    </tr>
                </thead>
                <tbody class="table-light">
                    
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/report_operations/currentReports.blade.php ENDPATH**/ ?>