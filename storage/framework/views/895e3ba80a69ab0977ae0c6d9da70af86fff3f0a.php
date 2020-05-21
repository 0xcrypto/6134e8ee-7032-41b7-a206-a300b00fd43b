<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::checkbox('flat_rate_enabled', trans('setting::attributes.flat_rate_enabled'), trans('setting::settings.form.enable_flat_rate'), $errors, $settings)); ?>

        <?php echo e(Form::text('translatable[flat_rate_label]', trans('setting::attributes.translatable.flat_rate_label'), $errors, $settings, ['required' => true])); ?>

        <?php echo e(Form::number('flat_rate_cost', trans('setting::attributes.flat_rate_cost'), $errors, $settings, ['min' => 0, 'required' => true])); ?>

    </div>
</div>
