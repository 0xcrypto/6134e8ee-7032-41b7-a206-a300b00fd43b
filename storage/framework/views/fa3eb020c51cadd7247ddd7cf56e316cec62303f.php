<ul>
    <?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="<?php echo e(request('category') === $subCategory->slug ? 'active' : ''); ?>">
            <a href="<?php echo e(request()->fullUrlWithQuery(['category' => $subCategory->slug])); ?>">
                <?php echo e($subCategory->name); ?>

            </a>

            <?php if($subCategory->items->isNotEmpty()): ?>
                <?php echo $__env->make('public.products.partials.sub_category_filter', ['subCategories' => $subCategory->items], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
