<?php

namespace Modules\StoreUnit\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveStoreUnitRequest extends Request
{
    
    /**
     * Available attributes.
     *
     * @var string
     */

    protected $availableAttributes = 'storeunit::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'name' => 'required',
            'store' => 'required',
            'availability' => 'required',
        ];
    }
}
