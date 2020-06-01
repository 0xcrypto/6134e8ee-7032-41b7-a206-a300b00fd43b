<?php

namespace Modules\User\Admin;

use Modules\Admin\Ui\AdminTable;

class UserTable extends AdminTable
{
    /**
     * Raw columns that will not be escaped.
     *
     * @var array
     */
    protected $rawColumns = ['last_login'];

    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable()
            ->addColumn('full_name', function ($user) {
                return $user->full_name;
            })
            ->editColumn('last_login', function ($user) {
                return view('admin::partials.table.date')->with('date', $user->last_login);
            })
            ->addColumn('role', function ($user) {
                return $user->roles->first()->name;
            });
    }
}
