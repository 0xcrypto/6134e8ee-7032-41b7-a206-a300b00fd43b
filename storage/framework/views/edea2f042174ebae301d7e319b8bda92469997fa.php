<div class="col-lg-4 col-md-5 col-sm-5 col-xs-7">
    <div class="product-image">
        <div class="base-image">
            <?php if(! $product->base_image->exists): ?>
                <div class="image-placeholder">
                    <i class="fa fa-picture-o"></i>
                </div>
            <?php else: ?>
                <a class="base-image-inner" href="<?php echo e($product->base_image->path); ?>">
                    <img src="<?php echo e($product->base_image->path); ?>">
                    <span><i class="fa fa-search-plus" aria-hidden="true"></i></span>
                </a>
            <?php endif; ?>

            <?php $__currentLoopData = $product->additional_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $additionalImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(! $additionalImage->exists): ?>
                    <div class="image-placeholder">
                        <i class="fa fa-picture-o"></i>
                    </div>
                <?php else: ?>
                    <a class="base-image-inner" href="<?php echo e($additionalImage->path); ?>">
                        <img src="<?php echo e($additionalImage->path); ?>">
                        <span><i class="fa fa-search-plus" aria-hidden="true"></i></span>
                    </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="additional-image">
            <?php if(! $product->base_image->exists): ?>
                <div class="image-placeholder">
                    <i class="fa fa-picture-o"></i>
                </div>
            <?php else: ?>
                <div class="thumb-image">
                    <img src="<?php echo e($product->base_image->path); ?>">
                </div>
            <?php endif; ?>

            <?php $__currentLoopData = $product->additional_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $additionalImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(! $additionalImage->exists): ?>
                    <div class="image-placeholder">
                        <i class="fa fa-picture-o"></i>
                    </div>
                <?php else: ?>
                    <div class="thumb-image">
                        <img src="<?php echo e($additionalImage->path); ?>">
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
