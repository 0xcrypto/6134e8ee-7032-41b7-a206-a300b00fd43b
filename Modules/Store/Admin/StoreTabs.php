<?php

namespace Modules\Store\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;
//use Modules\Store\Entities\StoreUnit;

class StoreTabs extends Tabs
{
    public function make()
    {
        $this->group('store_set_information', trans('attribute::admin.tabs.group.attribute_information'))
            ->active()
            ->add($this->general());
    }

    private function general()
    {
        return tap(new Tab('general', trans('attribute::admin.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(5);
            $tab->fields(['name']);
            $tab->view('store::admin.stores.tabs.addstore', [
                //'attributeSets' => $this->getAttributeSets(),
            ]);
        });
    }

    private function getAttributeSets()
    {
        $attributeSets = AttributeSet::all()->sortBy('name')->pluck('name', 'id');

        return $attributeSets->prepend(trans('admin::admin.form.please_select'), '');
    }
}
