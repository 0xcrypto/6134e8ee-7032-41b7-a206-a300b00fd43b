<div class="row">
    <div class="col-md-8">

    	
        
        {{ Form::text('sku', trans('product::attributes.sku'), $errors, $product) }}
        {{ Form::select('manage_stock', trans('product::attributes.manage_stock'), $errors, trans('product::products.form.manage_stock_states'), $product) }}

        @foreach((Modules\Store\Entities\Store::all() ?? []) as $store)

        	@foreach($store->storeUnit as $storeunit)
        
        	{{ Form::number('quantity[]', $store->name."/".$storeunit->name, $errors, $product, ['required' => true]) }}

        	<input type="hidden" name="unit[]" value="{{$storeunit->id}}">
        	
        	@endforeach

       	@endforeach

        {{ Form::select('in_stock', trans('product::attributes.in_stock'), $errors, trans('product::products.form.stock_availability_states'), $product) }}

    </div>
</div>
