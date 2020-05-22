<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::text('sku', trans('product::attributes.sku'), $errors, $product)); ?>

        <?php echo e(Form::select('manage_stock', trans('product::attributes.manage_stock'), $errors, trans('product::products.form.manage_stock_states'), $product)); ?>


        <div class="<?php echo e(old('manage_stock', $product->manage_stock) ? '' : 'hide'); ?>" id="qty-field">
            <?php echo e(Form::number('qty', trans('product::attributes.qty'), $errors, $product, ['required' => true])); ?>

        </div>

        <?php echo e(Form::select('in_stock', trans('product::attributes.in_stock'), $errors, trans('product::products.form.stock_availability_states'), $product)); ?>

    </div>
</div>
