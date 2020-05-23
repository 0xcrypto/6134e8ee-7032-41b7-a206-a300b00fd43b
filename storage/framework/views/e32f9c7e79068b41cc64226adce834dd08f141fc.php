<div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
    <div class="product-details">
        <h1 class="product-name"><?php echo e($product->name); ?></h1>

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

        <span class="product-price pull-left"><?php echo e(product_price($product)); ?></span>

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
                        <div class="col-md-7 col-sm-9 col-xs-10">
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
            <form method="POST" action="<?php echo e(route('wishlist.store')); ?>">
                <?php echo e(csrf_field()); ?>


                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                <button type="submit"><?php echo e(trans('storefront::product.add_to_wishlist')); ?></button>
            </form>

            <form method="POST" action="<?php echo e(route('compare.store')); ?>">
                <?php echo e(csrf_field()); ?>


                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                <button type="submit"><?php echo e(trans('storefront::product.add_to_compare')); ?></button>
            </form>
        </div>
    </div>
</div>
