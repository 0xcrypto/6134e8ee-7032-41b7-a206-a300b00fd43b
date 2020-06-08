<?php

namespace Modules\Ticket\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Core\Http\Requests\Request;

class SaveTicketRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'ticket::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subject' => 'required',
            'customer_email' => 'required|email',
            'customer_name' => 'required',
            'customer_id' => ['required', Rule::exists('users', 'customer_id')],
            'department_id' => ['required', Rule::exists('departments', 'id')],
            'service_id' => ['required', Rule::exists('ticket_services', 'id')],
            'status_id' => ['required', Rule::exists('ticket_statuses', 'id')],
            'priority_id' => ['required', Rule::exists('ticket_priorities', 'id')],
            'store_id' => ['required', Rule::exists('stores', 'id')],
        ];
    }
}
