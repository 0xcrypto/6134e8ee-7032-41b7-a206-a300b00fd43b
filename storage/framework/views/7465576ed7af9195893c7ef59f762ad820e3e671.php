<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::text('translatable[store_name]', trans('setting::attributes.translatable.store_name'), $errors, $settings, ['required' => true])); ?>

        <?php echo e(Form::text('translatable[store_tagline]', trans('setting::attributes.translatable.store_tagline'), $errors, $settings, ['rows' => 2])); ?>

        <?php echo e(Form::text('store_phone', trans('setting::attributes.store_phone'), $errors, $settings)); ?>

        <?php echo e(Form::text('store_email', trans('setting::attributes.store_email'), $errors, $settings, ['required' => true])); ?>

        <?php echo e(Form::text('store_address_1', trans('setting::attributes.store_address_1'), $errors, $settings)); ?>

        <?php echo e(Form::text('store_address_2', trans('setting::attributes.store_address_2'), $errors, $settings)); ?>

        <?php echo e(Form::text('store_city', trans('setting::attributes.store_city'), $errors, $settings)); ?>

        <?php echo e(Form::select('store_country', trans('setting::attributes.store_country'), $errors, $countries, $settings)); ?>


        <div class="store-state input">
            <?php echo e(Form::text('store_state', trans('setting::attributes.store_state'), $errors, $settings)); ?>

        </div>

        <div class="store-state select hide">
            <?php echo e(Form::select('store_state', trans('setting::attributes.store_state'), $errors, [], $settings)); ?>

        </div>

        <?php echo e(Form::text('store_zip', trans('setting::attributes.store_zip'), $errors, $settings)); ?>

    </div>
</div>
