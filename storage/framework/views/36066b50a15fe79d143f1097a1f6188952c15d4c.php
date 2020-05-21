<div class="row">
    <div class="col-md-8">
		<?php echo e(Form::select('supported_currencies', trans('setting::attributes.supported_currencies'), $errors, $currencies, $settings, ['class' => 'selectize prevent-creation', 'required' => true, 'multiple' => true])); ?>

        <?php echo e(Form::select('default_currency', trans('setting::attributes.default_currency'), $errors, $currencies, $settings, ['required' => true])); ?>

        <?php echo e(Form::select('currency_rate_exchange_service', trans('setting::attributes.currency_rate_exchange_service'), $errors, $currencyRateExchangeServices, $settings)); ?>


		<?php $__currentLoopData = $currencyRateExchangeServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service => $serviceName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="currency-rate-exchange-service hide" id="<?php echo e($service); ?>-service">
                <?php if ($__env->exists("setting::admin.settings.partials.currency_rate_exchange_services.{$service}")) echo $__env->make("setting::admin.settings.partials.currency_rate_exchange_services.{$service}", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php echo e(Form::checkbox('auto_refresh_currency_rates', trans('setting::attributes.auto_refresh_currency_rates'), trans('setting::settings.form.enable_auto_refreshing_currency_rates'), $errors, $settings)); ?>


        <div class="<?php echo e(old('auto_refresh_currency_rates', array_get($settings, 'auto_refresh_currency_rates')) ? '' : 'hide'); ?>" id="auto-refresh-frequency-field">
            <?php echo e(Form::select('auto_refresh_currency_rate_frequency', trans('setting::attributes.auto_refresh_currency_rate_frequency'), $errors, trans('setting::settings.form.auto_refresh_currency_rate_frequencies'), $settings, ['required' => true])); ?>

        </div>
    </div>
</div>
