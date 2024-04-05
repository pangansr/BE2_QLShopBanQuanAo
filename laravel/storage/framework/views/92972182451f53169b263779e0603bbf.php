

<?php $__env->startSection('content'); ?>
    <main class="login-form">
        <div class="container">
            <h1 style="text-align: center; margin: 15px">View user</h1>
            <div style="position: absolute;"> 
                <img src="<?php echo e(asset('images/' . $users->image)); ?>" alt="<?php echo e($users->name); ?>" style="width: 300px; height: 300px; margin-right: 20px; border: 5px rgb(0, 249, 54) double">          
                   <div style="float: right;">
                    <h3>Name: <?php echo e($users->name); ?></h3>
                    <p>ID: <?php echo e($users->id); ?></p>
                    <p>Email: <?php echo e($users->email); ?></p>
                    <p>Phonenumber: <?php echo e($users->phonenumber); ?></p>
                   </div>
                   
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\HocKy4\TaiLieuGit\laravel\resources\views/crud_user/read.blade.php ENDPATH**/ ?>