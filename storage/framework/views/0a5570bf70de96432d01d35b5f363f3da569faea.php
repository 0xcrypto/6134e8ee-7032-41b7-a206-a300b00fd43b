<!DOCTYPE html>
<html lang="<?php echo e(locale()); ?>">
    <head>
        <base href="<?php echo e(url('/')); ?>">
        <meta charset="UTF-8">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>
            <?php echo $__env->yieldContent('title'); ?> - FleetCart Admin
        </title>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:600|Roboto:400,500" rel="stylesheet">

        <?php $__currentLoopData = $assets->allCss(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $css): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(v($css)); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php echo $__env->yieldPushContent('styles'); ?>

        <?php echo $__env->make('admin::partials.globals', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>

    <body class="skin-blue offcanvas clearfix <?php echo e(is_rtl() ? 'rtl' : 'ltr'); ?>">
        <div class="wrapper">
            <header class="main-header clearfix">
                <?php echo $__env->make('admin::partials.top_bar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                
                <?php echo $__env->make('admin::partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </header>
            <div class="content-wrapper">
                <section class="content-header clearfix">
                    <?php echo $__env->yieldContent('content_header'); ?>
                </section>

                <section class="content">
                    <?php echo $__env->make('admin::partials.notification', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php echo $__env->yieldContent('content'); ?>
                </section>

                <div id="notification-toast"></div>
            </div>
        </div>

        <?php echo $__env->make('admin::partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make('admin::partials.confirmation_modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php $__currentLoopData = $assets->allJs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $js): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script src="<?php echo e(v($js)); ?>"></script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php echo $__env->yieldPushContent('scripts'); ?>
    </body>
</html>
