<div class="row">
    <div class="col-md-12">

    	

        {{ Form::text('sku', trans('product::attributes.sku'), $errors, $product) }}
        {{ Form::select('manage_stock', trans('product::attributes.manage_stock'), $errors, trans('product::products.form.manage_stock_states'), $product) }}
        {{ Form::select('in_stock', 'Availability', $errors, $availableStocks ,$product, trans('product::products.form.stock_availability_states')) }}

            @foreach($stores as $store)
                @foreach($store->storeUnits as $storeUnit)
                 <div class="row">
                    <div class="col-md-12">
                        @php
                            $unitProduct=$storeUnit->products()->where("product_id",$product->id)->withPivot("quantity")->first()->pivot ?? null;
                        @endphp
                            
                	    {{ Form::number('quantity[]', $store->name."/<br>".$storeUnit->name, $errors, $unitProduct,  ['required' => true, 'value' => ($unitProduct && $unitProduct->quantity) ? $unitProduct->quantity : 0, 'class'=>'store-unit-quantity'] ) }}
                        <input type="hidden" name="unit[]" value="{{$storeUnit->id}}">
                    </div>
                 </div>
            	@endforeach
           	@endforeach

        {{ Form::number('qty', trans('product::attributes.total_quantity'), $errors, $product,  ['required' => true, 'readonly' => true] ) }}
    </div>
</div>