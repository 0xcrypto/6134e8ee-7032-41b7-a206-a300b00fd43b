<div class="row">
    <div class="col-md-12">

    	
        
        <?php echo e(Form::text('sku', trans('product::attributes.sku'), $errors, $product)); ?>

        <?php echo e(Form::select('manage_stock', trans('product::attributes.manage_stock'), $errors, trans('product::products.form.manage_stock_states'), $product)); ?>


            <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            	<?php $__currentLoopData = $store->storeUnits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storeUnit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            
                            <?php
                                $unitProduct=$storeUnit->products()->where("product_id",$product->id)->withPivot("quantity", "in_stock")->first()->pivot ?? null;
                            ?>

                    	   <?php echo e(Form::number('quantity[]', $store->name."/<br>".$storeUnit->name, $errors, $unitProduct,  ['required' => true, 'value' => ($unitProduct && $unitProduct->quantity) ? $unitProduct->quantity : 0] )); ?>


                    	<input type="hidden" name="unit[]" value="<?php echo e($storeUnit->id); ?>">
                        </div>

                        <div class="col-md-5">

                            <?php echo e(Form::select('in_stock[]', 'Availability', $errors, $stock ,$unitProduct, trans('product::products.form.stock_availability_states'))); ?>


                        </div>
                    </div>
                 </div>
            	
            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

           	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
