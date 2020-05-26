<footer class="footer">
    <div class="container">
        <div class="footer-top p-tb-50 clearfix">
            <div class="row">
                <div class="col-md-4">
                    <a href="<?php echo e(route('home')); ?>" class="footer-logo">
                        <?php if(is_null($footerLogo)): ?>
                            <h2><?php echo e(setting('store_name')); ?></h2>
                        <?php else: ?>
                            <img src="<?php echo e($footerLogo); ?>" class="img-responsive" alt="footer-logo">
                        <?php endif; ?>
                    </a>

                    <div class="clearfix"></div>

                    <p class="footer-brief"><?php echo e(setting('store_tagline')); ?></p>

                    <?php if(setting('store_phone') || setting('store_email') || setting('storefront_footer_address')): ?>
                        <div class="contact">
                            <ul class="list-inline">
                                <?php if(setting('store_phone')): ?>
                                    <li>
                                        <i class="fa fa-phone-square" aria-hidden="true"></i>
                                        <span class="contact-info"><?php echo e(setting('store_phone')); ?></span>
                                    </li>
                                <?php endif; ?>

                                <?php if(setting('store_email')): ?>
                                    <li>
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        <span class="contact-info"><?php echo e(setting('store_email')); ?></span>
                                    </li>
                                <?php endif; ?>

                                <?php if(setting('storefront_footer_address')): ?>
                                    <li>
                                        <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                        <span class="contact-info"><?php echo e(setting('storefront_footer_address')); ?></span>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-8">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="links">
                                <div class="mobile-collapse">
                                    <h4><?php echo e(trans('storefront::account.links.my_account')); ?></h4>
                                </div>

                                <ul class="list-inline">
                                    <li><a href="<?php echo e(route('account.dashboard.index')); ?>"><?php echo e(trans('storefront::account.links.dashboard')); ?></a></li>
                                    <li><a href="<?php echo e(route('account.orders.index')); ?>"><?php echo e(trans('storefront::account.links.my_orders')); ?></a></li>
                                    <li><a href="<?php echo e(route('account.reviews.index')); ?>"><?php echo e(trans('storefront::account.links.my_reviews')); ?></a></li>
                                    <li><a href="<?php echo e(route('account.profile.edit')); ?>"><?php echo e(trans('storefront::account.links.my_profile')); ?></a></li>

                                    <?php if(auth()->guard()->check()): ?>
                                        <li><a href="<?php echo e(route('logout')); ?>"><?php echo e(trans('storefront::account.links.logout')); ?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <?php if($footerMenu->isNotEmpty()): ?>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="links">
                                    <div class="mobile-collapse">
                                        <h4><?php echo e(setting('storefront_footer_menu_title')); ?></h4>
                                    </div>

                                    <ul class="list-inline">
                                        <?php $__currentLoopData = $footerMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menuItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><a href="<?php echo e($menuItem->url()); ?>"><?php echo e($menuItem->name); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php if($socialLinks->isNotEmpty()): ?>
            <div class="footer-middle p-tb-30 clearfix">
                <ul class="social-links list-inline">
                    <?php $__currentLoopData = $socialLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(! is_null($link)): ?>
                            <li><a href="<?php echo e($link); ?>"><i class="fa fa-<?php echo e($icon); ?>" aria-hidden="true"></i></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <div class="footer-bottom p-tb-20 clearfix">
        <div class="container">
            <div class="copyright text-center">
                <?php echo $copyrightText; ?>

            </div>
        </div>
    </div>
</footer>
