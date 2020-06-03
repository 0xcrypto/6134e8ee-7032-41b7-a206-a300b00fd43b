<?php

namespace Modules\User\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Core\Http\Requests\Request;

class SaveUserRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'user::attributes.users';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', $this->emailUniqueRule()],
            'password' => 'nullable|confirmed|min:6',
            'mobile' => 'required|min:10',
            //'senior_id' => ['nullable', Rule::exists('users', 'id')],
            'roles' => ['required', Rule::exists('roles', 'id')],
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    private function emailUniqueRule()
    {
        $rule = Rule::unique('users');

        if ($this->route()->getName() === 'admin.users.update') {
            $userId = $this->route()->parameter('id');

            return $rule->ignore($userId);
        }

        return $rule;
    }
}
