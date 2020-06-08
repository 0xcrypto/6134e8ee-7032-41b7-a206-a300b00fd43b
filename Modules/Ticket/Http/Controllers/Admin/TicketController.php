<?php

namespace Modules\Ticket\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Ticket\Entities\Ticket;
use Modules\Ticket\Http\Requests\SaveTicketRequest;

class TicketController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'ticket::tickets.ticket';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'ticket::admin.tickets';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveTicketRequest::class;

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\User\Http\Requests\SaveUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveTicketRequest $request)
    {
        $request->merge(['created_by' => auth()->user()->id ]);
        Ticket::create($request->except('_token'));

        return redirect()->route('admin.tickets.index')
            ->withSuccess(trans('admin::messages.resource_saved', ['resource' => trans('ticket::tickets.ticket')]));
    }
}
