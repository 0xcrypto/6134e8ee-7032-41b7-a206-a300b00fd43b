<?php

namespace Modules\StoreUnit\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Traits\HasCrudActions;
use Modules\StoreUnit\Entities\StoreUnit;
use Modules\StoreUnit\Http\Requests\SaveStoreUnitRequest;


class StoreUnitController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = StoreUnit::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'storeunit::store_units.store_unit';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'storeunit::admin.store_units';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveStoreUnitRequest::class;
}
