<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::checkbox('cod_enabled', trans('setting::attributes.cod_enabled'), trans('setting::settings.form.enable_cod'), $errors, $settings)); ?>

        <?php echo e(Form::text('translatable[cod_label]', trans('setting::attributes.translatable.cod_label'), $errors, $settings, ['required' => true])); ?>

        <?php echo e(Form::textarea('translatable[cod_description]', trans('setting::attributes.translatable.cod_description'), $errors, $settings, ['rows' => 3, 'required' => true])); ?>

    </div>
</div>
