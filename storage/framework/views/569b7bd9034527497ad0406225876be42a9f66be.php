<button type="button" class="btn-close" data-dismiss="modal">
    &times;
</button>

<div class="quick-view clearfix">
    <div class="col-md-4 col-sm-7">
        <div class="quick-view-image">
            <div class="base-image">
                <?php if(! $product->base_image->exists): ?>
                    <div class="image-placeholder">
                        <i class="fa fa-picture-o"></i>
                    </div>
                <?php else: ?>
                    <a class="base-image-inner" href="<?php echo e($product->base_image->path); ?>">
                        <img src="<?php echo e($product->base_image->path); ?>">

                        <span><i class="fa fa-search-plus" aria-hidden="true"></i></span>
                    </a>
                <?php endif; ?>

                <?php $__currentLoopData = $product->additional_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $additionalImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(! $additionalImage->exists): ?>
                        <div class="image-placeholder">
                            <i class="fa fa-picture-o"></i>
                        </div>
                    <?php else: ?>
                        <a class="base-image-inner" href="<?php echo e($additionalImage->path); ?>">
                            <img src="<?php echo e($additionalImage->path); ?>">

                            <span><i class="fa fa-search-plus" aria-hidden="true"></i></span>
                        </a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="additional-image">
                <?php if(! $product->base_image->exists): ?>
                    <div class="image-placeholder">
                        <i class="fa fa-picture-o"></i>
                    </div>
                <?php else: ?>
                    <div class="thumb-image">
                        <img src="<?php echo e($product->base_image->path); ?>">
                    </div>
                <?php endif; ?>

                <?php $__currentLoopData = $product->additional_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $additionalImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(! $additionalImage->exists): ?>
                        <div class="image-placeholder">
                            <i class="fa fa-picture-o"></i>
                        </div>
                    <?php else: ?>
                        <div class="thumb-image">
                            <img src="<?php echo e($additionalImage->path); ?>">
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="quick-view-details">
            <div class="product-details text-left">
                <h2 class="product-name"><?php echo e($product->name); ?></h2>

                <?php if(setting('reviews_enabled')): ?>
                    <?php echo $__env->make('public.products.partials.product.rating', ['rating' => $product->avgRating()], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <span class="product-review">
                        (<?php echo e(intl_number($product->reviews->count())); ?> <?php echo e(trans('storefront::product.customer_reviews')); ?>)
                    </span>
                <?php endif; ?>

                <?php if (! (is_null($product->sku))): ?>
                    <div class="sku">
                        <label><?php echo e(trans('storefront::product.sku')); ?>: </label>
                        <span><?php echo e($product->sku); ?></span>
                    </div>
                <?php endif; ?>

                <?php if($product->manage_stock): ?>
                    <span class="left-in-stock">
                        <?php echo e(trans('storefront::product.only')); ?>

                        <span class="<?php echo e($product->qty > 0 ? 'green' : 'red'); ?>"><?php echo e(intl_number($product->qty)); ?></span>
                        <?php echo e(trans('storefront::product.left')); ?>

                    </span>
                <?php endif; ?>

                <div class="clearfix"></div>

                <h4 class="product-price pull-left"><?php echo e(product_price($product)); ?></h4>

                <div class="availability pull-left">
                    <label><?php echo e(trans('storefront::product.availability')); ?>:</label>

                    <?php if($product->in_stock): ?>
                        <span class="in-stock"><?php echo e(trans('storefront::product.in_stock')); ?></span>
                    <?php else: ?>
                        <span class="out-of-stock"><?php echo e(trans('storefront::product.out_of_stock')); ?></span>
                    <?php endif; ?>
                </div>

                <div class="clearfix"></div>

                <?php if(! is_null($product->short_description)): ?>
                    <div class="product-brief"><?php echo e($product->short_description); ?></div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('cart.items.store')); ?>" class="clearfix">
                    <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                    <div class="product-variants clearfix">
                        <?php $__currentLoopData = $product->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="row">
                                <div class="col-sm-8 col-xs-10">
                                    <?php if ($__env->exists("public.products.partials.product.options.{$option->type}")) echo $__env->make("public.products.partials.product.options.{$option->type}", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="quantity pull-left clearfix">
                        <label class="pull-left" for="qty"><?php echo e(trans('storefront::product.qty')); ?></label>

                        <div class="input-group-quantity pull-left clearfix">
                            <input type="text" name="qty" value="1" class="input-number input-quantity pull-left" id="qty" min="1" max="<?php echo e($product->manage_stock ? $product->qty : ''); ?>">

                            <span class="pull-left btn-wrapper">
                                <button type="button" class="btn btn-number btn-plus" data-type="plus"> + </button>
                                <button type="button" class="btn btn-number btn-minus" data-type="minus" disabled> &#8211; </button>
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="add-to-cart btn btn-primary pull-left" <?php echo e($product->isOutOfStock() ? 'disabled' : ''); ?> data-loading>
                        <?php echo e(trans('storefront::product.add_to_cart')); ?>

                    </button>
                </form>

                <div class="clearfix"></div>

                <div class="add-to clearfix">
                    <form method="POST" action="<?php echo e(route('compare.store')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                        <button type="submit"><?php echo e(trans('storefront::product.add_to_compare')); ?></button>
                    </form>

                    <form method="POST" action="<?php echo e(route('wishlist.store')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                        <button type="submit"><?php echo e(trans('storefront::product.add_to_wishlist')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
