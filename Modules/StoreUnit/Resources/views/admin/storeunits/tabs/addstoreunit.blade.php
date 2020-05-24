<div class="row">
    <div class="col-md-10">

    	{{ Form::text('Name', trans('storeunit::attributes.form.name'), $errors, $storeunit , ['required' => true] ) }}

    	{{ Form::select('Store', trans('storeunit::attributes.form.store'), $errors,
    	 $attributeSets, $storeunit, ['required' => true]) }}

    	{{ Form::text('Product', trans('storeunit::attributes.form.product'), $errors, $storeunit, ['required' => true] ) }}

    	{{ Form::text('Quantity', trans('storeunit::attributes.form.quantity'), $errors, $storeunit, ['required' => true] ) }}

		{{ Form::select('Availability', trans('storeunit::attributes.form.availability'), $errors,
    	 $availability, $storeunit, ['required' => true]) }}

	</div>
</div>