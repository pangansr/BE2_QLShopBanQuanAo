

<?php $__env->startSection('content'); ?>
    <main class="signup-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Cập nhật</h3>
                        <div class="card-body">
                            <form action="<?php echo e(route('user.postUpdateUser')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input name="id" type="hidden" value="<?php echo e($user->id); ?>">
                                <div class="form-group mb-3">
                                    <label for="Tên người dùng">Tên người dùng</label><br><br>
                                    <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                           value="<?php echo e($user->name); ?>"
                                           required autofocus>
                                    <?php if($errors->has('name')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Email">Email</label><br><br>
                                    <input type="text" placeholder="Email" id="email_address" class="form-control"
                                           value="<?php echo e($user->email); ?>"
                                           name="email" required autofocus>
                                    <?php if($errors->has('email')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Số điện thoại">Số điện thoại</label><br><br>
                                    <input type="text" placeholder="phonenumber" id="phonenumber" class="form-control" name="phonenumber"
                                           value="<?php echo e($user->phonenumber); ?>"
                                           required autofocus>
                                    <?php if($errors->has('phonenumber')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('phonenumber')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Mật khẩu">Mật khẩu</label><br><br>
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                           name="password" required>
                                    <?php if($errors->has('password')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="Chọn ảnh">Chọn ảnh</label><br><br>
                                    <input type="file" id="image" class="form-control" name="image"
                                           required autofocus>
                                    <?php if($errors->has('image')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('image')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Cập nhật</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\HocKy4\TaiLieuGit\laravel\resources\views/crud_user/update.blade.php ENDPATH**/ ?>