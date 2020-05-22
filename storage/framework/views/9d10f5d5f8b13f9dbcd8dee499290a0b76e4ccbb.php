<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::number('usage_limit_per_coupon', trans('coupon::attributes.usage_limit_per_coupon'), $errors, $coupon)); ?>

        <?php echo e(Form::number('usage_limit_per_customer', trans('coupon::attributes.usage_limit_per_customer'), $errors, $coupon)); ?>

    </div>
</div>
