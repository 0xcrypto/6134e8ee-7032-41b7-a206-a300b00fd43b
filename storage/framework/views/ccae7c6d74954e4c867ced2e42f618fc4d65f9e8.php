<section class="header-wrapper">
    <div class="header-inner">
        <div class="container">
            <button class="navbar-toggle visible-sm visible-xs pull-left" type="button">
                <span class="top-bar icon-bar"></span>
                <span class="middle-bar icon-bar"></span>
                <span class="bottom-bar icon-bar"></span>
            </button>

            <a href="<?php echo e(route('home')); ?>" class="website-logo pull-left">
                <?php if(is_null($headerLogo)): ?>
                    <h2><?php echo e(setting('store_name')); ?></h2>
                <?php else: ?>
                    <img src="<?php echo e($headerLogo); ?>">
                <?php endif; ?>
            </a>

            <?php echo $__env->make('public.partials.mini_cart', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('public.partials.search_box', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
</section>
