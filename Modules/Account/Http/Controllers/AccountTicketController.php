<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Ticket\Entities\Ticket;
use Modules\Setting\Entities\TicketPriority;
use Illuminate\Support\Facades\Validator;

class AccountTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = auth()->user()->tickets()->paginate(15);

        return view('public.account.tickets.index', compact('tickets'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = auth()->user()
            ->tickets()
            ->with(['department', 'ticketStatus', 'ticketPriority', 'ticketService', 'store', 'assignee'])
            ->where('id', $id)
            ->firstOrFail();

        return view('public.account.tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $my = auth()->user();
        $ticketPriorities = TicketPriority::list();
        return view('public.account.tickets.create', compact('my', 'ticketPriorities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required',
            'priority_id' => 'required',
        ], [
            'subject.required' => 'The subject field is required.',
            'priority_id.required' => 'The priority field is required.',
        ]);

        $validator->validate();

        $currentUser = auth()->user();
        $request->merge([
            'created_by' => $currentUser->id,
            'customer_id' => $currentUser->customer_id,
            'customer_name' => $currentUser->full_name,
            'customer_email' => $currentUser->email,
            'source' => 1,
            'status_id' => setting('default_ticket_status')
        ]);

        Ticket::create($request->except('_token'));

        return redirect()->route('account.tickets.index')->withSuccess(trans('account::messages.ticket_raised'));
    }

}
