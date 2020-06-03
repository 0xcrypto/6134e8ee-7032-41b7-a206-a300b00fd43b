<?php

namespace Modules\User\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveStaffRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'user::attributes';

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
