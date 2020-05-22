<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.create', ['resource' => trans('tax::taxes.tax')])); ?>

    <li><a href="<?php echo e(route('admin.taxes.index')); ?>"><?php echo e(trans('tax::taxes.taxes')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.create', ['resource' => trans('tax::taxes.tax')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.taxes.store')); ?>" class="form-horizontal" id="tax-create-form" novalidate>
        <?php echo e(csrf_field()); ?>


        <?php echo $tabs->render(compact('taxClass')); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tax::admin.taxes.partials.shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>