

<?php
use App\Models\Notification;
?>
<?php $__env->startSection('statistic_content'); ?>
    <div class="card  p-5 shadow p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h2 class="create_staff_form text-bold">All Notifications</h2>
            <hr class="create_staff_form">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="notifications" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-success">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    <?php $__currentLoopData = $notificationObject->notifications(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><a href=""><?php echo e($notification->id); ?></a></td>
                            <td><?php echo e($notification->title); ?></td>
                            <td><?php echo e($notification->notification); ?></td>
                            <td><?php echo e($notification->created_at); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/system_operations/notifications.blade.php ENDPATH**/ ?>