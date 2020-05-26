<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.create', ['resource' => trans('product::products.product')])); ?>

    <li><a href="<?php echo e(route('admin.products.index')); ?>"><?php echo e(trans('product::products.products')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.create', ['resource' => trans('product::products.product')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.products.store')); ?>" class="form-horizontal" id="product-create-form" novalidate>
        <?php echo e(csrf_field()); ?>


        <?php echo $tabs->render(compact('product')); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('product::admin.products.partials.shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>