<?php

namespace Modules\Message\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveMessageRecipientRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'message::attributes';

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
