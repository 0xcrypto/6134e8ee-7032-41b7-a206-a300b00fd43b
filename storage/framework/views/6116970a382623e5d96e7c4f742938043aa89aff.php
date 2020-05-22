<script type="text/html" id="tax-rate-template">
    <tr class="tax-rate">
        <td class="text-center">
            <span class="drag-icon">
                <i class="fa">&#xf142;</i>
                <i class="fa">&#xf142;</i>
            </span>
        </td>

        <td class="tax-name">
            <input type="hidden" name="rates[<%- rateId %>][id]" value="<%- rate.id %>">

            <input type="text" name="rates[<%- rateId %>][name]" value="<%- rate.name %>" class="form-control" id="rates.<%- rateId %>.name">
        </td>

        <td class="country">
            <select class="custom-select-black" name="rates[<%- rateId %>][country]" id="rates.<%- rateId %>.country">
                <option value=""><?php echo e(trans('admin::admin.form.please_select')); ?></option>

                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($code); ?>" <%= rate.country === '<?php echo e($code); ?>' ? 'selected' : '' %>>
                        <?php echo e($name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </td>

        <td class="state">
            <input type="text" name="rates[<%- rateId %>][state]" value="<%- rate.state %>" class="form-control" id="rates.<%- rateId %>.state" placeholder="*">
        </td>

        <td class="city">
            <input type="text" name="rates[<%- rateId %>][city]" value="<%- rate.city %>" class="form-control" id="rates.<%- rateId %>.city" placeholder="*">
        </td>

        <td class="zip">
            <input type="text" name="rates[<%- rateId %>][zip]" value="<%- rate.zip %>" class="form-control" id="rates.<%- rateId %>.zip" placeholder="*">
        </td>

        <td class="rate">
            <input type="number" name="rates[<%- rateId %>][rate]" value="<%- rate.rate %>" step="0.01" min="0" class="form-control" id="rates.<%- rateId %>.rate">
        </td>

        <td class="text-center">
            <button type="button" class="btn btn-default delete-row" data-toggle="tooltip" title="<?php echo e(trans('tax::taxes.form.delete_rate')); ?>">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
</script>
