<?php $__env->startSection('title'); ?>
    <?php if(request()->has('query')): ?>
        <?php echo e(trans('storefront::products.search_results_for')); ?>: "<?php echo e(request('query')); ?>"
    <?php else: ?>
        <?php echo e(trans('storefront::products.shop')); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="product-list">
        <div class="row">
            <?php echo $__env->make('public.products.partials.filter', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="col-md-9 col-sm-12">
                <div class="product-list-header clearfix">
                    <div class="search-result-title pull-left">
                        <?php if(request()->has('query')): ?>
                            <h3><?php echo e(trans('storefront::products.search_results_for')); ?>: "<?php echo e(request('query')); ?>"</h3>
                        <?php else: ?>
                            <h3><?php echo e(trans('storefront::products.shop')); ?></h3>
                        <?php endif; ?>

                        <span><?php echo e(intl_number($products->total())); ?> <?php echo e(trans_choice('storefront::products.products_found', $products->total())); ?></span>
                    </div>

                    <div class="search-result-right pull-right">
                        <ul class="nav nav-tabs">
                            <li class="view-mode <?php echo e(($viewMode = request('viewMode', 'grid')) === 'grid' ? 'active' : ''); ?>">
                                <a href="<?php echo e($viewMode === 'grid' ? '#' : request()->fullUrlWithQuery(['viewMode' => 'grid'])); ?>" title="<?php echo e(trans('storefront::products.grid_view')); ?>">
                                    <i class="fa fa-th-large" aria-hidden="true"></i>
                                </a>
                            </li>

                            <li class="view-mode <?php echo e($viewMode === 'list' ? 'active' : ''); ?>">
                                <a href="<?php echo e($viewMode === 'list' ? '#' : request()->fullUrlWithQuery(['viewMode' => 'list'])); ?>" title="<?php echo e(trans('storefront::products.list_view')); ?>">
                                    <i class="fa fa-th-list" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>

                        <div class="form-group">
                            <select class="custom-select-black" onchange="location = this.value">
                                <option value="<?php echo e(request()->fullUrlWithQuery(['sort' => 'relevance'])); ?>" <?php echo e(($sortOption = request()->query('sort')) === 'relevance' ? 'selected' : ''); ?>>
                                    <?php echo e(trans('storefront::products.sort_options.relevance')); ?>

                                </option>

                                <option value="<?php echo e(request()->fullUrlWithQuery(['sort' => 'alphabetic'])); ?>" <?php echo e(($sortOption = request()->query('sort')) === 'alphabetic' ? 'selected' : ''); ?>>
                                    <?php echo e(trans('storefront::products.sort_options.alphabetic')); ?>

                                </option>

                                <option value="<?php echo e(request()->fullUrlWithQuery(['sort' => 'topRated'])); ?>" <?php echo e($sortOption === 'topRated' ? 'selected' : ''); ?>>
                                    <?php echo e(trans('storefront::products.sort_options.top_rated')); ?>

                                </option>

                                <option value="<?php echo e(request()->fullUrlWithQuery(['sort' => 'latest'])); ?>" <?php echo e($sortOption === 'latest' ? 'selected' : ''); ?>>
                                    <?php echo e(trans('storefront::products.sort_options.latest')); ?>

                                </option>

                                <option value="<?php echo e(request()->fullUrlWithQuery(['sort' => 'priceLowToHigh'])); ?>" <?php echo e($sortOption === 'priceLowToHigh' ? 'selected' : ''); ?>>
                                    <?php echo e(trans('storefront::products.sort_options.price_low_to_high')); ?>

                                </option>

                                <option value="<?php echo e(request()->fullUrlWithQuery(['sort' => 'priceHighToLow'])); ?>" <?php echo e($sortOption === 'priceHighToLow' ? 'selected' : ''); ?>>
                                    <?php echo e(trans('storefront::products.sort_options.price_high_to_low')); ?>

                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="product-list-result clearfix">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane <?php echo e(($viewMode = request('viewMode', 'grid')) === 'grid' ? 'active' : ''); ?>">
                            <div class="row">
                                <div class="grid-products separator">
                                    <?php if($viewMode === 'grid'): ?>
                                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php echo $__env->make('public.products.partials.product_card', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <h3><?php echo e(trans('storefront::products.no_products_were_found')); ?></h3>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div id="list-view" class="tab-pane <?php echo e($viewMode === 'list' ? 'active' : ''); ?>">
                            <?php if($viewMode === 'list'): ?>
                                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php echo $__env->make('public.products.partials.list_view_product_card', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <h3><?php echo e(trans('storefront::products.no_products_were_found')); ?></h3>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="pull-right">
                    <?php echo e($products->links()); ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>