<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light navbar-expand-lg mb-5 py-4" style="background-color: #00fcca;">
    <div class="container">
        <h3 style="color: rgb(1, 43, 4)">Demo Laravel</h3>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                    
                    </li>
                    <li class="nav-item">
                       
                        <a class="nav-link" href="<?php echo e(route('user.createUser')); ?>">Register</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                         <a class="nav-link" href="<?php echo e(route('signout')); ?>">Logout</a>
                     
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php echo $__env->yieldContent('content'); ?>

<script src="<?php echo e(asset('js/scripts.js')); ?>"></script>
</body>
</html>
<?php /**PATH D:\doan\laravel(Nam) - Copy\resources\views/dashboard.blade.php ENDPATH**/ ?>