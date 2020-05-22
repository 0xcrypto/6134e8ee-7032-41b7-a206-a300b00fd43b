<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.create', ['resource' => trans('attribute::admin.attribute')])); ?>

    <li><a href="<?php echo e(route('admin.attributes.index')); ?>"><?php echo e(trans('attribute::admin.attributes')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.create', ['resource' => trans('attribute::admin.attribute')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.attributes.store')); ?>" class="form-horizontal" id="attribute-create-form" novalidate>
        <?php echo e(csrf_field()); ?>



        <?php echo $tabs->render(compact('attribute')); ?>



    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('attribute::admin.attributes.partials.shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>