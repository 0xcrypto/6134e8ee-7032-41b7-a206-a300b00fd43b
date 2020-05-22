<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::text('name', trans('coupon::attributes.name'), $errors, $coupon, ['required' => true])); ?>

        <?php echo e(Form::text('code', trans('coupon::attributes.code'), $errors, $coupon, ['required' => true])); ?>

        <?php echo e(Form::select('is_percent', trans('coupon::attributes.is_percent'), $errors, trans('coupon::coupons.form.price_types'), $coupon)); ?>

        <?php echo e(Form::number('value', trans('coupon::attributes.value'), $errors, $coupon, ['min' => 0])); ?>

        <?php echo e(Form::checkbox('free_shipping', trans('coupon::attributes.free_shipping'), trans('coupon::coupons.form.allow_free_shipping'), $errors, $coupon->freeShipping())); ?>

        <?php echo e(Form::text('start_date', trans('coupon::attributes.start_date'), $errors, $coupon, ['class' => 'datetime-picker', 'data-default-date' => $coupon->start_date])); ?>

        <?php echo e(Form::text('end_date', trans('coupon::attributes.end_date'), $errors, $coupon, ['class' => 'datetime-picker', 'data-default-date' => $coupon->end_date])); ?>

        <?php echo e(Form::checkbox('is_active', trans('coupon::attributes.is_active'), trans('coupon::coupons.form.enable_the_coupon'), $errors, $coupon)); ?>

    </div>
</div>
