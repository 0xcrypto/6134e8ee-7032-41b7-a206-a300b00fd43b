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
use Modules\User\Entities\User;

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
                'staffs' => $this->getStaffs()
            ]);
        });
    }

    private function getStores()
    {
        $currentUser = auth()->user();
        return $currentUser->stores()->pluck('name', 'id');
    }

    private function getStaffs(){
        $customer_role = setting('customer_role');
        $staffs = User::with('roles')->whereHas('roles', function ($query) use ($customer_role) {
            $query->where('role_id', '!=', $customer_role); 
        })->get()->pluck('full_name', 'id');

        return $staffs;
    }
    
}
