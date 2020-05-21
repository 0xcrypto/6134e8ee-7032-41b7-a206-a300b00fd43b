<div class="tax-rates-wrapper">
    <div class="table-responsive">
        <table class="options tax-rates table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th><?php echo e(trans('tax::attributes.name')); ?></th>
                    <th><?php echo e(trans('tax::attributes.country')); ?></th>
                    <th class="state"><?php echo e(trans('tax::attributes.state')); ?></th>
                    <th class="city"><?php echo e(trans('tax::attributes.city')); ?></th>
                    <th class="zip"><?php echo e(trans('tax::attributes.zip')); ?></th>
                    <th class="rate"><?php echo e(trans('tax::attributes.rate')); ?></th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="tax-rates">
                
            </tbody>
        </table>
    </div>

    <button type="button" class="btn btn-default m-b-15" id="add-new-rate">
        <?php echo e(trans('tax::taxes.form.add_new_rate')); ?>

    </button>
</div>

<?php echo $__env->make('tax::admin.taxes.tabs.templates.rate', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('tax::admin.taxes.tabs.templates.state_input', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('tax::admin.taxes.tabs.templates.state_select', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startPush('globals'); ?>
    <script>
        FleetCart.data['tax_rates'] = <?php echo old_json('rates', $taxClass->taxRates); ?>;
        FleetCart.errors['tax_rates'] = <?php echo json_encode($errors->get('rates.*'), JSON_FORCE_OBJECT, 512) ?>;
    </script>
<?php $__env->stopPush(); ?>
