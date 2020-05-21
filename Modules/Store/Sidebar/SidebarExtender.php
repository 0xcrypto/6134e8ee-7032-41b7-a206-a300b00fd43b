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
            $group->weight(5);
            $group->hideHeading();
            $group->item(trans('Store'), function (Item $item) {
                $item->icon('fa fa-home');
                $item->route('admin.stores.index');
                $item->isActiveWhen(route('admin.stores.index', null, false));
            });
        });


    }
}
