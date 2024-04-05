<?php $__env->startSection('content'); ?>
<main class="login-form">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-primary text-white">User List</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($user->id); ?></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e($user->phonenumber); ?></td>
                                        <td>
                                            <?php if($user->image): ?>
                                            <img src="<?php echo e(asset('images/' . $user->image)); ?>" alt="<?php echo e($user->name); ?>" class="img-thumbnail" style="width: 70px; height: 70px;">
                                            <?php else: ?>
                                            No Image
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('user.readUser', ['id' => $user->id])); ?>" class="btn btn-sm btn-info">View</a>
                                            <a href="<?php echo e(route('user.updateUser', ['id' => $user->id])); ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="<?php echo e(route('user.deleteUser', ['id' => $user->id])); ?>" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\doan\laravel(Tam)\resources\views/crud_user/list.blade.php ENDPATH**/ ?>