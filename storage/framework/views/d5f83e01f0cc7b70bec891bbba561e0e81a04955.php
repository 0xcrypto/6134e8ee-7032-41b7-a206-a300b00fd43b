<?php $__env->startComponent('admin::components.page.header'); ?>
    <?php $__env->slot('title', trans('admin::resource.create', ['resource' => trans('attribute::attribute_sets.attribute_set')])); ?>

    <li><a href="<?php echo e(route('admin.attribute_sets.index')); ?>"><?php echo e(trans('attribute::attribute_sets.attribute_sets')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.create', ['resource' => trans('attribute::attribute_sets.attribute_set')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    <form method="POST" action="<?php echo e(route('admin.attribute_sets.store')); ?>" class="form-horizontal" id="attribute-set-create-form" novalidate>
        <?php echo e(csrf_field()); ?>


        <?php echo $tabs->render(compact('attributeSet')); ?>

    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('attribute::admin.attributes.partials.shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>