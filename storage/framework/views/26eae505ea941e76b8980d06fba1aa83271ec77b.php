<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startPush('meta'); ?>
    <meta name="title" content="<?php echo e($product->meta->meta_title); ?>">
    <meta name="keywords" content="<?php echo e(implode(',', $product->meta->meta_keywords)); ?>">
    <meta name="description" content="<?php echo e($product->meta->meta_description); ?>">
    <meta property="og:title" content="<?php echo e($product->meta->meta_title); ?>">
    <meta property="og:description" content="<?php echo e($product->meta->meta_description); ?>">
    <meta property="og:image" content="<?php echo e($product->baseImage->path); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li><a href="<?php echo e(route('products.index')); ?>"><?php echo e(trans('storefront::products.shop')); ?></a></li>
    <li class="active"><?php echo e($product->name); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="product-details-wrapper">
        <div class="row">
            <?php echo $__env->make('public.products.partials.product.images', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('public.products.partials.product.details', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tab product-tab clearfix">
                    <ul class="nav nav-tabs">
                        <li class="<?php echo e(request()->has('reviews') || review_form_has_error($errors) ? '' : 'active'); ?>">
                            <a data-toggle="tab" href="#description"><?php echo e(trans('storefront::product.tabs.description')); ?></a>
                        </li>

                        <?php if($product->hasAnyAttribute()): ?>
                            <li>
                                <a data-toggle="tab" href="#additional-information"><?php echo e(trans('storefront::product.tabs.additional_information')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if(setting('reviews_enabled')): ?>
                            <li class="<?php echo e(request()->has('reviews') || review_form_has_error($errors) ? 'active' : ''); ?> <?php echo e(review_form_has_error($errors) ? 'error' : ''); ?>">
                                <a data-toggle="tab" href="#reviews"><?php echo e(trans('storefront::product.tabs.reviews')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>

                    <div class="tab-content">
                        <?php echo $__env->make('public.products.partials.product.tab_contents.description', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <?php if($product->hasAnyAttribute()): ?>
                            <?php echo $__env->make('public.products.partials.product.tab_contents.additional_information', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endif; ?>

                        <?php echo $__env->renderWhen(setting('reviews_enabled'), 'public.products.partials.product.tab_contents.reviews', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path'))); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('public.products.partials.landscape_products', [
        'title' => trans('storefront::product.related_products'),
        'products' => $relatedProducts
    ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('public.products.partials.landscape_products', [
        'title' => trans('storefront::product.you_might_also_like'),
        'products' => $upSellProducts
    ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>