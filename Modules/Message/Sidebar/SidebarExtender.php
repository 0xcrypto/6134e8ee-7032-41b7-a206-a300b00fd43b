<?php

namespace Modules\Message\Sidebar;

use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Group;
use Modules\Admin\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        $menu->group(trans('admin::sidebar.content'), function (Group $group) {
            $group->item(trans('message::messages.messages'), function (Item $item) {
                $item->icon('fa fa-envelope');
                $item->route('admin.messages.index');
                //$item->isActiveWhen(route('admin.messages.index', null, false));
            });
        });
    }
}
