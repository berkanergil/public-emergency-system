
<?php $__env->startSection('breadcrumb'); ?>
    <a>Agent Groups</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('statistic_content'); ?>
    <?php
    use App\Models\Staff;
    use App\Models\Group;
    use Illuminate\Support\Facades\App;
    use App\Models\Event;

    $locale = App::currentLocale();

    ?>
    <div class="card  p-5 shadow p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h2 class="create_staff_form text-bold"><?php echo e(__('All Agent Groups')); ?></h2>
            <hr class="create_staff_form">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="myTable" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-success">
                        <th class="create_staff_form"><?php echo e(__('Group ID')); ?></th>
                        <th class="create_staff_form"><?php echo e(__('Agent Departments')); ?></th>
                        <th class="create_staff_form"><?php echo e(__('Status')); ?></th>
                        <th class="create_staff_form"><?php echo e(__('Disband Group')); ?></th>

                    </tr>
                </thead>
                <tbody class="table-light">
                    <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $groupObject = new Group();
                            $groupMembers = $groupObject->groupMembers($group->group_id);
                            $currentEvent = $groupObject->event($group->group_id);
                            $currentEvent = Event::find($currentEvent?->id);
                            $loop->last;
                            
                        ?>
                        <tr>
                            <td><a target="_blank"
                                    href="<?php echo e(route('agentGroup', $group->group_id)); ?>"><?php echo e($group->group_id); ?></a>
                            </td>
                            <td>
                                <?php if($locale == 'en'): ?>
                                    <?php $__currentLoopData = $groupMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->last): ?>
                                            <?php echo e(Str::title($member->name . ' ' . '(' . $member->department->title)); ?>

                                            Department)
                                        <?php else: ?>
                                            <?php echo e(Str::title($member->name . ' ' . $member->surname . ' ' . '(' . $member->department->title)); ?>

                                            Department),
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <?php $__currentLoopData = $groupMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->last): ?>
                                            <?php echo e(Str::title($member->name . ' ' . '(' . $member->department->tr)); ?>

                                            Departmanı)
                                        <?php else: ?>
                                            <?php echo e(Str::title($member->name . ' ' . $member->surname . ' ' . '(' . $member->department->tr)); ?>

                                            Departmanı),
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </td>
                            <?php if($locale === 'en'): ?>
                                <?php if(!isset($currentEvent)): ?>
                                    <td id="<?php echo e($group->group_id); ?>" class=" availablity bg-success">
                                        Available</td>
                                <?php elseif($currentEvent->status->id == 1): ?>
                                    <td id="<?php echo e($group->group_id); ?>" class="availablity bg-success">
                                        Available</td>
                                <?php else: ?>
                                    <td id="<?php echo e($group->group_id); ?>" class="availablity bg-danger">
                                        Not Available</td>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if(!isset($currentEvent)): ?>
                                    <td id="<?php echo e($group->group_id); ?>" class=" availablity bg-success">
                                        Müsait</td>
                                <?php elseif($currentEvent->status->id == 1): ?>
                                    <td id="<?php echo e($group->group_id); ?>" class="availablity bg-success">
                                        Müsait</td>
                                <?php else: ?>
                                    <td id="<?php echo e($group->group_id); ?>" class="availablity bg-danger">
                                        Müsait Değil</td>
                                <?php endif; ?>
                            <?php endif; ?>


                            <td> <button type="button" class="btn btn-danger btnSelect"><i
                                        class="fas fa-user-times"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/role_operations/agent_operations/agentGroups.blade.php ENDPATH**/ ?>