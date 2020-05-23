<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.edit', ['resource' => trans('attribute::admin.attribute')])); ?>
    <?php $__env->slot('subtitle', $attribute->name); ?>

    <li><a href="<?php echo e(route('admin.attributes.index')); ?>"><?php echo e(trans('attribute::admin.attributes')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.edit', ['resource' => trans('attribute::admin.attribute')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.attributes.update', $attribute)); ?>" class="form-horizontal" id="attribute-edit-form" novalidate>
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field('put')); ?>


        <?php echo $tabs->render(compact('attribute')); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('attribute::admin.attributes.partials.shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>