<?php $__env->startSection('title'); ?>
    Welcome!
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="<?php echo e(route('signup')); ?>" method="post">
                <div class="form-group <?php echo e($errors->has('email-signup') ? 'alert alert-danger' : ''); ?>">
                    <label for="email">Your email</label>
                    <input class="form-control" type="text" name="email" id="email" value = "<?php echo e(Request::old('email-signup')); ?>">
                </div>
                <div class="form-group <?php echo e($errors->has('name') ? 'alert alert-danger' : ''); ?>">
                    <label for="name-signup">Your First Name</label>
                    <input class="form-control" type="text" name="name-signup" id="name-signup" value = "<?php echo e(Request::old('name-signup')); ?>">
                </div>
                <div class="form-group <?php echo e($errors->has('password') ? 'alert alert-danger' : ''); ?>">
                    <label for="password-signup">Your password</label>
                    <input class="form-control" type="password" name="password-signup" id="password-signup" value = "<?php echo e(Request::old('password-signup')); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>"> <!--security for cross site attacks-->
            </form>
        </div>
        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="<?php echo e(route('signin')); ?>" method="post">
                <div class="form-group <?php echo e($errors->has('email') ? 'alert alert-danger' : ''); ?>">
                    <label for="email">Your email</label>
                    <input class="form-control" type="text" name="email" id="email" value = "<?php echo e(Request::old('email')); ?>">
                </div>
                <div class="form-group <?php echo e($errors->has('password') ? 'alert alert-danger' : ''); ?>">
                    <label for="password">Your password</label>
                    <input class="form-control" type="password" name="password" id="password" value = "<?php echo e(Request::old('password')); ?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>