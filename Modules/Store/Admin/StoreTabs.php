<?php

namespace Modules\Store\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;
use Modules\Store\Entities\StoreUnit;
use Modules\Store\Entities\Store;

class StoreTabs extends Tabs
{

    public function make()
    {
        $this->group('store_information', trans('store::admin.tabs.group.store_information'))
            ->active()
            ->add($this->general());
    }

    private function general()
    {
        return tap(new Tab('Add Store Unit', trans('store::admin.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(5);
            $tab->fields(['name']);
            $tab->view('store::admin.stores.tabs.addStore');
        });
    }
    
}
