<?php

namespace Modules\Chats\Sidebar;

use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Group;
use Modules\Admin\Sidebar\BaseSidebarExtender;


class SidebarExtender extends BaseSidebarExtender
{

    public function extend(Menu $menu)
    {
        
        $menu->group(trans('admin::sidebar.content'), function (Group $group) {
            $group->weight(15);
            $group->hideHeading();

            $group->item(trans('Chat'), function (Item $item) {
                $item->icon('fa fa-comment');
                $item->route('chat.index');
                $item->isActiveWhen(route('chat.index', null, false));
            });
        });


    }
}
