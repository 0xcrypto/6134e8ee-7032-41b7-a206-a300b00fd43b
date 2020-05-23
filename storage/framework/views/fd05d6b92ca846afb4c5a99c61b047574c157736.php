<div class="col-md-3 col-sm-12">
    <div class="product-list-sidebar clearfix">
        <?php echo $__env->make('public.products.partials.category_filter', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <form method="GET" action="<?php echo e(route('products.index')); ?>" id="product-filter-form">
            <?php $__currentLoopData = request()->except(['attribute', 'fromPrice', 'toPrice']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $query => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(! is_array($value)): ?>
                    <input type="hidden" name="<?php echo e($query); ?>" value="<?php echo e($value); ?>">
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="filter-section clearfix">
                    <h4><?php echo e($attribute->name); ?></h4>

                    <div class="<?php echo e($attribute->values->count() > 5 ? 'filter-scroll' : ''); ?>">
                        <?php $__currentLoopData = $attribute->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="filter-options">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <input type="checkbox"
                                            name="attribute[<?php echo e(mb_strtolower($attribute->name)); ?>][]"
                                            value="<?php echo e(mb_strtolower($value->value)); ?>"
                                            id="attribute-<?php echo e($value->id); ?>"
                                            <?php echo e(is_filtering($value->value) ? 'checked' : ''); ?>

                                        >

                                        <label for="attribute-<?php echo e($value->id); ?>"><?php echo e($value->value); ?></label>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="price-range-picker">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 col-sm-3 col-xs-6">
                            <label for="price-from"><?php echo e(trans('storefront::products.from')); ?></label>
                            <input type="text" name="fromPrice" class="from-control range-from" id="price-from">
                        </div>

                        <div class="col-md-6 col-sm-3 col-xs-6">
                            <label for="price-to"><?php echo e(trans('storefront::products.to')); ?></label>
                            <input type="text" name="toPrice" class="from-control range-to" id="price-to">
                        </div>
                    </div>
                </div>

                <div class="slider noUi-target noUi-ltr noUi-horizontal" id="price-range-slider" data-to-price="<?php echo e(request('toPrice', $maxPrice)); ?>" data-max="<?php echo e($maxPrice); ?>">
                    <div class="noUi-base">
                        <div class="noUi-connects"></div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-filter pull-right" data-loading><?php echo e(trans('storefront::products.filter')); ?></button>
        </form>
    </div>
</div>
