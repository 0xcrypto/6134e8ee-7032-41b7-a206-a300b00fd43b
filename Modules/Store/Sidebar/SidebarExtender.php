<?php

namespace Modules\Store\Sidebar;

use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Group;
use Modules\Admin\Sidebar\BaseSidebarExtender;


class SidebarExtender extends BaseSidebarExtender
{

    public function extend(Menu $menu)
    {
        
        $menu->group(trans('admin::sidebar.content'), function (Group $group) {
            $group->item(trans('store::stores.stores'), function (Item $item) {
                $item->icon('fa fa-cube');
                $item->weight(10);
                $item->route('admin.stores.index');
                $item->authorize(
                $this->auth->hasAnyAccess([
                        'admin.products.index',
                        'admin.stores.index',
                        'admin.storeunits.index',
                        
                    ])
                );


                // store unit

                $item->item(trans('store::stores.store_unit'), function (Item $item) {
                    $item->weight(10);
                    $item->route('admin.store_units.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.attribute_sets.index')
                    );
                });


            });
        });
    }
}