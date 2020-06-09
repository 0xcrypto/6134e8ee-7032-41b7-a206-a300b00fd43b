<?php

namespace Modules\Setting\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Setting\Entities\TicketStatus;
use Modules\Setting\Entities\TicketPriority;
use Modules\Setting\Entities\TicketService;
use Modules\Setting\Entities\TaskStatus;
use Modules\Setting\Entities\TaskPriority;
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
        // Add & Update Ticket Statuses
        $ticketStatusesDatabase = TicketStatus::get()->map(function ($ticketStatus) {
            return $ticketStatus['name'];
        })->toArray();
        $ticketStatusesForm = collect($request->get('ticketStatuses'))->map(function ($ticketStatus) {
            return $ticketStatus['name'];
        })->toArray();

        $ticketStatusesToDelete = array_diff($ticketStatusesDatabase, $ticketStatusesForm);
        $ticketStatusesToAdd = array_diff($ticketStatusesForm, $ticketStatusesDatabase);
        
        foreach($ticketStatusesToDelete as $ticketStatus){
            TicketStatus::whereTranslation('name', $ticketStatus)->delete();
        }

        foreach($ticketStatusesToAdd as $ticketStatus){
            TicketStatus::create(array('name'=>$ticketStatus));
        }

        // Add & Update Ticket Priorities
        $ticketPrioritiesDatabase = TicketPriority::get()->map(function ($ticketPriority) {
            return $ticketPriority['name'];
        })->toArray();
        $ticketPrioritiesForm = collect($request->get('ticketPriorities'))->map(function ($ticketPriority) {
            return $ticketPriority['name'];
        })->toArray();

        $ticketPrioritiesToDelete = array_diff($ticketPrioritiesDatabase, $ticketPrioritiesForm);
        $ticketPrioritiesToAdd = array_diff($ticketPrioritiesForm, $ticketPrioritiesDatabase);
        
        foreach($ticketPrioritiesToDelete as $ticketPriority){
            TicketPriority::whereTranslation('name', $ticketPriority)->delete();
        }

        foreach($ticketPrioritiesToAdd as $ticketPriority){
            TicketPriority::create(array('name'=>$ticketPriority));
        }

        // Add & Update Ticket Services
        $ticketServicesDatabase = TicketService::get()->map(function ($ticketService) {
            return $ticketService['name'];
        })->toArray();
        $ticketServicesForm = collect($request->get('ticketServices'))->map(function ($ticketService) {
            return $ticketService['name'];
        })->toArray();

        $ticketServicesToDelete = array_diff($ticketServicesDatabase, $ticketServicesForm);
        $ticketServicesToAdd = array_diff($ticketServicesForm, $ticketServicesDatabase);
        
        foreach($ticketServicesToDelete as $ticketService){
            TicketService::whereTranslation('name', $ticketService)->delete();
        }

        foreach($ticketServicesToAdd as $ticketService){
            TicketService::create(array('name'=>$ticketService));
        }

        // Add & Update Departments
        $departmentsDatabase = Department::get()->map(function ($department) {
            return $department['name'];
        })->toArray();
        $departmentsForm = collect($request->get('departments'))->map(function ($department) {
            return $department['name'];
        })->toArray();

        $departmentsToDelete = array_diff($departmentsDatabase, $departmentsForm);
        $departmentsToAdd = array_diff($departmentsForm, $departmentsDatabase);
        
        foreach($departmentsToDelete as $department){
            Department::whereTranslation('name', $department)->delete();
        }

        foreach($departmentsToAdd as $department){
            Department::create(array('name'=>$department));
        }
        
        // Add & Update Task Statuses
        $taskStatusesDatabase = TaskStatus::get()->map(function ($taskStatus) {
            return $taskStatus['name'];
        })->toArray();
        $taskStatusesForm = collect($request->get('taskStatuses'))->map(function ($taskStatus) {
            return $taskStatus['name'];
        })->toArray();

        $taskStatusesToDelete = array_diff($taskStatusesDatabase, $taskStatusesForm);
        $taskStatusesToAdd = array_diff($taskStatusesForm, $taskStatusesDatabase);
        
        foreach($taskStatusesToDelete as $taskStatus){
            TaskStatus::whereTranslation('name', $taskStatus)->delete();
        }

        foreach($taskStatusesToAdd as $taskStatus){
            TaskStatus::create(array('name'=>$taskStatus));
        }

        // Add & Update Task Priorities
        $taskPrioritiesDatabase = TaskPriority::get()->map(function ($taskPriority) {
            return $taskPriority['name'];
        })->toArray();
        $taskPrioritiesForm = collect($request->get('taskPriorities'))->map(function ($taskPriority) {
            return $taskPriority['name'];
        })->toArray();

        $taskPrioritiesToDelete = array_diff($taskPrioritiesDatabase, $taskPrioritiesForm);
        $taskPrioritiesToAdd = array_diff($taskPrioritiesForm, $taskPrioritiesDatabase);
        
        foreach($taskPrioritiesToDelete as $taskPriority){
            TaskPriority::whereTranslation('name', $taskPriority)->delete();
        }

        foreach($taskPrioritiesToAdd as $taskPriority){
            TaskPriority::create(array('name'=>$taskPriority));
        }
        
        setting($request->except('_token', '_method', 'ticketStatuses', 'ticketPriorities', 
        'ticketServices', 'departments', 'taskStatuses', 'taskPriorities'));

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
