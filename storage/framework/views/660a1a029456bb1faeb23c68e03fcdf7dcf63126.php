<div class="row">
    <div class="col-md-8">

    	
        
        <?php echo e(Form::text('sku', trans('product::attributes.sku'), $errors, $product)); ?>

        <?php echo e(Form::select('manage_stock', trans('product::attributes.manage_stock'), $errors, trans('product::products.form.manage_stock_states'), $product)); ?>


        <?php $__currentLoopData = (Modules\Store\Entities\Store::all() ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        	<?php $__currentLoopData = $store->storeUnit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $storeunit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        	<?php echo e(Form::number('quantity[]', $store->name."/".$storeunit->name, $errors, $product, ['required' => true])); ?>


        	<input type="hidden" name="unit[]" value="<?php echo e($storeunit->id); ?>">
        	
        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

       	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php echo e(Form::select('in_stock', trans('product::attributes.in_stock'), $errors, trans('product::products.form.stock_availability_states'), $product)); ?>


    </div>
</div>
