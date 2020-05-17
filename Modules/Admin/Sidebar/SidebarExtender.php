<?php

namespace Modules\Admin\Sidebar;

use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Group;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        $menu->group(trans('admin::sidebar.content'), function (Group $group) {
            $group->weight(5);
            $group->hideHeading();

            $group->item(trans('admin::dashboard.dashboard'), function (Item $item) {
                $item->weight(5);
                $item->icon('fa fa-dashboard');
                $item->route('admin.dashboard.index');
                $item->isActiveWhen(route('admin.dashboard.index', null, false));
            });

            $group->item(trans('product::sidebar.products'), function (Item $item) {
                $item->weight(10);
                $item->icon('fa fa-cube');
                $item->route('admin.products.index');
                $item->authorize(
                    $this->auth->hasAnyAccess([
                        'admin.products.index',
                        'admin.categories.index',
                        'admin.attributes.index',
                        'admin.attribute_sets.index',
                        'admin.options.index',
                    ])
                );

                $item->item(trans('product::sidebar.catalog'), function (Item $item) {
                    $item->weight(5);
                    $item->route('admin.products.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.products.index')
                    );
                });

                $item->item(trans('category::sidebar.categories'), function (Item $item) {
                    $item->weight(10);
                    $item->route('admin.categories.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.categories.index')
                    );
                });

                $item->item(trans('option::sidebar.options'), function (Item $item) {
                    $item->weight(25);
                    $item->route('admin.options.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.options.index')
                    );
                });

                $item->item(trans('review::sidebar.reviews'), function (Item $item) {
                    $item->weight(30);
                    $item->route('admin.reviews.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.reviews.index')
                    );
                });
            });

            $group->item(trans('admin::sidebar.sales'), function (Item $item) {
                $item->icon('fa fa-dollar');
                $item->weight(15);
                $item->route('admin.orders.index');
                $item->authorize(
                    $this->auth->hasAnyAccess(['admin.orders.index', 'admin.transactions.index'])
                );

                $item->item(trans('order::orders.orders'), function (Item $item) {
                    $item->weight(5);
                    $item->route('admin.orders.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.orders.index')
                    );
                });

                $item->item(trans('transaction::transactions.transactions'), function (Item $item) {
                    $item->weight(10);
                    $item->route('admin.transactions.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.transactions.index')
                    );
                });
            });

            $group->item(trans('coupon::coupons.coupons'), function (Item $item) {
                $item->icon('fa fa-tags');
                $item->weight(20);
                $item->route('admin.coupons.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.coupons.index')
                );
            });
        });

        $menu->group(trans('admin::sidebar.system'), function (Group $group) {
            $group->weight(10);

            $group->item(trans('user::sidebar.users'), function (Item $item) {
                $item->weight(5);
                $item->icon('fa fa-users');
                $item->route('admin.users.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.users.index') || $this->auth->hasAccess('roles.index')
                );

                // users
                $item->item(trans('user::sidebar.users'), function (Item $item) {
                    $item->weight(5);
                    $item->route('admin.users.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.users.index')
                    );
                });

                // roles
                $item->item(trans('user::sidebar.roles'), function (Item $item) {
                    $item->weight(10);
                    $item->route('admin.roles.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.roles.index')
                    );
                });
            });
            
            $group->item(trans('admin::sidebar.appearance'), function (Item $item) {
                $item->icon('fa fa-paint-brush');
                $item->weight(15);
                $item->authorize(
                    $this->auth->hasAnyAccess(['admin.sliders.index', 'admin.storefront.edit'])
                );

                $item->route('admin.sliders.index');
                $item->item(trans('slider::sliders.sliders'), function (Item $item) {
                    $item->weight(5);
                    $item->route('admin.sliders.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.sliders.index')
                    );
                });
            });

            $group->item(trans('admin::sidebar.localization'), function (Item $item) {
                $item->weight(10);
                $item->icon('fa fa-globe');
                $item->route('admin.translations.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.translations.index')
                );

                $item->item(trans('translation::sidebar.translations'), function (Item $item) {
                    $item->weight(5);
                    $item->route('admin.translations.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.translations.index')
                    );
                });

                $item->item(trans('currency::currency_rates.currency_rates'), function (Item $item) {
                    $item->weight(10);
                    $item->route('admin.currency_rates.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.currency_rates.index')
                    );
                });

                $item->item(trans('tax::sidebar.taxes'), function (Item $item) {
                    $item->weight(15);
                    $item->route('admin.taxes.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.taxes.index')
                    );
                });

            });

            $group->item(trans('report::sidebar.reports'), function (Item $item) {
                $item->icon('fa fa-bar-chart');
                $item->weight(20);
                $item->route('admin.reports.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.reports.index')
                );
            });

            $group->item(trans('setting::sidebar.settings'), function (Item $item) {
                $item->weight(25);
                $item->icon('fa fa-cogs');
                $item->route('admin.settings.edit');
                $item->authorize(
                    $this->auth->hasAccess('admin.settings.edit')
                );
            });

        });
    }
}
