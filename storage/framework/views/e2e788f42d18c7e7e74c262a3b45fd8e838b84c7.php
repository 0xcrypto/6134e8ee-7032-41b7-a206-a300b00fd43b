<div id="additional-information" class="specification tab-pane fade in">
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <?php $__currentLoopData = $product->attributeSets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeSet => $attributes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><h4><?php echo e($attributeSet); ?></h4></td>

                        <td>
                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="information-data clearfix">
                                    <label class="pull-left"><?php echo e($attribute->name); ?></label>
                                    <span>
                                        <?php echo e($attribute->values->implode('value', ', ')); ?>

                                    </span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
