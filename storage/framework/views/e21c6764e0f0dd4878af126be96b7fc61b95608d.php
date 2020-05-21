<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::text('mail_from_address', trans('setting::attributes.mail_from_address'), $errors, $settings)); ?>

        <?php echo e(Form::text('mail_from_name', trans('setting::attributes.mail_from_name'), $errors, $settings)); ?>

        <?php echo e(Form::text('mail_host', trans('setting::attributes.mail_host'), $errors, $settings)); ?>

        <?php echo e(Form::text('mail_port', trans('setting::attributes.mail_port'), $errors, $settings)); ?>

        <?php echo e(Form::text('mail_username', trans('setting::attributes.mail_username'), $errors, $settings)); ?>

        <?php echo e(Form::password('mail_password', trans('setting::attributes.mail_password'), $errors, $settings)); ?>

        <?php echo e(Form::select('mail_encryption', trans('setting::attributes.mail_encryption'), $errors, $encryptionProtocols, $settings)); ?>

    </div>
</div>
