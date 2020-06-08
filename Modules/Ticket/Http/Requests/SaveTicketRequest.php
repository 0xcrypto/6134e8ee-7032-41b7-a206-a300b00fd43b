<?php

namespace Modules\Ticket\Http\Requests;

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
        return [];
    }
}
