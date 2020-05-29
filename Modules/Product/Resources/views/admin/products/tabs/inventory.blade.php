<div class="row">
    <div class="col-md-12">

    	
        
        {{ Form::text('sku', trans('product::attributes.sku'), $errors, $product) }}
        {{ Form::select('manage_stock', trans('product::attributes.manage_stock'), $errors, trans('product::products.form.manage_stock_states'), $product) }}

            @foreach($stores as $store)
                @foreach($store->storeUnits as $storeUnit)
                 <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            @php
                                $unitProduct=$storeUnit->products()->where("product_id",$product->id)->withPivot("quantity", "in_stock")->first()->pivot ?? null;
                            @endphp
                            
                    	    {{ Form::number('quantity[]', $store->name."/<br>".$storeUnit->name, $errors, $unitProduct,  ['required' => true, 'value' => ($unitProduct && $unitProduct->quantity) ? $unitProduct->quantity : 0] ) }}
                            <input type="hidden" name="unit[]" value="{{$storeUnit->id}}">
                        </div>

                        <div class="col-md-5">
                            {{ Form::select('in_stock[]', 'Availability', $errors, $availableStocks ,$unitProduct, trans('product::products.form.stock_availability_states')) }}
                        </div>
                    </div>
                 </div>
            	
            	@endforeach

           	@endforeach

    </div>
</div>
