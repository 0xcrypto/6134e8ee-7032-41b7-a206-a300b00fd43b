<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductTranslation;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Product\Http\Requests\SaveProductRequest;
use Modules\Product\Entities\CreateUnitProduct;
use Modules\StoreUnit\Entities\storeunit;
use Modules\Category\Entities\Category;



class ProductController extends Controller
{



    public function store(){

        // save product data
        $saveData = new Product();  
        $saveData->name = request()->name;
        $saveData->tax_class_id = request()->tax_class_id;
        $saveData->price = request()->price;
        $saveData->special_price = request()->special_price;
        $saveData->special_price_start = request()->special_price_start;
        $saveData->special_price_end = request()->special_price_end;
        $saveData->sku = request()->sku;
        $saveData->manage_stock = request()->manage_stock;
        $saveData->in_stock = request()->in_stock;
        $saveData->is_active = request()->is_active;
        $saveData->new_from = request()->new_from;
        $saveData->new_to = request()->new_to;
        $saveData->description = request()->description;
        $saveData->short_description = request()->short_description;
        $saveData->save();
        $quantity = request()->quantity;
        $unit = request()->unit;
        $storeData = array_combine($unit, $quantity);

        foreach ($storeData as $key => $value) {
            $unitProduct = new CreateUnitProduct();
            $unitProduct->product_id = $saveData->id;
            $unitProduct->storeunit_id = $key;
            $unitProduct->quantity = $value;
            $unitProduct->save(); 
        }

        return redirect()->route("admin.products.index");
       
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
