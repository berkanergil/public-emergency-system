
<?php $__env->startSection('breadcrumb'); ?>
    <a href="<?php echo e(route('editProfile', $staff)); ?>">Edit Profile</a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('statistic_content'); ?>
    <div class="row gutters d-flex justify-content-center align-items-center">
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card p-5 shadow p-3 mb-5 bg-white rounded">
                <div class="card-title mt-3">
                    <h3 class="create_staff_form text-bold"><?php echo e(__('Edit Your Profile Details')); ?></h3>
                    <hr class="create_staff_form">
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('editProfile', ['id' => $staff->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="name"><i class="far fa-id-card"></i> <?php echo e(__('First Name')); ?></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value=<?php echo e(Str::title($staff->name)); ?>>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="surname"><i class="far fa-id-card"></i> <?php echo e(__('Last Name')); ?></label>
                                    <input type="text" class="form-control" id="surname" name="surname"
                                        value=<?php echo e(Str::title($staff->surname)); ?>>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email"><i class="far fa-envelope"></i> <?php echo e(__('Email')); ?></label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value=<?php echo e($staff->email); ?>>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone"><i class="fas fa-mobile-alt"></i> <?php echo e(__('Phone')); ?></label>
                                    <input name="msisdn" class="form-control" id="phone" value=<?php echo e($staff->msisdn); ?>>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="password"><i class="fas fa-key"></i> <?php echo e(__('Password')); ?></label>
                                    <input type="password" class="form-control icon" id="password" placeholder=""
                                        name="password"><i id="btn-eye" class="btn-eye far fa-eye-slash"></i>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="password_confirm"><i class="fas fa-key"></i>
                                        <?php echo e(__('Confirm Password')); ?>

                                    </label>
                                    <input type="password" class="form-control icon" id="password_confirm" placeholder="">
                                    <i id="btn-eye2" class="btn-eye far fa-eye-slash"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <form class="form-group">
                                        <button type="button" class="form-buttons2 generator"><i class="fas fa-key"></i>
                                            <?php echo e(__('Generate Password')); ?></button>
                                    </form>
                                    <button id="update" type="button" class="form-buttons"> <i
                                            class="far fa-edit mr-1"></i><?php echo e(__('Update')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="_method" value="PUT">
                    </form>

                </div>
            </div>
        </div>
        <div class="d-none">
            <form class="form-inline">
                <div class="form-group">
                    <label for="pwLength">Length</label>
                    <select class="custom-select" id="pwLength">
                        <option selected="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                    </select>

                    <div class="row">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="caps">
                            A-Z
                        </label>
                    </div>
                    <div class="row">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="special">
                            !-?
                        </label>
                    </div>
                    <div class="row">

                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" id="numbers" checked="checked">
                            1-9
                        </label>
                    </div>
                </div>

            </form>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sweetjs'); ?>
    <script>
        let _token = $('meta[name="csrf-token"]').attr('content');
        var id = <?php echo e($staff->id); ?>;
        var url = "http://127.0.0.1:8000/admin/profile" + id
        var button = $("#update").on("click", function() {
            Swal.fire({
                title: 'Save Changes?',
                text: "The new settings will be saved!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        data: {
                            id: id,
                            _method: "PUT",
                            _token: _token
                        },
                        success: function() {
                            swal.fire("Done!", "Your details succesfully updated!", "success");

                            $(location).attr('href', url);
                        },
                    });
                } else {

                }
            })
        });
        var eyeBtn = document.querySelector('#btn-eye');
        eyeBtn.onclick = function() {
            var inp = document.querySelector('#password');
            inp.getAttribute('type') === 'password' ? inp.setAttribute('type', 'text') : inp.setAttribute('type',
                'password');
        }
        var eyeBtn2 = document.querySelector('#btn-eye2');
        eyeBtn2.onclick = function() {
            var inp = document.querySelector('#password_confirm');
            inp.getAttribute('type') === 'password' ? inp.setAttribute('type', 'text') : inp.setAttribute('type',
                'password');
        }
    </script>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/profile_operations/editProfile.blade.php ENDPATH**/ ?>