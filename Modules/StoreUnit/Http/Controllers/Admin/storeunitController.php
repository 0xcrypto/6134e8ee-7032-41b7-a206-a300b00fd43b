<?php

namespace Modules\StoreUnit\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\StoreUnit\Entities\storeunit;
use Modules\StoreUnit\Http\Requests\SavestoreunitRequest;

class storeunitController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = storeunit::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'storeunit::storeunits.storeunit';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'storeunit::admin.storeunits';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SavestoreunitRequest::class;
}
