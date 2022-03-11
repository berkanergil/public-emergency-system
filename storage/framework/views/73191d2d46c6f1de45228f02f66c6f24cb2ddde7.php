

<?php
use App\Models\Message;

?>
<?php $__env->startSection('statistic_content'); ?>
    <div class="card  p-5 shadow p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h2 class="create_staff_form text-bold"><?php echo e(__('All Messages')); ?></h2>
            <hr class="create_staff_form">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="messages" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-light">
                        <th><?php echo e(__('ID')); ?></th>
                        <th><?php echo e(__('Title')); ?></th>
                        <th><?php echo e(__('Description')); ?></th>
                        <th><?php echo e(__('Date & Time')); ?></th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    <?php $__currentLoopData = $messageObject->messages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><a target="_blank" href="<?php echo e(route('message', $message->id)); ?>"><?php echo e($message->id); ?></a>
                            </td>
                            <td><?php echo e($message->title); ?></td>
                            <td><?php echo e($message->message); ?></td>
                            <td><?php echo e($message->created_at); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/system_operations/messages.blade.php ENDPATH**/ ?>