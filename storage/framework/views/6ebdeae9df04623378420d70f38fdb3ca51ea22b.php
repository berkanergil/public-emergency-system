
<?php $__env->startSection('breadcrumb'); ?>
    <a href="">Agent Group</a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('statistic_content'); ?>
    <?php
    use App\Models\Staff;
    ?>
    <div class="container-fluid">
        <div class="row card-info card-outline pt-3">
            <div class="row">
                <div class="col-md-6">

                    <h3 class="text-bold mb-3"><?php echo e(__('Agent Group')); ?>: <span
                            class="text-danger"><?php echo e($group[0]->group_id); ?></span>
                    </h3>
                </div>
                <div class="col-md-6">
                    <button class="btn form-buttons3 btn-md p-2  float-right mb-5"><i class="fas fa-edit"></i>
                        <?php echo e(__('Edit Agent Group')); ?></button>

                </div>

            </div>
            <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $agent = Staff::find($row->staff_id);
                    $modal_trigger = 'agent' . $agent?->id;
                ?>
                <?php if(isset($agent)): ?>
                    <div class="col-md-4">
                        <div class="card card-primary card-outline shadow  bg-white rounded">
                            <div class="card-body box-profile">

                                <h3 class="profile-username text-center text-danger text-bold">
                                    <?php echo e(Str::title($agent->department->title) . ' Department'); ?></h3>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b><?php echo e(__('Name Surname')); ?>:</b> <a
                                            class="float-right"><?php echo e(Str::title($agent->name . ' ' . $agent->surname)); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b><?php echo e(__('Phone Number')); ?>:</b> <a
                                            class="float-right"><?php echo e($agent->msisdn); ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b><?php echo e(__('Email')); ?>:</b> <a class="float-right"><?php echo e($agent->email); ?></a>
                                    </li>
                                </ul>

                                <button type="button" data-toggle="modal" data-target="#<?php echo e($modal_trigger); ?>" href="#"
                                    class="btn btn-info btn-block"><b><?php echo e(__('Agent Information')); ?></b></button>
                            </div>
                            <!-- /.card-body -->
                            <div class="modal fade" id="<?php echo e($modal_trigger); ?>" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content border border-dark">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center text-bold text-dark"
                                                id="exampleModalLongTitle">
                                                <i class="fas fa-id-badge mr-2"></i><?php echo e(__('Agent Details')); ?>

                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body box-profile">
                                            <h3 class="profile-username text-center text-primary">
                                                <?php echo e(Str::title($agent->department->title) . ' Department'); ?></h3>

                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item border-0">
                                                    <b><?php echo e(__('Agent Group ID')); ?>:</b> <a class="float-right"></a>
                                                </li>
                                                <li class="list-group-item border-0">
                                                    <b><?php echo e(__('Agent ID')); ?>:</b> <a
                                                        class="float-right"><?php echo e($agent->id); ?></a>
                                                </li>
                                                <li class="list-group-item border-0">
                                                    <b><?php echo e(__('Name Surname')); ?>:</b> <a
                                                        class="float-right"><?php echo e(Str::title($agent->name . ' ' . $agent->surname)); ?>

                                                    </a>
                                                </li>
                                                <li class="list-group-item border-0">
                                                    <b><?php echo e(__('Phone Number')); ?>:</b> <a
                                                        class="float-right"><?php echo e($agent->msisdn); ?></a>
                                                </li>
                                                <li class="list-group-item border-0">
                                                    <b><?php echo e(__('Email')); ?>:</b> <a
                                                        class="float-right"><?php echo e($agent->msisdn); ?></a>
                                                </li>
                                                <li class="list-group-item border-0">
                                                    <b><?php echo e(__('Device ID')); ?>:</b> <a
                                                        class="float-right"><?php echo e($agent->device_id); ?></a>
                                                </li>
                                                <li class="list-group-item border-0">
                                                    <b><?php echo e(__('Device Token')); ?>:</b> <a
                                                        class="float-right"><?php echo e($agent->device_token); ?></a>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?php echo e(route('agent', $agent)); ?>" class="btn btn-dark btn-block"><i
                                                    class="fas fa-user mr-2"></i><?php echo e(__('Visit Profile')); ?></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/role_operations/agent_operations/agentGroup.blade.php ENDPATH**/ ?>