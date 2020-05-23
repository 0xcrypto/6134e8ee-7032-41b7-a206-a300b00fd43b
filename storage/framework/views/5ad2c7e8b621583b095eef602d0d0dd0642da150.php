<div id="options-group">
    
</div>

<div class="box-footer no-border p-t-0">
    <div class="form-group pull-left">
        <div class="col-md-10">
            <button type="button" class="btn btn-default m-r-10" id="add-new-option">
                <?php echo e(trans('option::options.form.add_new_option')); ?>

            </button>
        </div>
    </div>

    <?php if ($currentUser->hasAccess('admin.options.index')) : ?>
        <?php if($globalOptions->isNotEmpty()): ?>
            <div class="add-global-option clearfix pull-right">
                <div class="form-group pull-left">
                    <select class="form-control custom-select-black" id="global-option">
                        <option value=""><?php echo e(trans('option::options.select_global_option')); ?></option>

                        <?php $__currentLoopData = $globalOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $globalOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($globalOption->id); ?>"><?php echo e($globalOption->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <button type="button" class="btn btn-default" id="add-global-option" data-loading>
                    <?php echo e(trans('option::options.form.add_global_option')); ?>

                </button>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

<?php $__env->startPush('globals'); ?>
    <script>
        FleetCart.data['product.options'] = <?php echo old_json('options', $product->options); ?>;
        FleetCart.errors['product.options'] = <?php echo json_encode($errors->get('options.*'), JSON_FORCE_OBJECT, 512) ?>;
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('option::admin.options.templates.product_option', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
