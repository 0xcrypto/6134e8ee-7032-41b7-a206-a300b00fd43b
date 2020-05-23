<?php if($categories->isNotEmpty()): ?>
    <div class="filter-section clearfix">
        <h4><?php echo e(trans('storefront::products.category')); ?></h4>

        <ul class="filter-category list-inline">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="<?php echo e(request('category') === $category->slug ? 'active' : ''); ?>">
                    <a href="<?php echo e(request()->fullUrlWithQuery(['category' => $category->slug, 'page' => 1])); ?>">
                        <?php echo e($category->name); ?>

                    </a>

                    <?php if($category->items->isNotEmpty()): ?>
                        <?php echo $__env->make('public.products.partials.sub_category_filter', ['subCategories' => $category->items], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
