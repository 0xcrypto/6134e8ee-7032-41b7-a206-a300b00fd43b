<?php if (! empty(trim($__env->yieldContent('breadcrumb')))): ?>
    <div class="breadcrumb">
        <ul class="list-inline">
            <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>

            <?php echo $__env->yieldContent('breadcrumb'); ?>
        </ul>
    </div>
<?php endif; ?>
