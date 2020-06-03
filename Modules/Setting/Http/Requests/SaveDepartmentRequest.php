<?php

namespace Modules\Setting\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveDepartmentRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'setting::attributes';

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
