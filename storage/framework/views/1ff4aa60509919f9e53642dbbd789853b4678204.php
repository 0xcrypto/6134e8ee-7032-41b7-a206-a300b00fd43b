<?php if($categoryMenu->menus()->isNotEmpty() || $primaryMenu->menus()->isNotEmpty()): ?>
    <div class="megamenu-wrapper hidden-xs">
        <div class="container">
            <nav class="navbar navbar-default">
                <?php echo $__env->make('public.partials.category_menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('public.partials.primary_menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </nav>
        </div>
    </div>
<?php endif; ?>
