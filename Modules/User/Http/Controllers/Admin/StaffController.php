<?php

namespace Modules\User\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\User\Entities\Staff;
use Modules\User\Http\Requests\SaveStaffRequest;

class StaffController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Staff::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'user::staff.staff';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'user::admin.staff';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveStaffRequest::class;
}
