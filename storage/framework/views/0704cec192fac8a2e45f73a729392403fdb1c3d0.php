<div class="row">
    <div class="col-md-8">
        <?php echo e(Form::checkbox('google_login_enabled', trans('setting::attributes.google_login_enabled'), trans('setting::settings.form.enable_google_login'), $errors, $settings)); ?>


        <div class="<?php echo e(old('google_login_enabled', array_get($settings, 'google_login_enabled')) ? '' : 'hide'); ?>" id="google-login-fields">
            <?php echo e(Form::text('google_login_client_id', trans('setting::attributes.google_login_client_id'), $errors, $settings, ['required' => true])); ?>

            <?php echo e(Form::password('google_login_client_secret', trans('setting::attributes.google_login_client_secret'), $errors, $settings, ['required' => true])); ?>

        </div>
    </div>
</div>
