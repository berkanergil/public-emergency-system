
<?php $__env->startSection('breadcrumb'); ?>
    <a>Edit Report</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('statistic_content'); ?>
    <div class="row gutters d-flex justify-content-center align-items-center">
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card p-5 shadow p-3 mb-5 bg-white rounded">
                <div class="card-title mt-3">
                    <h3 class="create_staff_form text-bold"><?php echo e(__('Edit Emergency Report')); ?>: <?php echo e($event->id); ?></h3>
                    <hr class="create_staff_form">
                </div>
                <div class="card-body">
                    <form action=<?php echo e(route('update_report', $event->id)); ?> method="post">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName"> <?php echo e(__('Reporter First Name')); ?></label>
                                    <input style="font-size:16px;  type=" text" class="form-control" id="description"
                                        name="description"
                                        value=<?php if(isset($event->user)): ?> <?php echo e(Str::title($event->user->name . ' ' . $event->user->surname)); ?>

                                                    <?php else: ?><?php echo e(Str::title($event->staff->name)); ?> <?php endif; ?>>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName"> <?php echo e(__('Reporter Last Name')); ?></label>
                                    <input style="font-size:16px;  type=" text" class="form-control" id="description"
                                        name="description"
                                        value=<?php if(isset($event->user)): ?> <?php echo e(Str::title($event->user->surname)); ?>

                                                    <?php else: ?><?php echo e(Str::title($event->staff->surname)); ?> <?php endif; ?>>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="dateTime"><?php echo e(__('Report Date & Time')); ?></label>
                                    <input style="font-size:16px;" type="date" class="form-control" id="dateTime"
                                        name="created_at" value=<?php echo e($event->created_at); ?>>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName"> <?php echo e(__('Emergency Type')); ?></label>
                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                        name="event_type_id">
                                        <option value="" selected>-</option>
                                        <?php $__currentLoopData = $eventTypeObject->eventTypes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($eventType->id); ?>

                                                <?php echo e($event->event_type_id == $eventType->id ? 'selected' : ''); ?>>
                                                <?php echo e(Str::title($eventType->title)); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName"><?php echo e(__('Agent Group Deployed')); ?></label>
                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                        name="group_id">
                                        <option value="" selected>-</option>
                                        <?php $__currentLoopData = $groupObject->groups(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($group->group_id); ?>

                                                <?php echo e($event->groupEvent?->group_id == $group->group_id ? 'selected' : ''); ?>>
                                                Agent Group
                                                <?php echo e($group->group_id); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="description"><?php echo e(__('Event Description')); ?></label>
                                    <textarea style="font-size:16px;" type="text" class="form-control" id="description"
                                        name="description" rows="5"><?php echo e($event->description); ?></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                            <button type="button" id="delete" class="form-buttons3"> <i
                                    class="fas fa-trash mr-1"></i><?php echo e(__('Delete')); ?></button>
                            <button type="submit" id="save" class="p-2 form-buttons">
                                <i class="far fa-edit mr-1"></i><?php echo e(__('Update')); ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="_method" value="PUT">
            <?php echo csrf_field(); ?>
            </form>

        </div>
    </div>
    </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sweetjs'); ?>
    <script>
        let _token = $('meta[name="csrf-token"]').attr('content');
        var url = "http://127.0.0.1:8000/current_archives"
        var id = <?php echo e($event->id); ?>;
        var button = $("#delete").on("click", function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo e(route('delete_report', $event->id)); ?>",
                        type: "POST",
                        data: {
                            id: id,
                            _method: "DELETE",
                            _token: _token
                        },
                        success: function() {
                            swal.fire("Done!", "It was succesfully deleted!", "success");

                            $(location).attr('href', url);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal.fire("Error deleting!", "Please try again", "error");
                        }
                    });
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/report_operations/edit_report.blade.php ENDPATH**/ ?>