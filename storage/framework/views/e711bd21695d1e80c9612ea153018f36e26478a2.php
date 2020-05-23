<?php if($products->isNotEmpty()): ?>
    <section class="landscape-products-wrapper">
        <div class="section-header">
            <h3><?php echo e($title); ?></h3>
        </div>

        <div class="row">
            <div class="landscape-products slick-arrow separator">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <?php echo $__env->make('public.products.partials.single_product', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>
