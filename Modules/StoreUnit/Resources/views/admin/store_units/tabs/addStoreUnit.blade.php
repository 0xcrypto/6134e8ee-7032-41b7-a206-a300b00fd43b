<div class="row">
    <div class="col-md-10">

    	{{ Form::text('name', trans('storeunit::attributes.form.name'), $errors ,  ['required' => true] ) }}

    	{{ Form::select('store', trans('storeunit::attributes.form.store'), $errors,
    	 $stores, ['required' => true]) }}

		{{ Form::select('availability', trans('storeunit::attributes.form.availability'), $errors,
    	 $availability, ['required' => true]) }}

	</div>
</div>