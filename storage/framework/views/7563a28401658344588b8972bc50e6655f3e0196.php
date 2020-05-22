<div id="product-attributes-wrapper">
    <div class="table-responsive">
        <table class="options table table-bordered">
            <thead class="hidden-xs">
                <tr>
                    <th></th>
                    <th><?php echo e(trans('attribute::admin.form.product.attribute')); ?></th>
                    <th><?php echo e(trans('attribute::admin.form.product.values')); ?></th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="product-attributes">
                
            </tbody>
        </table>
    </div>

    <button type="button" class="btn btn-default" id="add-new-attribute">
        <?php echo e(trans('attribute::admin.form.product.add_new_attribute')); ?>

    </button>
</div>

<?php echo $__env->make('attribute::admin.products.tabs.templates.attribute', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startPush('globals'); ?>
    <script>
        FleetCart.data['product.attributes'] = <?php echo json_encode($productAttributes, 15, 512) ?>;
        FleetCart.errors['product.attributes'] = <?php echo json_encode($errors->get('attributes.*'), JSON_FORCE_OBJECT, 512) ?>;
    </script>
<?php $__env->stopPush(); ?>
