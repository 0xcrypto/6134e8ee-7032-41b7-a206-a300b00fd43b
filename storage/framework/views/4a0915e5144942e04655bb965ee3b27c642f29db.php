<?php $__env->startSection('title', setting('store_tagline')); ?>

<?php $__env->startSection('content'); ?>
    <?php if (! (is_null($slider))): ?>
        <?php if(storefront_layout() === 'default'): ?>
            <div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3">
                <div class="row">
                    <?php echo $__env->make('public.home.sections.slider', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
            <div class="clearfix"></div>
        <?php elseif(storefront_layout() === 'slider_with_banners'): ?>
            <div class="row">
                <div class="col-md-9">
                    <?php echo $__env->make('public.home.sections.slider', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>

                <div class="col-md-3 hidden-sm hidden-xs">
                    <?php echo $__env->make('public.home.sections.slider_banners', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php echo $__env->make('public.partials.notification', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if(setting('storefront_features_section_enabled')): ?>
        <?php echo $__env->make('public.home.sections.features', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if(setting('storefront_banner_section_1_enabled')): ?>
        <?php echo $__env->make('public.home.sections.banner_section_1', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if(setting('storefront_product_carousel_section_enabled')): ?>
        <?php echo $__env->make('public.home.sections.product_carousel', [
            'title' => setting('storefront_product_carousel_section_title'),
            'products' => $carouselProducts
        ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if(setting('storefront_recent_products_section_enabled')): ?>
        <?php echo $__env->make('public.home.sections.recent_products', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if(setting('storefront_banner_section_2_enabled')): ?>
        <?php echo $__env->make('public.home.sections.banner_section_2', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if(setting('storefront_three_column_vertical_product_carousel_section_enabled')): ?>
        <?php echo $__env->make('public.home.sections.three_column_vertical_product_carousel', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if(setting('storefront_landscape_products_section_enabled')): ?>
        <?php echo $__env->make('public.products.partials.landscape_products', [
            'title' => setting('storefront_landscape_products_section_title'),
            'products' => $landscapeProducts
        ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if(setting('storefront_banner_section_3_enabled')): ?>
        <?php echo $__env->make('public.home.sections.banner_section_3', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if(setting('storefront_product_tabs_section_enabled')): ?>
        <?php echo $__env->make('public.home.sections.product_tabs', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if(setting('storefront_two_column_product_carousel_section_enabled')): ?>
        <?php echo $__env->make('public.home.sections.two_column_product_carousel', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if(setting('storefront_recently_viewed_section_enabled')): ?>
        <?php echo $__env->make('public.products.partials.landscape_products', [
            'title' => setting('storefront_recently_viewed_section_title'),
            'products' => $recentlyViewedProducts
        ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>