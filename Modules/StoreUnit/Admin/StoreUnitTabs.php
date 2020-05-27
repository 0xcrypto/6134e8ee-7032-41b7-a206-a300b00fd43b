<?php

namespace Modules\StoreUnit\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;
use Modules\StoreUnit\Entities\StoreUnit;
use Modules\Store\Entities\Store;

class StoreUnitTabs extends Tabs
{



    public function make()
    {
        $this->group('store_set_information', trans('storeunit::admin.tabs.group.storeunit_information'))
            ->active()
            ->add($this->general());
    }



    private function general()
    {
        return tap(new Tab('Add StoreUnit', trans('storeunit::admin.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(5);
            $tab->fields(['name']);
            $tab->view('storeunit::admin.storeunits.tabs.addstoreunit', [
                'availability' => $this->getAvailability(),
                'stores' => $this->getStores(),
            ]);
        });
    }



    private function getStores()
    {
        $stores = Store::all()->sortBy('name')->pluck('name', 'id');
        return $stores->prepend(trans('admin::admin.form.please_select'), '');
    }



    private function getAvailability()
    {
        $availability = collect([0 => trans('storeunit::attributes.availability.offline'), 
        1 => trans('storeunit::attributes.availability.online')]);

        return $availability->prepend(trans('admin::admin.form.please_select'), '');
    }


    
}
