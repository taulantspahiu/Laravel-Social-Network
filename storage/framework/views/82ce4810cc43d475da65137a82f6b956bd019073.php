<?php $__env->startSection('title'); ?>
    Welcome!
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(count($errors) > 0): ?>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <ul>
                    <?php foreach($errors->all() as $error): ?> 
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
    
    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="<?php echo e(route('signup')); ?>" method="post">
                <div class="form-group <?php echo e($errors->has('email') ? 'alert alert-danger' : ''); ?>">
                    <label for="email">Your email</label>
                    <input class="form-control" type="text" name="email" id="email" value = "<?php echo e(Request::old('email')); ?>">
                </div>
                <div class="form-group <?php echo e($errors->has('first-name') ? 'alert alert-danger' : ''); ?>">
                    <label for="first_name">Your First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value = "<?php echo e(Request::old('first_name')); ?>">
                </div>
                <div class="form-group <?php echo e($errors->has('password') ? 'alert alert-danger' : ''); ?>">
                    <label for="password">Your password</label>
                    <input class="form-control" type="password" name="password" id="password" value = "<?php echo e(Request::old('password')); ?>">
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