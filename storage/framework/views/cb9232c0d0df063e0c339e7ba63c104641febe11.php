<div id="reviews" class="reviews tab-pane fade in clearfix <?php echo e(request()->has('reviews') || review_form_has_error($errors) ? 'active' : ''); ?>">
    <div class="row">
        <?php echo $__env->make('public.products.partials.product.reviews.ratings_overview', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="col-lg-8 col-md-7">
            <div class="user-review clearfix">
                <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="comment">
                        <div class="comment-details">
                            <h5 class="user-name"><?php echo e($review->reviewer_name); ?></h5>

                            <span class="time" data-toggle="tooltip" title="<?php echo e($review->created_at->toFormattedDateString()); ?>">
                                <?php echo e($review->created_at->diffForHumans()); ?>

                            </span>

                            <?php echo $__env->make('public.products.partials.product.rating', ['rating' => $review->rating], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <p class="user-text"><?php echo e($review->comment); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <h3><?php echo e(trans('storefront::product.reviews.there_are_no_reviews_for_this_product')); ?></h3>
                <?php endif; ?>

                <div class="pull-right">
                    <?php echo $reviews->links(); ?>

                </div>
            </div>

            <div class="review-form clearfix">
                <form method="POST" action="<?php echo e(route('products.reviews.store', $product)); ?>" class="clearfix">
                    <?php echo e(csrf_field()); ?>


                    <h3><?php echo e(trans('storefront::product.reviews.add_a_review')); ?></h3>

                    <span>
                        <?php echo e(trans('storefront::product.reviews.your_rating')); ?>

                        <span class="rating-required">*</span>
                    </span>

                    <div class="clearfix"></div>

                    <fieldset class="rating">
                        <input type="radio" id="star-5" name="rating" value="5">
                        <label class="full" for="star-5" data-toggle="tooltip" title="<?php echo e(trans('storefront::product.reviews.5_star')); ?>"></label>

                        <input type="radio" id="star-4" name="rating" value="4">
                        <label class="full" for="star-4" data-toggle="tooltip" title="<?php echo e(trans('storefront::product.reviews.4_star')); ?>"></label>

                        <input type="radio" id="star-3" name="rating" value="3">
                        <label class="full" for="star-3" data-toggle="tooltip" title="<?php echo e(trans('storefront::product.reviews.3_star')); ?>"></label>

                        <input type="radio" id="star-2" name="rating" value="2">
                        <label class="full" for="star-2" data-toggle="tooltip" title="<?php echo e(trans('storefront::product.reviews.2_star')); ?>"></label>

                        <input type="radio" id="star-1" name="rating" value="1">
                        <label class="full" for="star-1" data-toggle="tooltip" title="<?php echo e(trans('storefront::product.reviews.1_star')); ?>"></label>
                    </fieldset>

                    <?php echo $errors->first('rating', '<p class="help-block">:message</p>'); ?>


                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group <?php echo e($errors->has('reviewer_name') ? 'has-error' : ''); ?>">
                                <label for="reviewer-name">
                                    <?php echo e(trans('storefront::product.reviews.reviewer_name')); ?><span>*</span>
                                </label>

                                <input type="text" name="reviewer_name" class="form-control" id="reviewer-name" value="<?php echo e(old('reviewer_name', auth()->user()->full_name ?? '')); ?>">

                                <?php echo $errors->first('reviewer_name', '<p class="help-block">:message</p>'); ?>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group <?php echo e($errors->has('comment') ? 'has-error' : ''); ?>">
                                <label for="comment">
                                    <?php echo e(trans('storefront::product.reviews.your_review')); ?><span>*</span>
                                </label>

                                <textarea name="comment" class="form-control" id="comment" cols="30" rows="10"><?php echo e(old('comment')); ?></textarea>

                                <?php if($errors->has('comment')): ?>
                                    <?php echo $errors->first('comment', '<p class="help-block">:message</p>'); ?>

                                <?php else: ?>
                                    <p class="help-block">
                                        <span class="note"><?php echo e(trans('storefront::product.reviews.note')); ?></span>
                                        <?php echo e(trans('storefront::product.reviews.html_is_not_translated')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-12">
                            <div class="form-group <?php echo e($errors->has('captcha') ? 'has-error': ''); ?>">
                                <?php echo Igoshev\Captcha\Facades\Captcha::getView() ?>
                                <input type="text" name="captcha" id="captcha" class="captcha-input">

                                <?php echo $errors->first('captcha', '<span class="error-message">:message</span>'); ?>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary review-submit" data-loading>
                            <?php echo e(trans('storefront::product.reviews.add_review')); ?>

                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
