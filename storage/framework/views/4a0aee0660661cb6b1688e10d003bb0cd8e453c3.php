<?php $__env->startSection('title', trans('admin::resource.edit', ['resource' => trans('user::users.profile')])); ?>

<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.edit', ['resource' => trans('user::users.profile')])); ?>

    <li class="active"><?php echo e(trans('admin::resource.edit', ['resource' => trans('user::users.profile')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.profile.update')); ?>" class="form-horizontal" id="profile-form" novalidate>
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('put')); ?>


        <?php echo $tabs->render(); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>