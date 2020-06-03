<?php

namespace Modules\Setting\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Setting\Entities\Department;
use Modules\Setting\Http\Requests\SaveDepartmentRequest;

class DepartmentController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Department::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'setting::departments.department';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'setting::admin.departments';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveDepartmentRequest::class;
}
