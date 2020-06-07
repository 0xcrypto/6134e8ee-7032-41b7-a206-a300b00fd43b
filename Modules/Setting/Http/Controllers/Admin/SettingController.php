<?php

namespace Modules\Setting\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Setting\Entities\TicketStatus;
use Modules\Setting\Entities\TicketPriority;
use Modules\Setting\Entities\TicketService;
use Modules\Setting\Entities\Department;
use Modules\Setting\Http\Requests\UpdateSettingRequest;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $settings = setting()->all();
        $tabs = TabManager::get('settings');

        return view('setting::admin.settings.edit', compact('settings', 'tabs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request)
    {
        //Update Ticket Statuses
        TicketStatus::whereIn('id', TicketStatus::all()->pluck('id')->toArray())->delete();
        $ticketStatuses = collect($request->get('ticketStatuses'))->map(function ($ticketStatus) {
            return $ticketStatus['name'];
        });

        foreach($ticketStatuses as $ticketStatus){
            TicketStatus::create(array('name'=>$ticketStatus));
        }

        //Update Ticket Priorities
        TicketPriority::whereIn('id', TicketPriority::all()->pluck('id')->toArray())->delete();
        $ticketPriorities = collect($request->get('ticketPriorities'))->map(function ($ticketPriority) {
            return $ticketPriority['name'];
        });

        foreach($ticketPriorities as $ticketPriority){
            TicketPriority::create(array('name'=>$ticketPriority));
        }

        //Update Ticket Services
        TicketService::whereIn('id', TicketService::all()->pluck('id')->toArray())->delete();
        $ticketServices = collect($request->get('ticketServices'))->map(function ($ticketService) {
            return $ticketService['name'];
        });

        foreach($ticketServices as $ticketService){
            TicketService::create(array('name'=>$ticketService));
        }

        //Update Departments
        Department::whereIn('id', Department::all()->pluck('id')->toArray())->delete();
        $departments = collect($request->get('departments'))->map(function ($department) {
            return $department['name'];
        });

        foreach($departments as $department){
            Department::create(array('name'=>$department));
        }

        setting($request->except('_token', '_method'));

        $this->handleMaintenanceMode($request);

        return redirect(non_localized_url())
            ->with('success', trans('setting::messages.settings_have_been_saved'));
    }

    private function handleMaintenanceMode($request)
    {
        if ($request->maintenance_mode) {
            Artisan::call('down', [
                '--allow' => $this->allowedIps($request),
            ]);
        } elseif (app()->isDownForMaintenance()) {
            Artisan::call('up');
        }
    }

    private function allowedIps($request)
    {
        $ips = explode(PHP_EOL, $request->allowed_ips);

        return array_map(function ($ip) {
            return trim($ip, "\r\n");
        }, $ips);
    }
}
