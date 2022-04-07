
<?php $__env->startSection('breadcrumb'); ?>
    <a href="<?php echo e(route('pastReports')); ?>">
        Past Reports</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('statistic_content'); ?>
    <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>
    <div class="card p-5 shadow p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h2 class="create_staff_form text-bold"><?php echo e(__('Past Reports')); ?></h2>
            <hr class="create_staff_form">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="pastReports" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-info">
                        <th><?php echo e(__('ID')); ?></th>
                        <th><?php echo e(__('Emergency Type')); ?></th>
                        <th><?php echo e(__('User Name')); ?></th>
                        <th><?php echo e(__('Staff Name')); ?></th>
                        <th><?php echo e(__('Event Status')); ?></th>
                        <th><?php echo e(__('Location')); ?></th>
                        <th><?php echo e(__('Date & Time')); ?></th>

                    </tr>
                </thead>
                <tbody class="table-light">
                    <?php $__currentLoopData = $eventObject->pastEvents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><a target="_blank" href="<?php echo e(route('report', $event->id)); ?>"><?php echo e($event->id); ?></a>
                            </td>
                            <?php if($locale == 'en'): ?>
                                <td><?php echo e(Str::title($event->eventType->title)); ?></td>
                            <?php elseif($locale == 'tr'): ?>
                                <td><?php echo e(Str::title($event->eventType->tr)); ?></td>
                            <?php endif; ?>
                            <td>
                                <?php if(isset($event->user)): ?>
                                    <?php echo e(Str::title($event->user->name . ' ' . $event->user->surname)); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if(isset($event->staff)): ?>
                                    <?php echo e(Str::title($event->staff->name . ' ' . $event->staff->surname)); ?>

                                <?php endif; ?>
                            </td>
                            <?php if($locale == 'en'): ?>
                                <td class=<?php echo e($event->event_status_id == 1 ? 'bg-success' : 'bg-danger'); ?>>
                                    <?php if($event->event_status_id): ?>
                                        Handled
                                    <?php endif; ?>
                                </td>
                            <?php elseif($locale == 'tr'): ?>
                                <td class=<?php echo e($event->event_status_id == 1 ? 'bg-success' : 'bg-danger'); ?>>
                                    <?php if($event->event_status_id): ?>
                                        Müdahle Edildi
                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>

                            <td><a target="_blank"
                                    href="https://www.google.com/maps/search/<?php echo e($event->lat . ',' . $event->lon); ?>"><?php echo e(substr($event->lat, 0, 7) . ' - ' . substr($event->lon, 0, 7)); ?></a>
                            </td>
                            <td><?php echo e($event->created_at); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/report_operations/pastReports.blade.php ENDPATH**/ ?>