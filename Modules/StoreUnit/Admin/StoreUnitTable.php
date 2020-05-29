<?php

namespace Modules\StoreUnit\Admin;

use Modules\Admin\Ui\AdminTable;

class StoreUnitTable extends AdminTable
{
    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable()
            ->addColumn('store', function ($storeUnit) {
                return $storeUnit->store->name;
            })
            ->addColumn('availability', function ($storeUnit) {
                return $storeUnit->availability
                    ? trans('storeunit::attributes.availability.online')
                    : trans('storeunit::attributes.availability.offline');
            });
    }
}
