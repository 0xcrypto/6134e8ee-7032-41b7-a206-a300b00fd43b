<a href="<?php echo e(route('products.show', $product->slug)); ?>" class="product-card">
    <div class="product-card-inner">
        <div class="product-image clearfix">
            <ul class="product-ribbon list-inline">
                <?php if($product->isOutOfStock()): ?>
                    <li><span class="ribbon bg-red"><?php echo e(trans('storefront::product_card.out_of_stock')); ?></span></li>
                <?php endif; ?>

                <?php if($product->isNew()): ?>
                    <li><span class="ribbon bg-green"><?php echo e(trans('storefront::product_card.new')); ?></span></li>
                <?php endif; ?>
            </ul>

            <?php if(! $product->base_image->exists): ?>
                <div class="image-placeholder">
                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                </div>
            <?php else: ?>
                <div class="image-holder">
                    <img src="<?php echo e($product->base_image->path); ?>">
                </div>
            <?php endif; ?>

            <div class="quick-view-wrapper" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('storefront::product_card.quick_view')); ?>">
                <button type="button" class="btn btn-quick-view" data-slug="<?php echo e($product->slug); ?>">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <div class="product-content clearfix">
            <span class="product-price"><?php echo e(product_price($product)); ?></span>
            <span class="product-name"><?php echo e($product->name); ?></span>
        </div>

        <div class="add-to-actions-wrapper">
            <form method="POST" action="<?php echo e(route('wishlist.store')); ?>">
                <?php echo e(csrf_field()); ?>


                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                <button type="submit" class="btn btn-wishlist" data-toggle="tooltip" data-placement="<?php echo e(is_rtl() ? 'left' : 'right'); ?>" title="<?php echo e(trans('storefront::product_card.add_to_wishlist')); ?>">
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                </button>
            </form>

            <?php if($product->options_count > 0): ?>
                <button class="btn btn-default btn-add-to-cart" onClick="location = '<?php echo e(route('products.show', ['slug' => $product->slug])); ?>'">
                    <?php echo e(trans('storefront::product_card.view_details')); ?>

                </button>
            <?php else: ?>
                <form method="POST" action="<?php echo e(route('cart.items.store')); ?>">
                    <?php echo e(csrf_field()); ?>


                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                    <input type="hidden" name="qty" value="1">

                    <button class="btn btn-default btn-add-to-cart" <?php echo e($product->isOutOfStock() ? 'disabled' : ''); ?>>
                        <?php echo e(trans('storefront::product_card.add_to_cart')); ?>

                    </button>
                </form>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('compare.store')); ?>">
                <?php echo e(csrf_field()); ?>


                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                <button type="submit" class="btn btn-compare" data-toggle="tooltip" data-placement="<?php echo e(is_rtl() ? 'right' : 'left'); ?>" title="<?php echo e(trans('storefront::product_card.add_to_compare')); ?>">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </div>
</a>
