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
    public function store() 
    {
        $product = Product::create(request()->all());
        $unitProductData = array_combine(request()->unit, request()->quantity);

        foreach ($unitProductData as $unit => $productQuantity) {
            $product->storeUnits()->attach($unit, ['quantity' => $productQuantity]);
        }
        return redirect()->route("admin.products.index")
        ->withSuccess(trans('admin::messages.resource_saved', ['resource' => 'Product']));
    }

    public function update($id)
    {
        $product = Product::findOrFail($id);  
        $product->update(request()->all());
        $unitProductData = array_combine(request()->unit, request()->quantity);

        foreach ($unitProductData as $unit => $productQuantity) {
            $product->storeUnits()->updateExistingPivot([$unit], ['quantity' => $productQuantity]);
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