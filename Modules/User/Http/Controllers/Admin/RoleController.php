<?php

namespace Modules\User\Http\Controllers\Admin;

use Modules\User\Entities\Role;
use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\User\Http\Requests\SaveRoleRequest;

class RoleController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'user::roles.role';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'user::admin.roles';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    protected $validation = SaveRoleRequest::class;

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\User\Http\Requests\SaveRoleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->accessible_roles()->attach($request->accessible_roles);

        return redirect()->route('admin.roles.index')
            ->withSuccess(trans('admin::messages.resource_saved', ['resource' => trans('user::roles.role')]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param \Modules\User\Http\Requests\SaveRoleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, SaveRoleRequest $request)
    {
        $role = Role::findOrFail($id);

        $role->update($request->all());
        $role->accessible_roles()->sync($request->accessible_roles);

        return redirect()->route('admin.roles.index')
            ->withSuccess(trans('admin::messages.resource_saved', ['resource' => trans('user::roles.role')]));
    }
}
