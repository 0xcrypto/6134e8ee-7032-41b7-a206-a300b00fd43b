<section class="section-wrapper clearfix">
    <div class="row">
        <?php if($twoColumnCarouselProducts['column_1']->isNotEmpty()): ?>
            <div class="col-md-4">
                <?php echo $__env->make('public.home.sections.partials.vertical_products', ['title' => setting('storefront_two_column_product_carousel_section_column_1_title'), 'products' => $twoColumnCarouselProducts['column_1']], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        <?php endif; ?>

        <?php if($twoColumnCarouselProducts['column_2']->isNotEmpty()): ?>
            <div class="col-md-8">
                <div class="product-slider-wrapper-2">
                    <div class="section-header">
                        <h3><?php echo e(setting('storefront_two_column_product_carousel_section_column_2_title')); ?></h3>
                    </div>

                    <div class="row">
                        <div class="product-slider-2 slick-arrow separator clearfix">
                            <?php $__currentLoopData = $twoColumnCarouselProducts['column_2']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-3">
                                    <?php echo $__env->make('public.products.partials.product_card', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
