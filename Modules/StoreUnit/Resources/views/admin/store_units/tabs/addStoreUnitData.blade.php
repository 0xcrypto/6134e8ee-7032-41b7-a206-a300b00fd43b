<div class="row">
    <div class="col-md-10">

    	{{ Form::text('name', trans('storeunit::attributes.form.name'), $errors , $storeUnit, ['required' => true] ) }}

    	{{ Form::select('store', trans('storeunit::attributes.form.store'), $errors, 
    	 $stores, $storeUnit, ['required' => true]) }}

		{{ Form::select('availability', trans('storeunit::attributes.form.availability'), $errors,
    	 $availability, $storeUnit, ['required' => true]) }}
 
	</div>
</div>