<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::checkbox('bank_transfer_enabled', trans('setting::attributes.bank_transfer_enabled'), trans('setting::settings.form.enable_bank_transfer'), $errors, $settings)); ?>

        <?php echo e(Form::text('translatable[bank_transfer_label]', trans('setting::attributes.translatable.bank_transfer_label'), $errors, $settings, ['required' => true])); ?>

        <?php echo e(Form::textarea('translatable[bank_transfer_description]', trans('setting::attributes.translatable.bank_transfer_description'), $errors, $settings, ['rows' => 3, 'required' => true])); ?>


        <div class="<?php echo e(old('bank_transfer_enabled', array_get($settings, 'bank_transfer_enabled')) ? '' : 'hide'); ?>" id="bank-transfer-fields">
            <?php echo e(Form::textarea('translatable[bank_transfer_instructions]', trans('setting::attributes.translatable.bank_transfer_instructions'), $errors, $settings, ['rows' => 3, 'required' => true])); ?>

        </div>
    </div>
</div>
