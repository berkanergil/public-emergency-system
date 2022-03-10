<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
    <title> EmergenCyp | Login</title>
</head>

<body>
    <div class="container" id="container">
        <?php if(session('status')): ?>
            <h3 class="text-white" style="z-index: 100 !important"><?php echo e(session('status')); ?>

            </h3>
        <?php endif; ?>
        <div class="form-container sign-in-container">
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <h1 style="margin-bottom:30px; color: #083372;">EmergenCyp | <?php echo e(__('Login')); ?></h1>
                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                    value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus type="email"
                    placeholder="<?php echo e(__('Email')); ?>" />
                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    name="password" required autocomplete="current-password" type="password"
                    placeholder="<?php echo e(__('Password')); ?>" />
                <a href="#"><?php echo e(__('Forgot your password?')); ?></a>
                <button class="login"><?php echo e(__('Sign In')); ?></button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">

                <div class="overlay-panel overlay-right">
                    <img src="<?php echo e(asset('images/logo-white-sm.png')); ?>" alt="">
                    <h1 style="margin-top:30px;"><?php echo e(__('Welcome to EmergenCyp!')); ?></h1>
                    <p><?php echo e(__('We are the fastest way to get help!')); ?></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php /**PATH C:\Users\Tolgahan\Desktop\Tolga\OKUL\YEAR 4\SEMESTER 8\CMSE406\public-emergency-system\resources\views/auth/login.blade.php ENDPATH**/ ?>