<!DOCTYPE html>
<html>
    <head>
        <base href="<?php echo e(url('/')); ?>">
        <meta charset="UTF-8">

        <title>
            <?php echo $__env->yieldContent('title'); ?> - FleetCart
        </title>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:600|Roboto:400,500" rel="stylesheet">

        <?php $__currentLoopData = $assets->allCss(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $css): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(v($css)); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php echo $__env->make('admin::partials.globals', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>

    <body class="clearfix">
        <div class="login-page">
            <?php echo $__env->make('admin::partials.notification', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <?php $__currentLoopData = $assets->allJs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script src="<?php echo e(v($js)); ?>"></script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </body>
</html>
