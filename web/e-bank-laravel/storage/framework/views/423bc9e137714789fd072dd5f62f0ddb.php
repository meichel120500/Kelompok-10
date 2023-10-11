



<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<div class="error-messages">
    <?php if(session()->has('error')): ?>
    <div class="alert alert-danger">
        <?php if(is_array(session()->get('error'))): ?>
            
            <?php $__currentLoopData = session('error'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="m-2"><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php echo e(session()->get('error')); ?>

        <?php endif; ?>
    </div>
    <?php endif; ?>
    
    <?php if(session()->has('unsafe-error')): ?>
    <div class="alert alert-danger">
        <?php if(is_array(session()->get('unsafe-error'))): ?>
            
            <?php $__currentLoopData = session('unsafe-error'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="m-2"><?php echo $error; ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php echo session()->get('unsafe-error'); ?>

        <?php endif; ?>
    </div>
    <?php endif; ?>
    <?php if(session()->has('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session()->get('success')); ?>

        </div>
    <?php endif; ?>
    
    <?php if(session()->has('unsafe-success')): ?>
        <div class="alert alert-success">
            <?php echo session()->get('unsafe-success'); ?>

        </div>
    <?php endif; ?>
    
    <?php if(is_array($errors)): ?>
        <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="m-2"><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>    
        <?php endif; ?>
    <?php else: ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="m-2"><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    
    <?php if(session()->has('debug')): ?>
        <div style="background: yellow; padding: 1rem;">
            <?php echo e(session('debug')); ?>

        </div>
    <?php endif; ?>
    <?php if(session()->has('info')): ?>
        <div class="alert alert-primary">
            <?php echo e(session()->get('info')); ?>

        </div>
    <?php endif; ?>
    <?php if(session()->has('unsafe-info')): ?>
        <div class="alert alert-primary">
            <?php echo session()->get('unsafe-info'); ?>

        </div>
    <?php endif; ?>
</div><?php /**PATH C:\Users\umaru\OneDrive\Documents\Budiluhur\studpen\it-perbankan-finpro-kelompok10\web\e-bank-laravel\resources\views/includes/flash_messages.blade.php ENDPATH**/ ?>