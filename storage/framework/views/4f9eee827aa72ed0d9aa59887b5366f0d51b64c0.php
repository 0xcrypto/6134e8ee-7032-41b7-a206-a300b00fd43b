<div class="search-area pull-left">
    <form action="<?php echo e(route('products.index')); ?>" method="GET" id="search-box-form">
        <div class="search-box hidden-sm hidden-xs">
            <input type="text" name="query" class="search-box-input" placeholder="<?php echo e(trans('storefront::layout.search_for_products')); ?>" value="<?php echo e(request('query')); ?>">

            <div class="search-box-button">
                <button class="search-box-btn btn btn-primary" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <?php echo e(trans('storefront::layout.search')); ?>

                </button>

                <select name="category" class="select search-box-select custom-select-black">
                    <option value="" selected><?php echo e(trans('storefront::layout.all_categories')); ?></option>

                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->slug); ?>" <?php echo e(request('category') === $category->slug ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="mobile-search visible-sm visible-xs">
            <div class="dropdown">
                <div class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div>

                <div class="dropdown-menu">
                    <div class="search-box">
                        <input type="search" name="query" class="search-box-input" placeholder="<?php echo e(trans('storefront::layout.search_for_products')); ?>">

                        <div class="search-box-button">
                            <button type="submit" class="search-box-btn btn btn-primary">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
