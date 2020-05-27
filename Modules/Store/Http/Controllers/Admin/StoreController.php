<?php

namespace Modules\Store\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Store\Entities\Store;
use Modules\Store\Http\Requests\SaveStoreRequest;

class StoreController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    
    protected $model = Store::class;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    //protected $with = ['values'];


    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'store::stores.store';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'store::admin.stores';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveStoreRequest::class;
}
