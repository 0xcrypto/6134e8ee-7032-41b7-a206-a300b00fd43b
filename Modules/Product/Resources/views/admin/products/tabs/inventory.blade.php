<div class="row">
    <div class="col-md-12">

    	
        
        {{ Form::text('sku', trans('product::attributes.sku'), $errors, $product) }}
        {{ Form::select('manage_stock', trans('product::attributes.manage_stock'), $errors, trans('product::products.form.manage_stock_states'), $product) }}

            @foreach((Modules\Store\Entities\Store::all() ?? []) as $store)

            	@foreach($store->storeUnit as $storeunit)
                 <div class="row">
                <div class="col-sm-7">

                    @php
                    $pivottable = $storeunit->Products()->where("product_id", $product->id)->withPivot("quantity", "in_stock")->first();
                    $pivottable = $pivottable->pivot ?? null;
                    @endphp

            	{{ Form::number('quantity[]', $store->name."/".$storeunit->name, $errors, $pivottable, ['required' => true] ) }}

            	<input type="hidden" name="unit[]" value="{{$storeunit->id}}">
                </div>

                <div class="col-sm-4">

                {{ Form::select('in_stock[]', 'Stock', $errors, ['Out Of Stock','In Stock'] ,$pivottable, trans('product::products.form.stock_availability_states')) }}

                </div>
                 </div>
            	
            	@endforeach

           	@endforeach

    </div>
</div>
