<div class="user-cart pull-right">
    <div class="dropdown">
        <div class="user-cart-inner dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-shopping-bag pull-left" aria-hidden="true"></i>

            <span class="cart-count"><?php echo e($cart->quantity()); ?></span>

            <div class="cart-amount hidden-sm hidden-xs pull-left">
                <span class="cart-label"><?php echo e(trans('storefront::layout.mini_cart.my_cart')); ?></span>
                <br>
                <span class="cart-price"><?php echo e($cart->subTotal()->convertToCurrentCurrency()->format()); ?></span>
            </div>
        </div>

        <div class="dropdown-menu">
            <h5 class="mini-cart-title"><?php echo e(trans('storefront::layout.mini_cart.my_cart')); ?></h5>

            <div class="mini-cart">
                <?php if($cart->isEmpty()): ?>
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <h3 class="empty-cart"><?php echo e(trans('storefront::layout.mini_cart.your_cart_is_empty')); ?></h3>
                <?php else: ?>
                    <?php $__currentLoopData = $cart->items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mini-cart-item clearfix">
                            <div class="mini-cart-image">
                                <?php if(! $cartItem->product->base_image->exists): ?>
                                    <div class="image-placeholder">
                                        <i class="fa fa-picture-o"></i>
                                    </div>
                                <?php else: ?>
                                    <img src="<?php echo e($cartItem->product->base_image->path); ?>">
                                <?php endif; ?>
                            </div>

                            <div class="mini-cart-details clearfix">
                                <a class="product-name" href="<?php echo e(route('products.show', $cartItem->product->slug)); ?>">
                                    <?php echo e($cartItem->product->name); ?>

                                </a>

                                <?php if($cartItem->options->isNotEmpty()): ?>
                                    <div class="mini-cart-variants dropdown pull-left">
                                        <div class="dropdown-toggle" data-toggle="dropdown">
                                            <?php echo e($cartItem->options->first()->name); ?>: <span><?php echo e($cartItem->options->first()->values->implode('label', ', ')); ?></span>

                                            <?php if($cartItem->options->slice(1)->isNotEmpty()): ?>
                                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            <?php endif; ?>
                                        </div>

                                        <?php if($cartItem->options->count() > 1): ?>
                                            <ul class="dropdown-menu">
                                                <?php $__currentLoopData = $cartItem->options->slice(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <?php echo e($option->name); ?>: <span><?php echo e($option->values->implode('label', ', ')); ?></span>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <span class="product-price pull-right">
                                    <?php echo e($cartItem->unitPrice()->convertToCurrentCurrency()->format()); ?>

                                </span>

                                <span class="product-quantity pull-right">
                                    <?php echo e($cartItem->qty); ?> *
                                </span>

                                <form method="POST" action="<?php echo e(route('cart.items.destroy', encrypt($cartItem->id))); ?>" onsubmit="return confirm('<?php echo e(trans('cart::messages.confirm')); ?>');">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('delete')); ?>


                                    <button type="submit" class="btn-close" data-toggle="tooltip" data-placement="<?php echo e(is_rtl() ? 'right' : 'left'); ?>" title="<?php echo e(trans('storefront::layout.mini_cart.remove')); ?>">
                                        &times;
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>

            <?php if (! ($cart->isEmpty())): ?>
                <span class="subtotal">
                    <?php echo e(trans('storefront::layout.mini_cart.subtotal')); ?> <span><?php echo e($cart->subTotal()->convertToCurrentCurrency()->format()); ?></span>
                </span>

                <div class="mini-cart-buttons text-center">
                    <a href="<?php echo e(route('cart.index')); ?>" class="btn btn-primary btn-view-cart">
                        <?php echo e(trans('storefront::layout.mini_cart.view_cart')); ?>

                    </a>

                    <a href="<?php echo e(route('checkout.create')); ?>" class="btn btn-default btn-checkout">
                        <?php echo e(trans('storefront::layout.mini_cart.checkout')); ?>

                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
