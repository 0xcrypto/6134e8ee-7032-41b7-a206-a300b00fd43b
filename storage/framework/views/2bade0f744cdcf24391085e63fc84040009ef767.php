<?php $__env->startSection('title', trans('storefront::404.not_found')); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-error clearfix">
        <span>40<span>4</span></span>

        <div class="col-md-4 col-md-offset-4">
            <div class="error-text text-center">
                <h1><?php echo e(trans('storefront::404.oops')); ?></h1>
                <h4><?php echo e(trans('storefront::404.the_page_not_found')); ?></h4>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>