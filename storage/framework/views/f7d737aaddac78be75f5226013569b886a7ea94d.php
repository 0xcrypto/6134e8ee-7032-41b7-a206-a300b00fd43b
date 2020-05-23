<script type="text/html" id="product-attribute-template">
    <tr>
        <td class="text-center">
            <span class="drag-icon">
                <i class="fa">&#xf142;</i>
                <i class="fa">&#xf142;</i>
            </span>
        </td>

        <td>
            <div class="form-group">
                <label for="attributes.<%- attributeId %>.attribute_id" class="visible-xs"><?php echo e(trans('attribute::admin.form.product.attribute')); ?></label>
                <select name="attributes[<%- attributeId %>][attribute_id]" class="form-control attribute custom-select-black" id="attributes.<%- attributeId %>.attribute_id" data-attribute-id="<%- attributeId %>">
                    <option value=""><?php echo e(trans('admin::admin.form.please_select')); ?></option>

                    <?php $__currentLoopData = $attributeSets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeSet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <optgroup label="<?php echo e($attributeSet->name); ?>">
                            <?php $__currentLoopData = $attributeSet->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($attribute->id); ?>" data-values='<?php echo json_encode($attribute->values->pluck('value', 'id'), JSON_FORCE_OBJECT) ?>' <%= (attribute.attribute_id || attribute.id) == <?php echo e($attribute->id); ?> ? 'selected' : '' %>>
                                    <?php echo e($attribute->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </optgroup>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </td>

        <td>
            <div class="form-group">
                <label for="attributes.<%- attributeId %>.values" class="visible-xs"><?php echo e(trans('attribute::admin.form.product.values')); ?></label>
                <select name="attributes[<%- attributeId %>][values][]" class="form-control selectize prevent-creation" id="attributes.<%- attributeId %>.values" multiple>
                    <% _.each(attribute.values, function (value) { %>
                        <option value="<%- value.attribute_value_id || value.id %>" selected>
                            <%- value.value || value.attribute_value.value %>
                        </option>
                    <% }); %>
                </select>
            </div>
        </td>

        <td class="text-center">
            <button type="button" class="btn btn-default delete-row" data-toggle="tooltip" data-title="<?php echo e(trans('attribute::admin.form.product.delete_attribute')); ?>">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
</script>
