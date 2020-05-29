<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Product\Entities\UnitProduct;
use Modules\Product\Http\Requests\SaveUnitProductRequest;

class UnitProductController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = UnitProduct::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'product::unit_products.unit_product';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'product::admin.unit_products';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveUnitProductRequest::class;
}
