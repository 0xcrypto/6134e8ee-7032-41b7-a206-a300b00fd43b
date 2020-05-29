<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.create', ['resource' => trans('storeunit::store_units.store_unit')])); ?>

    <li><a href="<?php echo e(route('admin.store_units.index')); ?>"><?php echo e(trans('storeunit::store_units.store_units')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.create', ['resource' => trans('storeunit::store_units.store_unit')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.store_units.store')); ?>" class="form-horizontal" id="storeunit-create-form" novalidate>
        <?php echo e(csrf_field()); ?>


        <?php echo $tabs->render(compact('storeUnit')); ?>

        
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storeunit::admin.store_units.partials.shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>