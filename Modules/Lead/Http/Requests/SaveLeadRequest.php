<?php

namespace Modules\Lead\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveLeadRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'lead::attributes';

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
