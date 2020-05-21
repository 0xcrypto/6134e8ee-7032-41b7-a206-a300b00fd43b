<?php $__env->startSection('title'); ?>
    <?php if(isset($subtitle)): ?>
        <?php echo e("{$subtitle} - {$title}"); ?>

    <?php else: ?>
        <?php echo e($title); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_header'); ?>
    <h3><?php echo e($title); ?></h3>

    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('admin::dashboard.dashboard')); ?></a></li>

        <?php echo e($slot); ?>

    </ol>
<?php $__env->stopSection(); ?>
