<?php

namespace Modules\Ticket\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;
use Modules\Ticket\Entities\Ticket;
use Modules\Store\Entities\Store;
use Modules\Setting\Entities\TicketService;
use Modules\Setting\Entities\TicketPriority;
use Modules\Setting\Entities\TicketStatus;
use Modules\Setting\Entities\Department;

class TicketTabs extends Tabs
{

    public function make()
    {
        $this->group('ticket_information', trans('ticket::admin.tabs.group.ticket_information'))
            ->active()
            ->add($this->general());
    }

    private function general()
    {
        return tap(new Tab('General', trans('ticket::admin.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(5);
            $tab->fields([
                'name'
            ]);

            $tab->view('ticket::admin.tickets.tabs.addTicket', [
                'stores' => $this->getStores(),
                'services' => TicketService::list(),
                'statuses' => TicketStatus::list(),
                'priorities' => TicketPriority::list(),
                'departments' => Department::list(),
            ]);
        });
    }

    private function getStores()
    {
        $stores = Store::all()->sortBy('name')->pluck('name', 'id');
        return $stores->prepend(trans('admin::admin.form.please_select'), '');
    }
    
}
