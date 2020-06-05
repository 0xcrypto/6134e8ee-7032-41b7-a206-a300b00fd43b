<?php

namespace Modules\User\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;
use Modules\User\Entities\User;
use Modules\User\Entities\Role;
use Modules\Store\Entities\Store;
use Modules\Setting\Entities\Department;
use Modules\User\Repositories\Permission;
use Illuminate\Support\Facades\DB;

class UserTabs extends Tabs
{
    public function make()
    {
        $this->group('user_information', trans('user::users.tabs.group.user_information'))
            ->active()
            ->add($this->account())
            ->add($this->newPassword());

            //->add($this->permissions())   TODO: Uncomment if you want to assign permission sepecific to this user
    }

    private function account()
    {
        return tap(new Tab('account', trans('user::users.tabs.account')), function (Tab $tab) {
            $tab->active();
            $tab->weight(10);

            $tab->fields([
                'first_name',
                'last_name',
                'email',
                'activated',
                'roles',
            ]);

            $tab->view('user::admin.users.tabs.account', [
                'roles' => $this->getRoles(),
                'stores' => $this->getStores(),
                'seniors' => $this->getSeniors(),
                'departments' => $this->getDepartments(),
                'job_types' => $this->getJobTypes(),
                'genders' => $this->getGenders()
            ]);
        });
    }

    private function getRoles()
    {
        $accessibleRoles = DB::table('role_accessibilites')
                            ->where('role_id', '=', auth()->user()->roles()->first()->id)
                            ->pluck('accessible_role_id')
                            ->toArray();

        return User::getRolesByIds($accessibleRoles);
    } 

    private function getStores()
    {
        $stores = Store::all()->sortBy('name')->pluck('name', 'id');
        return $stores;
    } 

    private function getSeniors()
    {
        $seniors = User::all()->sortBy('name')->pluck('full_name', 'id');
        return $seniors;
    } 

    private function getDepartments()
    {
        $departments = Department::all()->sortBy('name')->pluck('name', 'id');
        return $departments->prepend(trans('admin::admin.form.please_select'), '');
    } 

    private function getJobTypes()
    {
        return [ trans('user::staff.job_types.in_store'),
                trans('user::staff.job_types.out_store')
            ];
    } 

    private function getGenders()
    {
        return [ trans('user::attributes.users.gender.male'),
                trans('user::attributes.users.gender.female')];
    } 

    private function permissions()
    {
        return tap(new Tab('permissions', trans('user::users.tabs.permissions')), function (Tab $tab) {
            $tab->weight(20);

            $tab->view(function ($data) {
                return view('user::admin.partials.permissions.index', [
                    'entity' => $data['user'],
                    'permissions' => Permission::all(),
                ]);
            });
        });
    }

    private function newPassword()
    {
        if (! request()->routeIs('admin.users.edit')) {
            return;
        }

        return tap(new Tab('new_password', trans('user::users.tabs.new_password')), function (Tab $tab) {
            $tab->weight(30);
            $tab->fields(['password', 'password_confirmation']);
            $tab->view('user::admin.users.tabs.new_password');
        });
    }
}
