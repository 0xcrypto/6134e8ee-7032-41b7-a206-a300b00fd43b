<?php

namespace Modules\Store\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveStoreRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'store::attributes';

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
