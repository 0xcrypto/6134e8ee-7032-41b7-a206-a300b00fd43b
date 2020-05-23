<div id="attribute-values-wrapper">
    <div class="table-responsive">
        <table class="options table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th><?php echo e(trans('attribute::admin.form.value')); ?></th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="attribute-values">

            </tbody>
        </table>
    </div>

    <button type="button" class="btn btn-default" id="add-new-value">
        <?php echo e(trans('attribute::admin.form.add_new_value')); ?>

    </button>
</div>

<?php echo $__env->make('attribute::admin.attributes.tabs.templates.attribute_value', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->startPush('globals'); ?>
    <script>
        FleetCart.data['attribute.values'] = <?php echo old_json('values', $attribute->values); ?>;
    </script>
<?php $__env->stopPush(); ?>
