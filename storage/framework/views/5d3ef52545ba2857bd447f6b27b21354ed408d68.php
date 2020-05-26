<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.create', ['resource' => trans('storeunit::storeunits.storeunit')])); ?>

    <li><a href="<?php echo e(route('admin.storeunits.index')); ?>"><?php echo e(trans('storeunit::storeunits.storeunits')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.create', ['resource' => trans('storeunit::storeunits.storeunit')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.storeunits.store')); ?>" class="form-horizontal" id="storeunit-create-form" novalidate>
        <?php echo e(csrf_field()); ?>


        <?php echo $tabs->render(compact('storeunit')); ?>

        
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('storeunit::admin.storeunits.partials.shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>