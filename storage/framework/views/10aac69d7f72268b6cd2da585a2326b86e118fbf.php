<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::textarea('short_description', trans('product::attributes.short_description'), $errors, $product)); ?>

        <?php echo e(Form::text('new_from', trans('product::attributes.new_from'), $errors, $product, ['class' => 'datetime-picker'])); ?>

        <?php echo e(Form::text('new_to', trans('product::attributes.new_to'), $errors, $product, ['class' => 'datetime-picker'] )); ?>

    </div>
</div>
