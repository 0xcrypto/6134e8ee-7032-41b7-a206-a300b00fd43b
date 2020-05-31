<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductTranslation;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Product\Http\Requests\SaveProductRequest;
use Modules\Product\Entities\UnitProduct;
use Modules\StoreUnit\Entities\StoreUnit;
use Modules\Category\Entities\Category;

class ProductController extends Controller
{
    public function store(){

        $product = new Product();  
        $product->name = request()->name;
        $product->tax_class_id = request()->tax_class_id;
        $product->price = request()->price;
        $product->special_price = request()->special_price;
        $product->special_price_start = request()->special_price_start;
        $product->special_price_end = request()->special_price_end;
        $product->sku = request()->sku;
        $product->manage_stock = request()->manage_stock;
        $product->qty = request()->qty;
        $product->in_stock = request()->in_stock;
        $product->is_active = request()->is_active;
        $product->new_from = request()->new_from;
        $product->new_to = request()->new_to;
        $product->description = request()->description;
        $product->short_description = request()->short_description;
        $product->save();

        $quantity = request()->quantity;
        $unit = request()->unit;
        $storeData = array_combine($unit, $quantity);

        foreach ($storeData as $key => $value) {

            $unitProduct = new UnitProduct();
            $unitProduct->product_id = $product->id;
            $unitProduct->store_unit_id = $key;
            $unitProduct->quantity = $value;
            $unitProduct->save(); 
        }
        return redirect()->route("admin.products.index")
        ->withSuccess(trans('admin::messages.resource_saved', ['resource' => 'Product']));
    }

    public function update($id)
    {
        $product = Product::findOrFail($id);  
        $product->name = request()->name;
        $product->tax_class_id = request()->tax_class_id;
        $product->price = request()->price;
        $product->special_price = request()->special_price;
        $product->special_price_start = request()->special_price_start;
        $product->special_price_end = request()->special_price_end;
        $product->sku = request()->sku;
        $product->manage_stock = request()->manage_stock;
        $product->qty = request()->qty;
        $product->in_stock = request()->in_stock;
        $product->is_active = request()->is_active;
        $product->new_from = request()->new_from;
        $product->new_to = request()->new_to;
        $product->description = request()->description;
        $product->short_description = request()->short_description;
        $product->save();

        $quantity = request()->quantity;
        $units = request()->unit;
        $unitProductData = array_combine($units, $quantity);

        foreach ($unitProductData as $unit => $productQuantity) {
            $unitProduct = UnitProduct::where("store_unit_id", $unit)->where("product_id", $product->id)->first();

            if(!$unitProduct) {
                $unitProduct = new UnitProduct();
                $unitProduct->product_id = $product->id;
                $unitProduct->store_unit_id = $unit;
            } 
            
            $unitProduct->quantity = $productQuantity;
            $unitProduct->save();
           
        }

        return redirect()->route("admin.products.index")
        ->withSuccess(trans('admin::messages.resource_saved', ['resource' => 'Product']));
    }

    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'product::products.product';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'product::admin.products';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    protected $validation = SaveProductRequest::class;  
}