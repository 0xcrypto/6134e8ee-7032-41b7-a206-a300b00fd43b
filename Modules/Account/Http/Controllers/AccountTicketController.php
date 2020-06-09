<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Routing\Controller;

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
}
