<div class="row">
    <div class="col-md-12">

    	<?php echo e(Form::text('name', trans('store::attributes.form.name'), $errors, $store, ['required' => true])); ?>


    	<?php echo e(Form::text('latitude_longitude', trans('store::attributes.form.latitude_longitude'), $errors, $store, ['required' => true] )); ?>


    	<?php echo e(Form::text('address', trans('store::attributes.form.address'), $errors, $store, ['required' => true] )); ?>


	</div>
</div>