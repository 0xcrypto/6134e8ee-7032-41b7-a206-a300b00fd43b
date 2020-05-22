<div class="row">
    <div class="col-md-12">

    	<?php echo e(Form::text(trans('store::attributes.form.name'), trans('store::attributes.form.name'), $errors, ['required' => true] )); ?>


    	<?php echo e(Form::text(trans('store::attributes.form.latiutde_longitude'), trans('store::attributes.form.latiutde_longitude'), $errors, ['required' => true] )); ?>


    	<?php echo e(Form::text(trans('store::attributes.form.address'), trans('store::attributes.form.address'), $errors, ['required' => true] )); ?>


	</div>
</div>