<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::checkbox('stripe_enabled', trans('setting::attributes.stripe_enabled'), trans('setting::settings.form.enable_stripe'), $errors, $settings)); ?>

        <?php echo e(Form::text('translatable[stripe_label]', trans('setting::attributes.translatable.stripe_label'), $errors, $settings, ['required' => true])); ?>

        <?php echo e(Form::textarea('translatable[stripe_description]', trans('setting::attributes.translatable.stripe_description'), $errors, $settings, ['rows' => 3, 'required' => true])); ?>


        <div class="<?php echo e(old('stripe_enabled', array_get($settings, 'stripe_enabled')) ? '' : 'hide'); ?>" id="stripe-fields">
            <?php echo e(Form::text('stripe_publishable_key', trans('setting::attributes.stripe_publishable_key'), $errors, $settings, ['required' => true])); ?>

            <?php echo e(Form::password('stripe_secret_key', trans('setting::attributes.stripe_secret_key'), $errors, $settings, ['required' => true])); ?>

        </div>
    </div>
</div>
