<?php $__env->startSection('title', trans('setting::settings.settings')); ?>

<?php $__env->startSection('content_header'); ?>
    <h3><?php echo e(trans('setting::settings.settings')); ?></h3>

    <ol class="breadcrumb">
        <li><a href="<?php echo e(route('admin.dashboard.index')); ?>"><?php echo e(trans('admin::dashboard.dashboard')); ?></a></li>
        <li class="active"><?php echo e(trans('setting::settings.settings')); ?></li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>" class="form-horizontal" id="settings-edit-form" novalidate>
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('put')); ?>


        <?php echo $tabs->render(compact('settings')); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>