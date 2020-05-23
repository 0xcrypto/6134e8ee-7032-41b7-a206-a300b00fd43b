<div class="col-lg-4 col-md-5">
    <div class="rating">
        <div class="average-rating clearfix">
            <div class="average">
                <span><?php echo e(intl_number($product->avgRating())); ?></span>
            </div>

            <?php echo $__env->make('public.products.partials.product.rating', ['rating' => $product->avgRating()], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <span class="rate-of-average">
                <?php echo e(intl_number($product->avgRating())); ?> <?php echo e(trans('storefront::product.reviews.out_of_5')); ?>

            </span>

            <span class="reviews-total"><?php echo e(intl_number($product->reviews->count())); ?> <?php echo e(trans('storefront::product.customer_reviews')); ?></span>
        </div>

        <div class="rating-bars-wrapper clearfix">
            <div class="rating-bar">
                <span class="rating-label"><?php echo e(trans('storefront::product.reviews.5_star')); ?></span>

                <div class="progress">
                    <div class="progress-bar" style="width: <?php echo e($ratedFiveTimes = $product->percentageReviewsForStar(5)); ?>%"></div>
                </div>

                <span class="rating-percentage"><?php echo e(intl_number($ratedFiveTimes)); ?>%</span>
            </div>

            <div class="rating-bar">
                <span class="rating-label"><?php echo e(trans('storefront::product.reviews.4_star')); ?></span>

                <div class="progress">
                    <div class="progress-bar" style="width: <?php echo e($ratedFourTimes = $product->percentageReviewsForStar(4)); ?>%"></div>
                </div>

                <span class="rating-percentage"><?php echo e(intl_number($ratedFourTimes)); ?>%</span>
            </div>

            <div class="rating-bar">
                <span class="rating-label"><?php echo e(trans('storefront::product.reviews.3_star')); ?></span>

                <div class="progress">
                    <div class="progress-bar" style="width: <?php echo e($ratedThreeTimes = $product->percentageReviewsForStar(3)); ?>%"></div>
                </div>

                <span class="rating-percentage"><?php echo e(intl_number($ratedThreeTimes)); ?>%</span>
            </div>

            <div class="rating-bar">
                <span class="rating-label"><?php echo e(trans('storefront::product.reviews.2_star')); ?></span>

                <div class="progress">
                    <div class="progress-bar" style="width: <?php echo e($ratedTwoTimes = $product->percentageReviewsForStar(2)); ?>%"></div>
                </div>

                <span class="rating-percentage"><?php echo e(intl_number($ratedTwoTimes)); ?>%</span>
            </div>

            <div class="rating-bar">
                <span class="rating-label"><?php echo e(trans('storefront::product.reviews.1_star')); ?></span>

                <div class="progress">
                    <div class="progress-bar" style="width: <?php echo e($ratedOneTimes = $product->percentageReviewsForStar(1)); ?>%"></div>
                </div>

                <span class="rating-percentage"><?php echo e(intl_number($ratedOneTimes)); ?>%</span>
            </div>
        </div>
    </div>
</div>
