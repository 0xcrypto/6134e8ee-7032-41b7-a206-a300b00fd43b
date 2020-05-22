<?php $__env->startComponent('admin::components.page.header'); ?>

    <?php $__env->slot('title', trans('admin::resource.create', ['resource' => trans('store::stores.store')])); ?>

    <li><a href="<?php echo e(route('admin.stores.index')); ?>"><?php echo e(trans('store::stores.stores')); ?></a></li>
    <li class="active"><?php echo e(trans('admin::resource.create', ['resource' => trans('store::stores.store')])); ?></li>
<?php echo $__env->renderComponent(); ?>

<?php $__env->startSection('content'); ?>
    
    <form method="POST" action="<?php echo e(route('admin.stores.store')); ?>" class="form-horizontal" id="store-create-form" novalidate>

        <?php echo e(csrf_field()); ?>


   		<?php echo $tabs->render(compact('store')); ?>


    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('store::admin.stores.partials.shortcuts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>