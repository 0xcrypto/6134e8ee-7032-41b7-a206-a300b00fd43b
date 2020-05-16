<?php

namespace Themes\Storefront\Sidebar;

use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Group;
use Modules\Admin\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        $menu->group(trans('admin::sidebar.system'), function (Group $group) {
            $group->item(trans('admin::sidebar.appearance'), function (Item $item) {
                $item->item(trans('page::sidebar.pages'), function (Item $item) {
                    $item->icon('fa fa-file');
                    $item->weight(25);
                    $item->route('admin.pages.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.pages.index')
                    );
                });
    
                $item->item(trans('media::media.media'), function (Item $item) {
                    $item->weight(30);
                    $item->icon('fa fa-camera');
                    $item->route('admin.media.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.media.index')
                    );
                });
    
                $item->item(trans('menu::sidebar.menus'), function (Item $item) {
                    $item->weight(35);
                    $item->icon('fa fa-bars');
                    $item->route('admin.menus.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.menus.index')
                    );
                });
                $item->item(trans('storefront::sidebar.storefront'), function (Item $item) {
                    $item->weight(10);
                    $item->route('admin.storefront.settings.edit');
                    $item->authorize(
                        $this->auth->hasAccess('admin.storefront.edit')
                    );
                });


            });
        });
    }
}
