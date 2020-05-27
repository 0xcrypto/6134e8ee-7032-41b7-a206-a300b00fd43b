<div class="top-nav">
    <div class="container">
        <div class="top-nav-wrapper clearfix">
            <div class="top-nav-left pull-left">
                <ul class="list-inline">
                    <?php if(count(setting('supported_currencies')) > 1): ?>
                        <li>
                            <select class="top-nav-select custom-select-white" onchange="location = this.value">
                                <?php $__currentLoopData = setting('supported_currencies'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(route('current_currency.store', ['currency' => $currency])); ?>" <?php echo e(currency() === $currency ? 'selected' : ''); ?>>
                                        <?php echo e($currency); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </li>
                    <?php endif; ?>

                    <?php if(count(supported_locales()) > 1): ?>
                        <li>
                            <select class="top-nav-select custom-select-white" onchange="location = this.value">
                                <?php $__currentLoopData = supported_locales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(localized_url($locale)); ?>" <?php echo e(locale() === $locale ? 'selected' : ''); ?>>
                                        <?php echo e($language['name']); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="top-nav-right pull-right">
                <ul class="list-inline">
                    <li><a href="<?php echo e(route('contact.create')); ?>"><?php echo e(trans('storefront::contact.contact')); ?></a></li>

                    <li>
                        <a href="<?php echo e(route('compare.index')); ?>">
                            <?php echo e(trans('storefront::layout.compare')); ?> (<?php echo e($compareCount); ?>)
                        </a>
                    </li>

                    <?php if(auth()->guard()->check()): ?>
                        <li><a href="<?php echo e(route('account.wishlist.index')); ?>"><?php echo e(trans('storefront::account.links.my_wishlist')); ?></a></li>
                        <li><a href="<?php echo e(route('account.dashboard.index')); ?>"><?php echo e(trans('storefront::account.links.my_account')); ?></a></li>
                    <?php else: ?>
                        <li><a href="<?php echo e(route('login')); ?>"><?php echo e(trans('storefront::layout.log_in')); ?></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
