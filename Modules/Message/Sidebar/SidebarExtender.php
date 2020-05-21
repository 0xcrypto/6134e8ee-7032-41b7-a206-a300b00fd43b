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
            $group->weight(5);
            $group->item(trans('message::message.message'), function (Item $item) {
                $item->icon('fa fa-email');
                $item->route('message.inbox.index');
                //$item->isActiveWhen(route('admin.dashboard.index', null, false));
            });
        });
    }
}
