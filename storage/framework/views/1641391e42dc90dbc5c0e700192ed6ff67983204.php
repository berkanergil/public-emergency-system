
<?php $__env->startSection('breadcrumb'); ?>
    <a href="<?php echo e(route('report', $event)); ?>">View Event ID: <?php echo e($event->id); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('statistic_content'); ?>
    <?php
    use Illuminate\Support\Facades\App;
    use App\Models\EventStatus;
    use App\Models\Staff;
    use App\Models\Document;
    use App\Models\Group;
    use App\Models\Event;
    use App\Models\Notes;
    use App\Models\DocumentType;

    $locale = App::currentLocale();
    $noteObject = new Notes();
    $groupObject = new Group();
    $eventObject = new Event();
    $eventStatus = EventStatus::where('id', '!=', '4')
        ->get()
        ->pluck('title', 'id');
    $eventStatusTr = EventStatus::where('id', '!=', '4')
        ->get()
        ->pluck('tr', 'id');
    $currentStatus = 'Current: ' . Str::title($event?->eventStatus?->title);
    $currentStatusTr = 'Güncel: ' . Str::title($event?->eventStatus?->tr);
    $currentStatusId = $event?->eventStatus?->id;
    $documentTypes = $groups = $event?->groupEvent?->group($event?->groupEvent?->group_id);
    $documentModalTrigger = 'document' . $event?->document?->id;
    $bgWarning = 'bg-warning';
    $bgDanger = 'bg-danger';
    $bgInfo = 'bg-info';
    $availableGroups = $groupObject->availableGroups();
    $notMergedEvents = $eventObject->notMergedEvents();
    $history = $eventObject->history($event->id);
    ?>
    <section class="content container-fluid">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    <?php echo e(__('Reported Event ID')); ?>:<?php echo e($event->id); ?>

                </h3>
            </div>
            <div class="card-body">
                <h4 class="mb-3 text-bold"><?php echo e($event->description); ?></h4>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="btn-group button-groups my-3 ">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button id="mark_event" type="button"
                                        class="btn btn-lg btn-default button1 text-bold"><i class="fas fa-highlighter"></i>
                                        <?php echo e(__('Mark Report')); ?></button>
                                    <button id="make_notes" type="button"
                                        class="btn btn-lg btn-default button2 text-bold"><i class="fas fa-sticky-note"></i>
                                        <?php echo e(__('Make Notes')); ?></button>

                                    <?php if($event->status->id == '1' || $event->status->id == '4'): ?>
                                        <button disabled id="send_sms" type="button"
                                            class="btn btn-lg btn-default button4 text-bold"><i class="fas fa-envelope"></i>
                                            <?php echo e(__('Send SMS')); ?></button>
                                        <button disabled id="send_notification" type="button"
                                            class="btn btn-lg btn-default button7 text-bold"><i class="fas fa-bell"></i>
                                            <?php echo e(__('Send Notification')); ?></button>
                                        <button disabled id="upload_evidence" type="button"
                                            class="btn btn-lg btn-default button5 text-bold"><i
                                                class="fas fa-file-upload"></i>
                                            <?php echo e(__('Upload Evidence')); ?></button>
                                        <button disabled data-target=".bd-example-modal-lg" data-toggle="modal"
                                            id="deploy_agent_group" type="button"
                                            class="btn btn-lg btn-default button6 text-bold"><i class="fas fa-users"></i>
                                            <?php echo e(__('Deploy Agent Group')); ?></button>
                                        <button disabled data-target="#mergeEventsModel" data-toggle="modal"
                                            id="merge_event" type="button"
                                            class="btn btn-lg btn-default button8 text-bold"><i class="fa-solid fa-ban"></i>
                                            <?php echo e(__('Merge Report')); ?></button>
                                    <?php else: ?>
                                        <button id="send_sms" type="button" class="btn btn-lg button4 text-bold"><i
                                                class="fas fa-envelope"></i> <?php echo e(__('Send SMS')); ?></button>
                                        <button id="send_notification" type="button"
                                            class="btn btn-lg btn-default button7 text-bold"><i class="fas fa-bell"></i>
                                            <?php echo e(__('Send Notification')); ?></button>
                                        <button id="upload_evidence" type="button"
                                            class="btn btn-lg btn-default button5 text-bold"><i
                                                class="fas fa-file-upload"></i>
                                            <?php echo e(__('Upload Evidence')); ?></button>
                                        <button data-target=".bd-example-modal-lg" data-toggle="modal"
                                            id="deploy_agent_group" type="button"
                                            class="btn btn-lg btn-default button6 text-bold"><i class="fas fa-users"></i>
                                            <?php echo e(__('Deploy Agent Group')); ?></button>
                                        <button data-target="#mergeEventsModel" data-toggle="modal" id="merge_event"
                                            type="button" class="btn btn-lg btn-default button8 text-bold"><i
                                                class="fa-solid fa-ban"></i>
                                            <?php echo e(__('Merge Report')); ?></button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg agentGroupModal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title create_staff_form text-bold " id="exampleModalLongTitle">
                                    <?php echo e(__('Available Groups')); ?>

                                    <hr class="create_staff_form ">

                            </div>

                            <div class="modal-body">
                                <table border='1' id="myTable"
                                    class="table table-hover table-bordered text-center table-striped">
                                    <tr class="table-success ">
                                        <th><?php echo e(__('ID')); ?></th>
                                        <th><?php echo e(__('Departments')); ?></th>
                                        <th><?php echo e(__('Action')); ?></th>
                                    </tr>
                                    <?php $__currentLoopData = $availableGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $groupMembers = $groupObject->groupMembers($group->group_id);
                                        ?>
                                        <tr class="table-light">
                                            <td class='pd-price'><?php echo e($group->group_id); ?></td>
                                            <td class='pd-name'>
                                                <?php $__currentLoopData = $groupMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($loop->last): ?>
                                                        <?php echo e(Str::title($member->name . ' ' . '(' . $member->department->title)); ?>

                                                        Department)
                                                    <?php else: ?>
                                                        <?php echo e(Str::title($member->name . ' ' . $member->surname . ' ' . '(' . $member->department->title)); ?>

                                                        Department),
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-success btnSelect"><i
                                                        class="fas fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg mergeEventsModel " id="mergeEventsModel" tabindex="-1"
                    role="dialog" aria-labelledby="mergeEventsModel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg mergeEventsModel">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title create_staff_form text-bold " id="exampleModalLongTitle">
                                    <?php echo e(__('Reports List')); ?>

                                </h3>
                                <hr class="create_staff_form ">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table border='1' id="myTable2"
                                    class="table table-hover table-bordered text-center table-striped">
                                    <tr class="table-info ">
                                        <th><?php echo e(__('ID')); ?></th>
                                        <th><?php echo e(__('Emergency Type')); ?></th>
                                        <th><?php echo e(__('Description')); ?></th>
                                        <th><?php echo e(__('Location')); ?></th>
                                        <th><?php echo e(__('Merge')); ?></th>
                                    </tr>
                                    <?php $__currentLoopData = $notMergedEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nevent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="table-light">
                                            <td class='eventrow'><?php echo e($nevent->id); ?></td>
                                            <td><?php echo e(Str::title($nevent->eventType->title)); ?></td>
                                            <td><?php echo e($nevent->description); ?></td>
                                            <td class='text-primary'>
                                                <?php echo e(substr($event->lat, 0, 7) . ' - ' . substr($event->lon, 0, 7)); ?></td>
                                            <td>
                                                <button class="btn btn-info btnSelect2"><i
                                                        class="fa-solid fa-square-check"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <hr class="w-75">
            <ul class="nav nav-tabs text-bold" id="custom-content-below-tab" role="tablist">
                <li class="nav-item ">
                    <a class="nav-link active p-3" id="custom-content-below-home-tab" data-toggle="pill"
                        href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                        aria-selected="true"><?php echo e(__('Home')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-3" id="custom-content-below-operations-tab" data-toggle="pill"
                        href="#custom-content-below-operations" role="tab" aria-controls="custom-content-below-operations"
                        aria-selected="false"><?php echo e(__('Operations')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-3" id="custom-content-below-agentsDeployed-tab" data-toggle="pill"
                        href="#custom-content-below-agentsDeployed" role="tab"
                        aria-controls="custom-content-below-agentsDeployed"
                        aria-selected="false"><?php echo e(__('Agents Deployed')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-3" id="custom-content-below-notes-tab" data-toggle="pill"
                        href="#custom-content-below-notes" role="tab" aria-controls="custom-content-below-notes"
                        aria-selected="false">
                        <?php echo e(__('Notes')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-3" id="custom-content-below-evidence-tab" data-toggle="pill"
                        href="#custom-content-below-evidence" role="tab" aria-controls="custom-content-below-evidence"
                        aria-selected="false"><?php echo e(__('Evidences')); ?></a>
                </li>
            </ul>
            <div class="tab-content px-3" id="custom-content-below-tabContent">
                <div class="tab-pane fade show active py-5" id="custom-content-below-home" role="tabpanel"
                    aria-labelledby="custom-content-below-home-tab">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mx-auto">
                            <div class="card  shadow  bg-white rounded ">
                                <div
                                    class="card-title text-bold p-3 <?php echo e($event->event_status_id == '1'? 'bg-success': ($event->event_status_id == '2'? 'bg-warning': ($event->event_status_id == '4'? 'bg-info': 'bg-danger'))); ?>">
                                    <?php echo e(__('Emergency Information')); ?>

                                    (
                                    <?php if($locale == 'en'): ?>
                                        <?php echo e(Str::title($event->eventStatus->title)); ?>

                                    <?php else: ?>
                                        <?php echo e(Str::title($event->eventStatus->tr)); ?>

                                    <?php endif; ?>
                                    )
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <li class="list-group-item border-0"><strong><?php echo e(__('Emergency Type')); ?>:</strong>
                                            <?php if($locale == 'en'): ?>
                                                <?php echo e(Str::title($event->eventType->title)); ?>

                                            <?php else: ?>
                                                <?php echo e(Str::title($event->eventType->tr)); ?>

                                            <?php endif; ?>
                                        </li>
                                        <li class="list-group-item border-0"><strong><?php echo e(__('Description')); ?>:</strong>
                                            <?php echo e(Str::title($event->description)); ?>

                                        </li>
                                        <li class="list-group-item border-0"><strong><?php echo e(__('Name Surname')); ?>:</strong>
                                            <?php if(isset($event->user)): ?>
                                                <?php echo e(Str::title($event->user->name . ' ' . $event->user->surname)); ?>

                                                <?php else: ?><?php echo e(Str::title($event->staff->name . ' ' . $event->staff->surname . ' ' . ' (Staff Category)')); ?>

                                            <?php endif; ?>
                                        </li>

                                        <li class="list-group-item border-0"><strong><?php echo e(__('Phone Number')); ?>:</strong>
                                            <?php if(isset($event->user)): ?>
                                                <?php echo e($event->user->msisdn); ?>

                                                <?php else: ?><?php echo e($event->staff->msisdn); ?>

                                            <?php endif; ?>
                                        </li>
                                        <li class="list-group-item border-0"><strong><?php echo e(__('Age')); ?>:</strong>
                                            <?php if(isset($event->user)): ?>
                                                <?php echo e($event->user->age); ?>

                                                <?php else: ?><?php echo e(' No Age !'); ?>

                                            <?php endif; ?>

                                        </li>
                                        <li class="list-group-item border-0"><strong><?php echo e(__('Email')); ?>:</strong>
                                            <?php if(isset($event->user)): ?>
                                                <?php echo e($event->user->email); ?>

                                                <?php else: ?><?php echo e($event->staff->email); ?>

                                            <?php endif; ?>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <strong><?php echo e(__('Report Date & Time')); ?>:</strong>
                                            <?php echo e($event->created_at); ?>

                                        </li>
                                        <?php
                                            use App\Models\StaffEvent;
                                            $editor_name = '';
                                            $staffEvent = StaffEvent::where('event_id', $event->id)
                                                ->orderBy('created_at', 'desc')
                                                ->first();
                                            if (isset($staffEvent)) {
                                                $editor = Staff::find($staffEvent->staff_id);
                                                if (isset($editor)) {
                                                    $editor_name = $editor->name . ' ' . $editor->surname;
                                                }
                                            }
                                            
                                        ?>
                                        <li class="list-group-item border-0">
                                            <strong><?php echo e(__('Editor')); ?>: </strong><?php echo e(Str::title($editor_name)); ?>

                                        </li>
                                    </ul>
                                    <a href="<?php echo e(route('edit_report', $event->id)); ?>" class="form-buttons float-right"><i
                                            class=" far fa-edit"></i>
                                        <?php echo e(__('Edit Report')); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12 mx-auto">
                            <div class="card shadow  bg-white rounded">
                                <div class="card-title bg-info p-3 text-bold"> <?php echo e(__('Device Information')); ?></div>
                                <div class="card-body">
                                    <ul>
                                        <li class="list-group-item border-0"><strong><?php echo e(__('Device ID')); ?>:</strong>
                                            <?php if(isset($event->user)): ?>
                                                <?php echo e($event->user->device_id); ?>

                                                <?php else: ?><?php echo e($event->staff->device_id); ?>

                                            <?php endif; ?>
                                        </li>
                                        <li class="list-group-item border-0"><strong><?php echo e(__('Phone Model')); ?>:</strong>
                                            <?php if(isset($event->user)): ?>
                                                <?php echo e($event->user->device_model); ?>

                                                <?php else: ?><?php echo e($event->staff->device_model); ?>

                                            <?php endif; ?>
                                        </li>
                                        <li class="list-group-item border-0"><strong><?php echo e(__('Event Location')); ?>:</strong>
                                            <a target="_blank" class="bg-danger p-2 rounded"
                                                href="https://www.google.com/maps/search/<?php echo e($event->lat . ',' . $event->lon); ?>">
                                                <?php echo e(substr($event->lat, 0, 7) . ' - ' . substr($event->lon, 0, 7)); ?></a>
                                        </li>
                                        <li class="list-group-item border-0"><strong><?php echo e(__('Device Token')); ?>:</strong>
                                            <?php if(isset($event->user)): ?>
                                                <?php echo e($event->user->device_token); ?>

                                                <?php else: ?><?php echo e($event->staff->device_token); ?>

                                            <?php endif; ?>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade py-5" id="custom-content-below-operations" role="tabpanel"
                    aria-labelledby="custom-content-below-operations-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card rounded">
                                <div class="card-title text-bold p-3 bg-info"><?php echo e(__('Operations Performed')); ?>

                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="thead">
                                            <tr>
                                                <th scope="col"><?php echo e(__('Content')); ?></th>
                                                <th scope="col"><?php echo e(__('Editor')); ?></th>
                                                <th scope="col"><?php echo e(__('Date & Time')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($history['create']['creator_name'])): ?>
                                                <tr>
                                                    <td><?php echo e(__('Report Created')); ?></td>
                                                    <td><a
                                                            href="<?php echo e($history['create']['creator_type'] == 'staff'? route('agent', $history['create']['creator_id']): route('user', $history['create']['creator_id'])); ?>"><?php echo e($history['create']['creator_name']); ?>

                                                            (<?php echo e($history['create']['creator_type']); ?>)</a></td>
                                                    <td><?php echo e($history['create']['created_at']); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if(isset($history['group']['group_id'])): ?>
                                                <tr>
                                                    <td><?php echo e(__('Group Deployed ')); ?><a
                                                            href="<?php echo e(route('agentGroup', $history['group']['group_id'])); ?>">(<?php echo e(__('Group')); ?>

                                                            <?php echo e($history['group']['group_id']); ?>)</a></td>
                                                    <td><a
                                                            href="<?php echo e(route('agent', $history['group']['assigner_staff_id'])); ?>"><?php echo e($history['group']['assigner_staff_name']); ?></a>
                                                    </td>
                                                    <td><?php echo e($history['group']['created_at']); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if(isset($history['mark'][0])): ?>
                                                <?php $__currentLoopData = $history['mark']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e(__('Report Status Changed')); ?>

                                                            (<?php echo e($mark['event_status_name']); ?>)
                                                        </td>
                                                        <td><a
                                                                href="<?php echo e(route('agent', $mark['staff_id'])); ?>"><?php echo e(Str::title($mark['staff_name'])); ?></a>
                                                        </td>
                                                        <td><?php echo e($mark['created_at']); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade py-5" id="custom-content-below-agentsDeployed" role="tabpanel"
                    aria-labelledby="custom-content-below-agentsDeployed-tab">
                    <div class="row">
                        <div class="col-md-7 col-sm-12">
                            <h3 class="text-bold mb-3"><?php echo e(__('Agent Group')); ?>:
                                <?php if(isset($groups[0])): ?>
                                    <a href="<?php echo e(route('agentGroup', $groups[0]->group_id)); ?>"
                                        class="text-danger"><?php echo e($groups[0]->group_id); ?> ( <i
                                            class="fas fa-eye"></i>
                                        <?php echo e(__('More Details')); ?>)</a>
                                <?php else: ?>
                                    <?php echo e(__('No Group')); ?>

                                <?php endif; ?>
                            </h3>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center align-items-center">
                        <?php if(isset($groups[0])): ?>
                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $agent = Staff::find($row->staff_id);
                                    $modal_trigger = 'agent' . $agent?->id;
                                ?>
                                <?php if(isset($agent)): ?>
                                    <div class="col-md-4">
                                        <div class="card card-primary card-outline shadow  bg-white rounded">
                                            <div class="card-body box-profile">

                                                <h3 class="profile-username text-center text-danger text-bold">
                                                    <?php if($locale == 'en'): ?>
                                                        <?php echo e(Str::title($agent->department->title) . ' Department'); ?>

                                                    <?php else: ?>
                                                        <?php echo e(Str::title($agent->department->tr) . ' Departmanı'); ?>

                                                    <?php endif; ?>

                                                </h3>

                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b><?php echo e(__('Name Surname')); ?>:</b> <a class="float-right">
                                                            <?php echo e(Str::title($agent->name . ' ' . $agent->surname)); ?></a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b><?php echo e(__('Phone Number')); ?>:</b>
                                                        <aclass="float-right"><?php echo e($agent->msisdn); ?>

                                                            </aclass=>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Email:</b> <a class="float-right"><?php echo e($agent->email); ?></a>
                                                    </li>
                                                </ul>

                                                <button type="button" data-toggle="modal"
                                                    data-target="#<?php echo e($modal_trigger); ?>" href="#"
                                                    class="btn btn-info btn-block"><b><?php echo e(__('Agent Information')); ?></b></button>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="modal fade" id="<?php echo e($modal_trigger); ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content border border-dark">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-center text-bold text-dark"
                                                                id="exampleModalLongTitle">
                                                                <i
                                                                    class="fas fa-id-badge mr-2"></i><?php echo e(__('Agent Details')); ?>

                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body box-profile">
                                                            <h3 class="profile-username text-center text-primary">
                                                                <?php if($locale == 'en'): ?>
                                                                    <?php echo e(Str::title($agent->department->title) . ' Department'); ?>

                                                                <?php else: ?>
                                                                    <?php echo e(Str::title($agent->department->tr) . ' Departmanı'); ?>

                                                                <?php endif; ?>
                                                            </h3>

                                                            <ul class="list-group list-group-unbordered mb-3">
                                                                <li class="list-group-item border-0">
                                                                    <b><?php echo e(__('Agent Group ID')); ?>:</b> <a
                                                                        class="float-right"></a>
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
                                                            <a href="<?php echo e(route('agent', $agent)); ?>"
                                                                class="btn btn-dark btn-block"><i
                                                                    class="fas fa-user mr-2"></i><?php echo e(__('Visit Profile')); ?></a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="container-fluid">
                                <button type="button" class="btn btn-md p-2 float-right btn-default button3 text-bold"><i
                                        class="fas fa-user-times"></i> <?php echo e(__('Remove Agent Group')); ?>

                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="tab-pane fade py-5" id="custom-content-below-notes" role="tabpanel"
                    aria-labelledby="custom-content-below-notes-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card rounded ">
                                <div class="card-title text-bold p-3 bg-warning "><span class="text-white">
                                        <?php echo e(__('Event Notes')); ?></span>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="thead">
                                            <tr>
                                                <th scope="col-4"><?php echo e(__('Notes')); ?></th>
                                                <th scope="col-4"><?php echo e(__('Editor')); ?></th>
                                                <th scope="col-4"><?php echo e(__('Updated At')); ?> </th>
                                                <th scope="col-4"><?php echo e(__('Delete')); ?> </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $event?->eventNotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td class="pt-3"><?php echo e($note->note); ?></td>
                                                    <td class="pt-3">
                                                        <?php echo e(Str::title($note->editor->name . ' ' . $note->editor->surname)); ?>

                                                    </td>
                                                    <td class="pt-3"><?php echo e($note->updated_at); ?></td>
                                                    <td class="pb-1"><button type="button" id="deleteNote"
                                                            class="form-buttons3"><i
                                                                class="fa-solid fa-trash"></i></button></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade py-5" id="custom-content-below-evidence" role="tabpanel"
                    aria-labelledby="custom-content-below-evidence-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card rounded">
                                <div class="card-title text-bold p-3 bg-danger"><?php echo e(__('Event Evidences')); ?>

                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="thead">
                                            <tr>
                                                <th scope="col"><?php echo e(__('Document Type')); ?></th>
                                                <th scope="col"><?php echo e(__('Document')); ?></th>
                                                <th scope="col"><?php echo e(__('Uploaded At')); ?></th>
                                                <th scope="col"><?php echo e(__('Download')); ?></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($event->document->path)): ?>
                                                <tr>
                                                    <td><?php echo e(Str::title($event->document->type)); ?></td>
                                                    <td> <a type="button" data-toggle="modal"
                                                            data-target="#<?php echo e($documentModalTrigger); ?>"
                                                            href="<?php echo e(asset($event->document->path)); ?>">
                                                            <?php echo e($event->document->id); ?></a>
                                                    </td>
                                                    <td><?php echo e($event->document->created_at); ?></td>
                                                    <td><a class="button7 p-3" download
                                                            href="<?php echo e(asset($event->document->path)); ?>"><i
                                                                class="fa-solid fa-download"></i></a></td>
                                                </tr>
                                                <div class="modal fade" id="<?php echo e($documentModalTrigger); ?>"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-center">
                                                                <h5 class="modal-title text-bold text-dark "
                                                                    id="exampleModalLongTitle">
                                                                    <?php echo e(__('Document ID')); ?>:
                                                                    <?php echo e($event->document->id); ?></h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img class="img-fluid"
                                                                    src="<?php echo e(asset($event->document->path)); ?>">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- /.card -->
        </div>

    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sweetjs'); ?>
    <script>
        var event_id = '<?php echo e($event->id); ?>';
        var locale = '<?php echo e($locale); ?>';
        var buttonFirstText = "";
        var buttonSecondText = "";
        var buttonThirdText = "";
        var buttonCancelText = "";
        var uploader_name = "<?php echo e(Auth::user()->name . ' ' . Auth::user()->surname); ?>";
        var eventStatus = <?php echo json_encode($eventStatus, 15, 512) ?>;
        var eventStatusTr = <?php echo json_encode($eventStatusTr, 15, 512) ?>;
        var currentStatus = <?php echo json_encode($currentStatus, 15, 512) ?>;
        var currentStatusTr = <?php echo json_encode($currentStatusTr, 15, 512) ?>;
        var currentStatusId = <?php echo json_encode($currentStatusId, 15, 512) ?>;
        var fileType = "";
        let _token = $('meta[name="csrf-token"]').attr('content');

        if (locale == 'en') {
            currentStatusResult = currentStatus;
            eventStatusResult = eventStatus;
            buttonFirstText = "Mark";
            buttonSecondText = "Upload";
            buttonThirdText = "Add Note"
            buttonCancelText = "Cancel";
        } else if (locale == 'tr') {
            currentStatusResult = currentStatusTr;
            eventStatusResult = eventStatusTr;
            buttonFirstText = "İşaretle"
            buttonSecondText = "Yükle";
            buttonThirdText = "Not Ekle";
            buttonCancelText = "İptal";
        }


        $("#mark_event").on("click", function() {
            Swal.fire({
                title: '<i class="fas fa-highlighter"></i> Mark Events As',
                input: 'select',
                inputOptions: eventStatusResult,
                inputPlaceholder: currentStatusResult,
                inputValue: currentStatusId,
                confirmButtonColor: "#1FAB45",
                confirmButtonText: buttonFirstText,
                cancelButtonText: buttonCancelText,
                showCancelButton: true,
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        $.ajax({
                            url: "<?php echo e(route('update_report', $event->id)); ?>",
                            type: "POST",
                            data: {
                                event_status_id: value,
                                _method: "PUT",
                                _token: _token
                            },
                            success: function() {
                                $.ajax({
                                    url: "<?php echo e(route('mark_event', $event->id)); ?>",
                                    type: "POST",
                                    data: {
                                        event_status_id: value,
                                        event_id: "<?php echo e($event->id); ?>",
                                        staff_id: "<?php echo e(Auth::id()); ?>",
                                        _token: _token
                                    },
                                    success: function() {
                                        swal.fire({
                                            icon: 'success',
                                            title: "<?php echo e(__('Updated')); ?>",
                                            text: "<?php echo e(__('Your event has been updated.')); ?>",
                                            type: "success",
                                            timer: 3000
                                        }).then(function() {
                                            location.reload(
                                                true);
                                        });
                                    },
                                    error: function(xhr, ajaxOptions,
                                        thrownError) {
                                        swal.fire(
                                            "<?php echo e(__('Error Updating!')); ?>",
                                            "<?php echo e(__('Please try again')); ?>",
                                            "error");
                                    }
                                });
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                swal.fire("<?php echo e(__('Error Updating')); ?>",
                                    "<?php echo e(__('Please Try Again')); ?>",
                                    "error");
                            }
                        });


                    })
                }
            })
        })
        $("#upload_evidence").on("click", function() {

            Swal.fire({
                title: '<i class="fa-solid fa-file-arrow-up"></i> Select File',
                input: 'file',
                confirmButtonColor: "#1FAB45",
                confirmButtonText: buttonSecondText,
                cancelButtonText: buttonCancelText,
                inputAttributes: {
                    'accept': 'image/*,application/*,audio/*,text/*',
                    'aria-label': 'Upload your document'
                },
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value === '') {
                            resolve('You need to select oranges :)')
                        } else {
                            var fd = new FormData();
                            var ext = file.split('.').pop();
                            // Check file selected or not
                            if (value) {
                                if (ext == 'png' || ext == 'jpg' || ext == 'jpeg') {
                                    var documentType = 1;
                                } else if (ext == 'doc' || ext == 'docx' || ext == 'pdf' ||
                                    ext == 'csv' || ext == 'xlsx') {
                                    var documentType = 4;
                                } else if (ext == 'mp4' || ext == 'mov' || ext == 'wmv' ||
                                    ext == 'avi' || ext == 'mpeg-2') {
                                    var documentType = 2;
                                } else if (ext == 'mp3' || ext == 'aac') {
                                    var documentType = 3;
                                } else {
                                    var documentType = 5;
                                }

                                fd.append('event_id', event_id);
                                fd.append('uploader_name', uploader_name);
                                fd.append('file', value);
                                fd.append('_token', _token);
                                fd.append('document_type_id', documentType);
                                $.ajax({
                                    url: "<?php echo e(route('store_evidence', $event->id)); ?>",
                                    type: 'post',
                                    data: fd,
                                    contentType: false,
                                    processData: false,
                                    success: function(response) {
                                        if (response) {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Done',
                                                text: 'You have uploaded an evidence!',
                                            }).then(
                                                function() {
                                                    location.reload();
                                                }
                                            )
                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: 'Could not upload the evidence!',
                                            })
                                        }
                                    },
                                });
                            } else {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'No File',
                                    text: 'Please select a file!',
                                })
                            }
                        }
                    })
                }
            })
        })
        $('#make_notes').on('click', function() {
            Swal.fire({
                title: "Add Note",
                input: "textarea",
                showCancelButton: true,
                confirmButtonColor: "#1FAB45",
                confirmButtonText: buttonThirdText,
                cancelButtonText: buttonCancelText,
                buttonsStyling: true
            }).then(function() {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo e(route('store_notes')); ?>",
                        data: {
                            event_id: "<?php echo e($event->id); ?>",
                            note: $('textarea').val(),
                            editor_id: "<?php echo e(Auth::user()->id); ?>",
                            _token: _token
                        },
                        success: function(response) {
                            Swal.fire(
                                "Sccess!",
                                "Your note has been saved!",
                                "success"
                            ).then(function() {
                                window.location.reload();
                            })
                        },
                        failure: function(response) {
                            Swal.fire(
                                "Internal Error",
                                "Oops, your note was not saved.",
                                "error"
                            )
                        }
                    });
                },
                function(dismiss) {
                    if (dismiss === "cancel") {
                        swal(
                            "Cancelled",
                            "Canceled Note",
                            "error"
                        )
                    }
                })

        });

        $('#deleteNote').on('click', function() {
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
                        type: "POST",
                        data: {
                            url: "<?php echo e(route('delete_notes', $note->id)); ?>",
                            id: '$note->id',
                            _method: "DELETE",
                            _token: _token
                        },
                        success: function() {
                            swal.fire("Done!", "It was succesfully deleted!", "success").then(
                                function() {
                                    window.location.reload();
                                })

                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal.fire("Error deleting!", "Please try again", "error");
                        }
                    });
                } else {

                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $("#myTable").on('click', '.btnSelect', function() {
                var currentRow = $(this).closest("tr");
                var id = currentRow.find(".pd-price").html();
                $.ajax({
                    console: function
                    url: "<?php echo e(route('update_report', $event->id)); ?>",
                    type: "POST",
                    data: {
                        group_id: id,
                        _method: "PUT",
                        _token: _token
                    },
                    success: function() {
                        swal.fire({
                            icon: 'success',
                            title: "Updated!",
                            text: "Your row has been updated.",
                            type: "success",
                            timer: 3000
                        }).then(function() {
                            location.reload(true);
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal.fire("Error deleting!", "Please try again",
                            "error");
                    }
                });

            });
        });
        $(document).ready(function() {
            $("#myTable2").on('click', '.btnSelect', function() {
                var currentRow = $(this).closest("tr");
                console.log("geldim");
                var id2 = currentRow.find(".pd-price").html();
                $.ajax({
                    url: "<?php echo e(route('mark_event', $event->id)); ?>",
                    type: "POST",
                    event_status_id: 4,
                    event_id: "<?php echo e($event->id); ?>",
                    staff_id: "<?php echo e(Auth::id()); ?>",
                    success: function() {
                        swal.fire({
                            icon: 'success',
                            title: "Updated!",
                            text: "Your row has been updated.",
                            type: "success",
                            timer: 3000
                        }).then(function() {
                            location.reload(true);
                        });
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal.fire("Error merging!", "Please try again",
                            "error");
                    }
                });

            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/report_operations/report.blade.php ENDPATH**/ ?>