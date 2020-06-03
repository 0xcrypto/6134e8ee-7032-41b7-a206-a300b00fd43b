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

    public function attributes()
    {
        $attributes = [];
        if((int)Request::input('validate_staff_information') == 1){
            $attributes = [
                'first_name' => 'First Name',
                'last_name' => 'Last Name',
                'email' => 'Email',
                'mobile' => 'Mobile',
                'password' => 'Password',
                'password_confirmation' => 'Password Confirmation',
                'gender' => 'Gender',
                'image' => 'Image',
                'customer_id' => 'Customer ID',
                'staff[department_id]' => 'Department',
                'staff[senior_id]' => 'Senior',
                'staff[employee_id]' => 'Employee ID',
                'stores' => 'Stores',
                'staff[job_type]' => 'Job Type',
                'staff[joining_date]' => 'Joining Date',
                'staff[device_id]' => 'Device ID',
                'staff[address]' => 'Address',
            ];
        }
        else{
            $attributes = [
                'first_name' => 'First Name',
                'last_name' => 'Last Name',
                'email' => 'Email',
                'mobile' => 'Mobile',
                'password' => 'Password',
                'password_confirmation' => 'Password Confirmation',
                'gender' => 'Gender',
                'image' => 'Image',
                'customer_id' => 'Customer ID',
            ];
        }
        return $attributes;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];

        if((int)Request::input('validate_staff_information') == 1){
            $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => ['required', 'email', $this->emailUniqueRule()],
                'password' => 'nullable|confirmed|min:6',
                'mobile' => 'required|min:10',
                'roles' => ['required', Rule::exists('roles', 'id')],
                'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'stores' => 'required',
                'staff[employee_id]' => 'required',
                'staff[joining_date]' => 'required|date_format:Y-m-d|after:today',
                'staff[senior_id]' => ['nullable', Rule::exists('users', 'id')],
                'staff[department_id]' => ['required', Rule::exists('departments', 'id')],
                //'staff[job_type]' => 'required',
                
            ];
        }
        else{
            $rules = [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => ['required', 'email', $this->emailUniqueRule()],
                'password' => 'nullable|confirmed|min:6',
                'mobile' => 'required|min:10',
                'roles' => ['required', Rule::exists('roles', 'id')],
                'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        }

        return $rules;
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
