
<?php $__env->startSection('breadcrumb'); ?>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <li class="breadcrumb-item active">
                <a href="<?php echo e(route('deployAgentGroups')); ?>"><?php echo e(__('Form Agent Groups')); ?></a>
            </li>
            </li>
            
        </ol>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('statistic_content'); ?>
    <?php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    ?>
    <form action="<?php echo e(route('deployAgentGroups')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="container bg-white rounded p-4">
            <div>
                <h3 class="my-2 text-bold create_staff_form"> <?php echo e(__('Agent Grouping Form')); ?></h3>
                <hr class="create_staff_form">
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h6 class="create_staff_form text-bold"><?php echo e(__('Select Agent')); ?></h6>
                    <div class="p-4" style="min-width:1000px">
                        <select class=" form-select form-select-lg mb-3 available_agents" required name="agents_id[]"
                            multiple=" true">
                            <?php $__currentLoopData = $staffObject->availableAgents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($locale == 'en'): ?>
                                    <option value=<?php echo e($agent->id); ?>>
                                        <?php echo e(Str::title($agent->name . ' ' . $agent->surname) .' (' .Str::title($agent->department->title) .' Department)'); ?>

                                    </option>
                                <?php else: ?>
                                    <option value=<?php echo e($agent->id); ?>>
                                        <?php echo e(Str::title($agent->name . ' ' . $agent->surname) .' (' .Str::title($agent->department->tr) .' Departmanı)'); ?>

                                    </option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <div class="float-right">
                            <button id="add_staff" class="form-buttons p-2 mt-5"><i class="fas fa-plus-square"></i>
                                <?php echo e(__('Deploy Group')); ?></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('sweetjs'); ?>
    <script>
        $(document).ready(function() {
            $(".available_agents").select2({
                theme: 'classic',
            })

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/role_operations/agent_operations/deployAgentGroups.blade.php ENDPATH**/ ?>