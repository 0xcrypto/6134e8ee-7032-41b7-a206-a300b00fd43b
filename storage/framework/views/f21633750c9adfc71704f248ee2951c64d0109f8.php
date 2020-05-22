<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.create', ['resource' => trans('coupon::coupons.coupon')])); ?>

    <li><a href="<?php echo e(route('admin.coupons.index')); ?>"><?php echo e(trans('coupon::coupons.coupons')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.create', ['resource' => trans('coupon::coupons.coupon')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.coupons.store')); ?>" class="form-horizontal" id="coupon-create-form" novalidate>
        <?php echo e(csrf_field()); ?>


        <?php echo $tabs->render(compact('coupon')); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('coupon::admin.coupons.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>