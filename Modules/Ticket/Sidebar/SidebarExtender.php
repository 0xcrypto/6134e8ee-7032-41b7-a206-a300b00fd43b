<?php

namespace Modules\Ticket\Sidebar;

use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Group;
use Modules\Admin\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        $menu->group(trans('admin::sidebar.administration'), function (Group $group) {
            $group->item(trans('ticket::tickets.tickets'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(0);
                $item->authorize(
                     /* append */
                );

                $item->item(trans('ticket::tickets.tickets'), function (Item $item) {
                    $item->weight(5);
                    $item->route('admin.tickets.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.tickets.index')
                    );
                });

// append

            });
        });
    }
}
